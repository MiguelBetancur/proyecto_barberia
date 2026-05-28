<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->role_id == 31) {
            return redirect()->route('home.admin');
        } elseif ($user->role_id == 32) {
            return redirect()->route('home.barber');
        } else {
            return redirect()->route('home.cliente');
        }
    }

    public function principal()
    {
        $services = Service::latest()->take(5)->get();
        return view('principal.principal', compact('services'));
    }

    public function admin()
    {
        $services = Service::latest()->take(5)->get();
        return view('principal.principalAdmin', compact('services'));
    }

    public function barber()
    {
        $services = Service::latest()->take(5)->get();
        return view('principal.principalBarber', compact('services'));
    }

    public function cliente()
    {
        $services = Service::latest()->take(5)->get();
        return view('principal.principalCliente', compact('services'));
    }
}