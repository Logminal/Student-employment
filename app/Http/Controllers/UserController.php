<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Employers;
use App\Models\Enterprises;
use App\Models\OrganizationsInWaiting;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate(
            [
                'fio' => ['required'],
                'login' => ['required'],
                // 'status' => ['required'],
            ]
        );

        $user = User::find($id);

        // dd($user);

        if ($request['password'] != null) {
            $user->password = Hash::make($request->password);
        }

        if ($user['status'] == 'employer') {

            // dd($request);
            $enter = Enterprises::all()->where('user_id', $user->id);
            foreach ($enter as $key => $value) {
                $enterUser = $value;
            }
            // dd($enterUser);
            $enterUser->employer = $request->fio;
            $enterUser->update();
        }

        $user->fio = $request->fio;
        $user->login = $request->login;
        // $user->status = $request->status;

        $user->update();
        return to_route('user.index');
    }

    public function destroy($id)
    {
        $studentAll = Students::all()->where('user_id', $id);

        foreach ($studentAll as $key => $value) {
            $studentData = $value;
        }

        $enterprisesAll = Enterprises::all()->where('user_id', $id);
        foreach ($enterprisesAll as $key => $value) {
            $eterprisesData = $value;
        }

        if (User::find($id)->status == 'student') {
            Students::find($studentData->id)->delete();
        }

        if (User::find($id)->status == 'employer') {
            Enterprises::find($eterprisesData->id)->delete();
        }

        User::find($id)->delete();
        return redirect()->back();
    }

    public function storeReg(UsersRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $request['status'] = 'student';
        // dd($request);
        User::create($request->except('_token'));

        Students::create([
            'fio' => $request->fio,
            'user_id' => User::all()->last()->id,
        ]);

        // if ($request['status'] == 'employer') {
        //     Enterprises::create([
        //         'employer' => $request->fio,
        //         'user_id' => User::all()->last()->id,
        //     ]);
        // }

        return to_route('user.index');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('login', 'password'))) {
            return to_route('main');
        } else {
            return view('authForm', [
                'message' => 'Неверный логин или пароль'
            ]);
        };
    }

    public function logout(Request $request)
    {
        // dd($request);
        Auth::logout();
        return to_route('home');
    }

    public function showProfile(Request $request, $id)
    {
        $studentData = 0;
        $employerData = 0;

        if (User::find($id)->status == 'student') {
            $student = Students::all()->where('fio', User::find($id)->fio);
            foreach ($student as $key => $value) {
                $studentData = $value;
            }
        }

        if (User::find($id)->status == 'employer') {
            $employer = Enterprises::all()->where('user_id', User::find($id)->id);
            foreach ($employer as $key => $value) {
                $employerData = $value;
            }
        }

        return view('users.show', [
            'user' => User::find($id),
            'studentData' => $studentData,
            'employerData' => $employerData,
            'enterprisesWriting' => OrganizationsInWaiting::all(),
        ]);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->back();
    }
}
