<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Reserve;
use \App\Models\User;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserves=Reserve::all();
        $users=User::all();
        return view ('reserves.index', compact('reserves', 'users'));
    }

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
        Reserve::create([
            'date' => $request->date,
            'time' => $request->time,
            'state' => $request->state,
            'user_id' => $request->usuario_id,
        ]);
        return redirect()->route('reserves.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve = Reserve::find($id);
        $users = User::all();
        return view ('reserves.edit', compact('reserve', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserve = Reserve::find($id);
        $reserve->date = $request->fecha;
        $reserve->time = $request->hora;
        $reserve->state = $request->estado;
        $reserve->user_id = $request->usuario_id;
        $reserve->save();
        return redirect()->route('reserves.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();
        return redirect()->route('reserves.index');
    }
}
