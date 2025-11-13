<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Style Kustom Anda --}}
        <style>
            body {
                /* 1. Ganti background-color menjadi background-image */
                background-image: url('https://images.unsplash.com/photo-1495474472287-4d713b20e5e3?auto=format&fit=crop&w=1920&q=80');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
            
            /* 2. Tambahkan overlay gelap agar form lebih terbaca */
            .auth-overlay {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding-top: 24px;
                padding-bottom: 24px;
                /* Overlay 50% hitam transparan */
                background-color: rgba(0, 0, 0, 0.5); 
            }
            
            /* Style untuk form box putih */
            .form-container {
                background: #ffffff;
                padding: 35px;
                border-radius: 28px;
                width: 100%;
                max-width: 450px; /* Atur lebar kotak form */
                margin: auto;
                border: 1px solid #eadccd;
                box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            }

            .form-logo {
                text-align: center;
                margin-bottom: 20px;
            }

            /* Style untuk input dan button (tetap sama) */
            label {
                font-weight: 600;
                margin-bottom: 6px;
                display: block;
                color: #4a3a2f;
            }

            input[type="text"], input[type="email"], input[type="password"] {
                width: 100%;
                padding: 12px 14px;
                border-radius: 14px;
                border: 1px solid #d4c2b3;
                margin-bottom: 18px;
                font-size: 15px;
                background: #fcf9f6;
            }

            .btn-submit {
                background: #8B5E3C;
                color: white;
                padding: 12px 25px;
                border-radius: 100px;
                font-size: 15px;
                border: none;
                width: 100%;
                transition: .3s;
                cursor: pointer;
            }

            .btn-submit:hover {
                background: #6F4529;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        
        {{-- 3. Ganti div lama dengan div .auth-overlay --}}
        <div class="auth-overlay">
            
            <div class="form-logo">
                <a href="/">
                    {{-- TIPS: Ganti <x-application-logo> ini dengan file gambar logo Anda --}}
                    {{-- <img src="/images/logo-lily-cafe.png" alt="Lily Cafe Logo" style="width: 100px; height: auto;"> --}}
                    
                    {{-- Logo default (warnanya saya ubah jadi terang) --}}
                    <x-application-logo class="w-20 h-20 fill-current text-gray-100" />
                </a>
            </div>

            {{-- Kotak form putih --}}
            <div class="form-container">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>