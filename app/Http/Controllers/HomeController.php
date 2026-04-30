<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function principal()
    {
        $services = Service::latest()->take(5)->get();

        return view('principal.principal', compact('services'));
    }
}
