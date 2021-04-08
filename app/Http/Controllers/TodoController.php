<?php

namespace App\Http\Controllers;

use App\Events\SentTaskMail;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
       $todos = Todo::latest()->simplePaginate(4);
       return view('welcome')->with('todos',$todos);
    }


//    public function search(Request $request)
//    {
//        if($request->ajax())
//        {
//            $data= Todo::where('title','LIKE',$request->search.'%')->get();
//            $output = '';
//            if(count($data)>0)
//            {
//                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
//
//                foreach ($data as $row){
//
//                    $output .= '<li class="list-group-item">'.$row->title.'</li>';
//                }
//
//                $output .= '</ul>';
//            }
//            else
//            {
//                $output .= '<li class="list-group-item">'.'No results'.'</li>';
//            }
//            return $output;
//        }
//    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
           'title' => 'required',
            'Description' => 'required',
        ]);

        $todo = Todo::create([
           'title' => $request->title,
           'Description' => $request->Description,
           'completed'=>0,
        ]);

        event(new SentTaskMail($todo));
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());
        return  redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return  redirect('/');
    }
}
