<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'desk' => ['required'],
        ]);

        $request['user_id'] = Auth::user()->id;

        $request['date'] = date('Y' . '-' . 'm' . '-' . 'd');
        // dd($request['date']);
        News::create($request->except('_token'));
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('news.edit', [
            'new' => News::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $new = News::find($id);
        $new->name = $request->name;
        $new->desk = $request->desk;
        $new->update();
        return to_route('main');
    }

    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->back();
    }
}
