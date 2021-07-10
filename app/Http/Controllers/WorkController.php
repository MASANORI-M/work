<?php

namespace App\Http\Controllers;

use App\Work;
use App\Category;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function __construct() {
      $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return view('index', ['works' => $works]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $work = new Work;
        $categories = Category::all()->pluck('name', 'id');
        return view('new', ['work' => $work, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work = new Work;
        $user = \Auth::user();

        $work->name = request('name');
        $work->criant = request('criant');
        $work->money = request('money');
        $work->year = request('year');
        $work->munth = request('munth');
        $work->day = request('day');
        $work->state = request('state');
        $work->category_id = request('category_id');
        $work->result = request('result');
        $work->bikou = request('bikou');
        $work->user_id = $user->id;
        $work->save();
        return redirect()->route('work.detail', ['id' => $work->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);
        $user = \Auth::user();

        if($user) {
          $login_user_id = $user->id;
        } else {
          $login_user_id = "";
        }
        return view('show', ['work' => $work, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('edit', ['work' => $work, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Work $work)
    {
        $work = Work::find($id);
        $work->name = request('name');
        $work->criant = request('criant');
        $work->money = request('money');
        $work->year = request('year');
        $work->munth = request('munth');
        $work->day = request('day');
        $work->state = request('state');
        $work->category_id = request('category_id');
        $work->result = request('result');
        $work->bikou = request('bikou');
        $work->save();
        return redirect()->route('work.detail', ['id' => $work->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);
        $work->delete();
        return redirect('/works');
    }
}
