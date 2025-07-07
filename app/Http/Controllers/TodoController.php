<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse; // Tambahkan di atas kalau belum



class TodoController extends Controller
{
    public function index() : View {

        $all_todos = Todo::all()->sortByDesc('id');
        return view ('todolist', ['todos' => $all_todos]);
    }

    public function add(Request $request){
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->status = false;
        $todo->save();

        return redirect('/');

    }

    public function update(Request $request, $id) : RedirectResponse{
        $todo = Todo::find($id);
        $todo->status =! $todo->status;
        $todo->save();

        return redirect('/');
    }

    public function delete(Request $request, $id) : RedirectResponse{
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/');
    }
}
