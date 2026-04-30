<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Reserve_Service;
use \App\Models\Service;
use \App\Models\Reserve;

class Reserve_ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserve_services = Reserve_Service::with('reserve', 'service')->get();
        $reserves=Reserve::all();
        $services=Service::all();
        return view('reserve_services.index', compact('reserve_services', 'reserves', 'services'));
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
        \App\Models\Reserve_Service::create([
        'reserve_id' => $request->reserve_id,
        'service_id' => $request->service_id
        ]);

        return redirect()->route('reserve_services.index');
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
        $reserveService = Reserve_Service::findOrFail($id);

        $reserve = Reserve::with('services')->findOrFail($reserveService->reserve_id);
        $services = Service::all();

        return view('reserve_services.edit', compact('reserve', 'services', 'reserveService'));
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
        $reserve = \App\Models\Reserve::findOrFail($id);

   
        $reserve->services()->sync($request->services);

        return redirect()->route('reserve_services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve_service = Reserve_Service::find($id);
        $reserve_service->delete();
        return redirect()->route('reserve_services.index');
    }
}
