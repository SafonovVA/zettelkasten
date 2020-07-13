<?php


namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

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
     * @return Renderable
     */
    public function index()
    {
        return view('notes.notes');
    }
}
