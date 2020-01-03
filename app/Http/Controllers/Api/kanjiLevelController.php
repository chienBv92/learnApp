<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\kanjiLevel;
use App\Models\Kanji;
use App\Http\Controllers\Controller;

class kanjiLevelController extends Controller
{
    //
    public function index()
    {
        //$kanjiLevel = KanjiLevel::all();
        $ketqua = ["hi", "Ki", "kasshi"];

        //$users = DB::collection('users')->get();
        return response()->json($ketqua, 200);
    }

    public function getKanjiByLevel($metaTitle)
    {
        $kanjiLevel = KanjiLevel::where('metaTitle', $metaTitle)->first();
        $kanji = [];
        $totalLesson = 0;
        if($kanjiLevel){
            $totalLesson = $kanjiLevel->TotalLesson;
            $kanji = Kanji::where('levelK', $kanjiLevel->level .'k')->get();
            return response()->json([$kanji, $totalLesson, $kanjiLevel], 200);

        }

        //$kanji = Kanji::all();
        //$users = DB::collection('users')->get();
        // Thông số json
        //response()->json($data, $status, $headers, $options);
        return response()->json([], 400);

    }
}
