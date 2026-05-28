@extends('layouts.app')

@section('content')
<div style="
    min-height: 100vh;
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
">
    <div style="
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 16px;
        padding: 40px;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    ">
        <!-- Logo / Título -->
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fa fa-cut" style="font-size: 40px; color: #c8a96e;"></i>
            <h2 style="color: white; margin-top: 10px; font-family: Oswald, sans-serif; letter-spacing: 2px;">BARBERÍA</h2>
            <p style="color: #aaa; font-size: 13px;">Crea tu cuenta</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div style="margin-bottom: 20px;">
                <label style="color: #ccc; font-size: 13px; margin-bottom: 6px; display: block;">Nombre</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    style="
                        width: 100%;
                        background: rgba(255,255,255,0.08);
                        border: 1px solid rgba(255,255,255,0.15);
                        border-radius: 8px;
                        padding: 12px 16px;
                        color: white;
                        font-size: 14px;
                        outline: none;
                        box-sizing: border-box;
                    "
                >
                @error('name')
                    <span style="color: #ff6b6b; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div style="margin-bottom: 20px;">
                <label style="color: #ccc; font-size: 13px; margin-bottom: 6px; display: block;">Correo electrónico</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    style="
                        width: 100%;
                        background: rgba(255,255,255,0.08);
                        border: 1px solid rgba(255,255,255,0.15);
                        border-radius: 8px;
                        padding: 12px 16px;
                        color: white;
                        font-size: 14px;
                        outline: none;
                        box-sizing: border-box;
                    "
                >
                @error('email')
                    <span style="color: #ff6b6b; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div style="margin-bottom: 20px;">
                <label style="color: #ccc; font-size: 13px; margin-bottom: 6px; display: block;">Contraseña</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    style="
                        width: 100%;
                        background: rgba(255,255,255,0.08);
                        border: 1px solid rgba(255,255,255,0.15);
                        border-radius: 8px;
                        padding: 12px 16px;
                        color: white;
                        font-size: 14px;
                        outline: none;
                        box-sizing: border-box;
                    "
                >
                @error('password')
                    <span style="color: #ff6b6b; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirmar Password -->
            <div style="margin-bottom: 24px;">
                <label style="color: #ccc; font-size: 13px; margin-bottom: 6px; display: block;">Confirmar contraseña</label>
                <input
                    id="password-confirm"
                    type="password"
                    name="password_confirmation"
                    required
                    style="
                        width: 100%;
                        background: rgba(255,255,255,0.08);
                        border: 1px solid rgba(255,255,255,0.15);
                        border-radius: 8px;
                        padding: 12px 16px;
                        color: white;
                        font-size: 14px;
                        outline: none;
                        box-sizing: border-box;
                    "
                >
            </div>

            <!-- Botón -->
            <button type="submit" style="
                width: 100%;
                background: #c8a96e;
                color: #1a1a1a;
                border: none;
                border-radius: 8px;
                padding: 13px;
                font-size: 15px;
                font-weight: bold;
                letter-spacing: 1px;
                cursor: pointer;
            ">
                REGISTRARSE
            </button>

            <!-- Links -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('login') }}" style="color: #c8a96e; font-size: 13px; text-decoration: none;">
                    ¿Ya tienes cuenta? Inicia sesión
                </a>
            </div>
        </form>
    </div>
</div>
@endsection