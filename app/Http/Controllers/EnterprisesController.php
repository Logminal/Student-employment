<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnterprisesRequest;
use App\Models\Employers;
use App\Models\Enterprises;
use App\Models\OrganizationsInWaiting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EnterprisesController extends Controller
{
    public function index()
    {
        return view('enterprises.index', [
            'enterprises' => Enterprises::all(),
        ]);
    }

    public function store(EnterprisesRequest $request)
    {
        // dd($request['user_id']);
        Enterprises::create($request->except('_tocen'));
        return to_route('enterprises.index');
    }

    public function edit($id)
    {
        // dd($user = User::find($id));
        $user_id = User::find($id)->id;
        $user = User::find($id);
        // dd($user);
        foreach (Enterprises::all()->where('user_id', $user_id) as $key => $value) {
            $enterpriseData = $value;
        }

        return view('enterprises.edit', [
            'user' => $user,
            'enterprise' => $enterpriseData,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'employer' => ['required'],
            'phone' => ['required'],
            // 'login' => ['required', 'unique:users,login'],

        ]);

        $enter = Enterprises::find($id);
        $userArr = User::all()->where('id', $enter->user_id);
        foreach ($userArr as $key => $value) {
            $user = $value;
        }

        $user->fio = $request->employer;
        // $user->login = $request->login;
        $enter->employer = $request->employer;
        $enter->phone = $request->phone;


        $enter->update();
        $user->update();
        return to_route('user.show.profile', $user->id);
    }

    public function destroy($id)
    {
        $user_id = Enterprises::find($id)->user_id;
        dd($user_id);
        Enterprises::find($id)->delete();
        User::find($user_id)->delete();
        return to_route('enterprises.index');
    }

    public function deleteUp(Request $request)
    {

        $enter = Enterprises::query()->where('name', $request->name)->get();

        foreach ($enter as $key => $value) {
            Enterprises::find($value->id)->delete();
        }

        return to_route('enterprises.index');
    }

    public function addWriting(Request $request, $id)
    {
        $enterprise = Enterprises::all()->where('user_id', $id);
        foreach ($enterprise as $key => $value) {
            $enter = $value;
        }
        // dd($enter);
        OrganizationsInWaiting::create([
            'name' => $request->name,
            'enterprises_id' => $enter->id,
        ]);
        return to_route('user.show.profile', $id);
    }

    public function addEnterprise(Request $request, $id)
    {
        $enterpriseWriting = OrganizationsInWaiting::find($id);
        $enterprise = Enterprises::find($enterpriseWriting->enterprises_id);
        $user_id = User::find($enterprise->user_id);
        $enterprise->name = $enterpriseWriting->name;
        // dd(Auth::user()->id);
        $enterprise->update();
        $enterpriseWriting->delete();
        return to_route('user.show.profile', Auth::user()->id);
    }

    public function enterprisesAdd(Request $request)
    {
        $request->validate([
            'employer' => ['required'],
            'name' => ['required', 'unique:enterprises,name'],
            'login' => ['required'],
            'password' => ['required'],
        ]);
        // dd($request);
        User::create([
            'fio' => $request->employer,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'status' => 'employer',
        ]);

        Enterprises::create([
            'employer' => $request->employer,
            'name' => 'В обработке',
            'user_id' => User::all()->last()->id,
        ]);

        OrganizationsInWaiting::create([
            'name' => $request->name,
            'enterprises_id' => Enterprises::all()->last()->id,
        ]);

        return to_route('home');
    }
}
