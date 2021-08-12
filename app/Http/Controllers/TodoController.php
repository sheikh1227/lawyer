<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //
    public function todo(Request $request)
    {
        # code...
     //  dd($request->all());
        Todo::create([
            'title'=>$request->title,
            'Assign'=>$request->assign,
            'due_date'=>$request->duedate,
            'tag'=>$request->tag,
            'description'=>$request->description,
           ]);

        return redirect()->back();
        // dd();
    }
}
