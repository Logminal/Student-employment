<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function indexMain()
    {
        return view('news.index', [
            'news' => News::all(),
        ]);
    }
}
