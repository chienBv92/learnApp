<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    // get list Lesson
    public function index()
    {
        $lists = User::all();
        return response()->json($lists);

    }
}
