<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Advertisement;
use \App\Models\User;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements=Advertisement::all();
        $users = User::withoutTrashed()->get();       
        return view ('advertisements.index', compact('advertisements', 'users'));
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
        $advertisement = new Advertisement;
        $advertisement->title = $request->titulo;
        $advertisement->message = $request->mensaje;
        $advertisement->user_id = $request->usuario_id;
        $advertisement->save();
        return redirect()->route('advertisements.index');
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
        $advertisement = Advertisement::find($id);       
        $users = User::withoutTrashed()->get();       
        return view ('advertisements.edit', compact('advertisement', 'users'));
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
        $advertisement = Advertisement::find($id);
        $advertisement->title = $request->titulo;
        $advertisement->message = $request->mensaje;
        $advertisement->user_id = $request->usuario_id;
        $advertisement->save();
        return redirect()->route('advertisements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();
        return redirect()->route('advertisements.index');
    }
}
