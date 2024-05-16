<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsRequest;
use App\Models\Enterprises;
use App\Models\Specializations;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('student.index', [
            'enterprises' => Enterprises::all(),
            'students' => Students::all(),
            'teachers' => Teachers::all(),
            'spec' => Specializations::all(),
        ]);
    }

    public function store(StudentsRequest $request)
    {
        $enterprises = Enterprises::all()->where('name', '=', $request['enterprises_id']);
        foreach ($enterprises as $key => $value) {
            $enterId = $value->id;
        }

        $spce = Specializations::all()->where('name', '=', $request['specializations_id']);
        foreach ($spce as $key => $value) {
            $specId = $value->id;
        }

        $teacher = Teachers::all()->where('name', '=', $request['teachers_id']);
        foreach ($teacher as $key => $value) {
            $teachId = $value->id;
        }

        if (!empty($request['enterprises_id'])) {
            $request['enterprises_id'] = $enterId;
        }

        $request['specializations_id'] = $specId;
        $request['teachers_id'] = $teachId;
        Students::create($request->except('_token'));
        return to_route('student.index');
    }

    public function edit($id)
    {
        return view('student.edit', [
            'student' => Students::find($id),
            'enterprises' => Enterprises::all()->where('name', '!=', 'В обработке'),
            'teachers' => Teachers::all(),
            'spec' => Specializations::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fio' => ['required'],
            'phone' => ['required'],
            'enterprises_id' => ['required'],
            'specializations_id' => ['required']
        ]);

        $user = User::all()->where('fio', Students::find($id)->fio);
        foreach ($user as $key => $value) {
            $userData = $value;
        }

        $student = Students::find($id);
        $userData->fio = $request->fio;
        $student->fio = $request->fio;
        $student->phone = $request->phone;

        $enterprises = Enterprises::all()->where('name', '=', $request['enterprises_id']);
        foreach ($enterprises as $key => $value) {
            $student->enterprises_id = $value->id;
        }

        if ($student->enterprises_id == null) {
            $request->validate([
                'dont__work' => ['required'],
            ]);
            $student->dont_activity = $request->dont__work;
            $student->type_of_activity = null;
        }

        if (!empty($student->enterprises_id)) {
            $request->validate([
                'workVid' => ['required'],
            ]);
            $student->type_of_activity = $request->workVid;
            $student->dont_activity = null;
        }

        $spce = Specializations::all()->where('name', '=', $request['specializations_id']);
        foreach ($spce as $key => $value) {
            $student->specializations_id = $value->id;
        }

        $teacher = Teachers::all()->where('name', '=', $request['teachers_id']);
        foreach ($teacher as $key => $value) {
            $student->teachers_id = $value->id;
        }

        $id_user = Students::find($id)->user_id;

        $student->update();
        $userData->update();
        return to_route('user.show.profile', User::find($id_user)->id);
    }

    public function destroy($id)
    {
        $student = Students::find($id);
        $user = User::all()->where('fio', $student->fio);
        $id_user = 0;
        foreach ($user as $key => $value) {
            $id_user = $value->id;
        }
        Students::find($id)->delete();
        User::find($id_user)->delete();
        return to_route('student.index');
    }
}
