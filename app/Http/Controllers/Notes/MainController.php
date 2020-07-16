<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;

class MainController extends Controller
{
    public function index($parentId = null)
    {
        $notesTitles = Note::where('parent_id', $parentId)->get(['title', 'id', 'has_child', 'common_number']);
        //dd($notesTitles);
        if ($notesTitles !== null) {
            if ($parentId === null) {
                return view('notes.index', compact('notesTitles'));
            } else {
                $notesTitles = count($notesTitles) === 0 ? null : $notesTitles;
                return response()->json(['result' => 'success', 'data' => $notesTitles], 200);
            }
        } else {
            return response()->json(['result' => 'error'], 400);
        }

    }
}
