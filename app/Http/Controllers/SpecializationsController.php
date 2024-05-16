<?php

namespace App\Http\Controllers;

use App\Models\Specializations;
use App\Models\Students;
use Illuminate\Http\Request;

class SpecializationsController extends Controller
{
    public function index()
    {
        return view('specializations.index', [
            'spec' => Specializations::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'kodSpec' => ['required'],
        ]);

        Specializations::create($request->except('_token'));
        return to_route('specializations.index');
    }

    public function edit(Request $request, $id)
    {
        return view('specializations.edit', [
            'spec' => Specializations::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'name_cut' => ['required'],
            'kodSpec' => ['required'],
        ]);
        $spec = Specializations::find($id);
        $spec->name = $request->name;
        $spec->kodSpec = $request->kodSpec;
        $spec->name_cut = $request->name_cut;
        $spec->update();
        return to_route('specializations.index');
    }

    public function destroy($id)
    {
        Specializations::find($id)->delete();
        return to_route('specializations.index');
    }

    public function showAllStudentsSpec($kodSpec)
    {
        foreach (Specializations::all()->where('kodSpec', $kodSpec) as $key => $value) {
            $idSpec = $value->id;
        };

        $setudentsSpec = Students::all()->where('specializations_id', $idSpec);

        $studentsWork = 0;
        $dontWorkStudents = 0;

        foreach ($setudentsSpec as $key => $value) {
            if ($value['enterprises_id'] != null) {
                $studentsWork++;
            }

            if ($value['enterprises_id'] == null) {
                $dontWorkStudents++;
            }
        }

        return view('specializations.show', [
            'spec' => Specializations::find($idSpec),
            'studentsSpec' => $setudentsSpec,
            'studentsSpecCount' => $setudentsSpec->count(),
            'studentsWork' => $studentsWork,
            'dontWorkStudents' => $dontWorkStudents,
            'specializationStudents' => 0,
        ]);
    }
}
