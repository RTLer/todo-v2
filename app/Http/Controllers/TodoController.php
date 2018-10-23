<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreate;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::query()
            ->where('user_id',auth()->id())
            ->get();
        return view(
            'todo.index',
            [
                'todoList' => auth()->user()->todos,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TodoCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreate $request)
    {
        $input = $request->only(['title', 'expired_at']);
        $input['user_id'] = auth()->id();
        Todo::query()->create($input);
        return redirect()->route('todo.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('todo.edit',[
            'todo'=>auth()->user()->todos()->where('id',$id)
                ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        auth()->user()->todos()->where('id',$id)->update(
            $request->only(['title', 'expired_at'])
        );
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->todos()->where('id',$id)->delete();
        return redirect()->route('todo.index');
    }
}
