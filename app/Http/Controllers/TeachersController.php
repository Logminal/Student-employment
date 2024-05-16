<?php

namespace App\Http\Controllers;

use App\Models\Specializations;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('teachers.index', [
            'spec' => Specializations::all(),
            'teachers' => Teachers::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        Teachers::create($request->except('_token'));
        return to_route('teachers.index');
    }

    public function edit(Request $request, $id)
    {
        return view('teachers.edit', [
            'teacehr' => Teachers::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $teach = Teachers::find($id);

        $teach->name = $request->name;
        $teach->update();
        return to_route('teachers.index');
    }

    public function destroy($id)
    {
        Teachers::find($id)->delete();
        return to_route('teachers.index');
    }
}
