<?php


namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class NotesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return JsonResponse
     */
    public function index($id)
    {
        //sleep(2);
        $note = Note::find($id);
        if ($note !== null) {
            return response()->json(['result' => 'success', 'data' => $note], 200);
        }
        return response()->json(['result' => 'error'], 400);
    }

    public function getNoteLinks($id)
    {
        $links = Note::find($id)->links;
        if ($links !== null) {
            return response()->json(['result' => 'success', 'data' => $links], 200);
        }
        return response()->json(['result' => 'error'], 400);
    }

    public function getNoteTags($id)
    {
        $tags = Note::find($id)->tags;
        if ($tags !== null) {
            return response()->json(['result' => 'success', 'data' => $tags], 200);
        }
        return response()->json(['result' => 'error'], 400);
    }
}
