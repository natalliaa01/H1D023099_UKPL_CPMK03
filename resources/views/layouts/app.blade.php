<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Lily Cafe' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-body: #F6F1EA;
            --bg-card: #FFFFFF;
            --accent: #A67C52;      /* kopi latte */
            --accent-dark: #7B5635; /* coklat tua */
            --accent-soft: #E3D3C2;
            --text-main: #3F3225;
            --text-muted: #7A6A58;
            --border-soft: #E3D7CC;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f6f1eb;;
            font-family: "Poppins", sans-serif;
            color: var(--text-main);
        }

        /* NAVBAR / HEADER */
        .navbar {
            background: rgba(246, 241, 234, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-soft);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .navbar-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .brand-logo {
            width: 30px;
            height: 30px;
            border-radius: 999px;
            background: radial-gradient(circle at 30% 20%, #D4B08A, var(--accent-dark));
            box-shadow: 0 4px 10px rgba(0,0,0,0.18);
        }

        .brand-text {
            font-weight: 600;
            font-size: 18px;
            letter-spacing: 1px;
            color: var(--text-main);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-main);
            font-size: 14px;
            font-weight: 500;
            position: relative;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.2s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .btn-outline {
            padding: 7px 14px;
            border-radius: 999px;
            border: 1px solid var(--accent);
            background: transparent;
            color: var(--accent-dark);
            font-size: 13px;
            cursor: pointer;
        }

        .btn-outline:hover {
            background: var(--accent);
            color: #fff;
        }

        /* PAGE WRAPPER */
        .page-wrapper {
            max-width: 1100px;
            margin: 25px auto 40px;
            padding: 0 20px;
        }

        /* UTILITIES */
        .card {
            background: var(--bg-card);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            padding: 22px;
            border: 1px solid var(--border-soft);
        }

        .card-soft {
            background: #FBF6F0;
            border-radius: 18px;
            padding: 22px;
            border: 1px dashed var(--accent-soft);
        }

        .btn-primary {
            display: inline-block;
            background: var(--accent-dark);
            color: #fff;
            padding: 10px 18px;
            border-radius: 999px;
            border: none;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: var(--accent);
        }

        .btn-danger {
            display: inline-block;
            background: #c0392b;
            color: #fff;
            padding: 8px 14px;
            border-radius: 999px;
            border: none;
            font-size: 12px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background: #a5281c;
        }

        .badge-soft {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            background: var(--accent-soft);
            color: var(--text-muted);
            font-size: 11px;
        }

        .text-muted {
            color: var(--text-muted);
            font-size: 13px;
        }

        .mt-1 { margin-top: 4px; }
        .mt-2 { margin-top: 8px; }
        .mt-3 { margin-top: 12px; }
        .mt-4 { margin-top: 16px; }
        .mb-2 { margin-bottom: 8px; }
        .mb-3 { margin-bottom: 12px; }
        .mb-4 { margin-bottom: 16px; }

        /* GRID */
        .grid {
            display: grid;
            gap: 18px;
        }

        @media (min-width: 768px) {
            .grid-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
            .grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        /* FORM */
        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 5px;
            color: var(--text-main);
        }

        .form-input, .form-textarea {
            width: 100%;
            border-radius: 10px;
            border: 1px solid var(--border-soft);
            padding: 9px 11px;
            font-size: 13px;
            font-family: inherit;
            outline: none;
            background: #FFFCF8;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(166, 124, 82, 0.18);
        }

        .form-textarea {
            resize: vertical;
            min-height: 90px;
        }

        .alert-success {
            padding: 10px 14px;
            border-radius: 12px;
            background: #eaf7ef;
            border: 1px solid #c0e3cb;
            font-size: 13px;
            color: #2d6a3f;
            margin-bottom: 14px;
        }

        /* MENU CARDS */
        .menu-grid {
            display: grid;
            gap: 18px;
        }

        @media (min-width: 768px) {
            .menu-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .menu-card {
            background: var(--bg-card);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border-soft);
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .menu-thumb {
            height: 130px;
            background: linear-gradient(135deg, #C6A17A, #8A5A3A);
            position: relative;
        }

        .menu-thumb::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.25), transparent 50%),
                radial-gradient(circle at 80% 0, rgba(0,0,0,0.15), transparent 50%);
            opacity: 0.9;
        }

        .menu-body {
            padding: 15px 16px 14px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .menu-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-main);
        }

        .menu-price {
            font-size: 14px;
            color: var(--accent-dark);
            font-weight: 500;
        }

        .menu-desc {
            font-size: 12px;
            color: var(--text-muted);
        }

        .menu-actions {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            gap: 6px;
            align-items: center;
        }

        .btn-small {
            padding: 7px 12px;
            font-size: 12px;
            border-radius: 999px;
            border: none;
            cursor: pointer;
        }

        .btn-secondary {
            background: #F1E4D6;
            color: var(--text-main);
        }

        .btn-secondary:hover {
            background: #E4D2BF;
        }

        /* HERO SECTION di dashboard */
        .hero {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        @media (min-width: 768px) {
            .hero {
                flex-direction: row;
                align-items: center;
            }
        }

        .hero-main {
            flex: 1;
        }

        .hero-kopi {
            flex: 1;
            max-width: 360px;
            margin-left: auto;
        }

        .hero-badge {
            font-size: 11px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            background: #FFF4E3;
            color: var(--text-muted);
            border: 1px solid #F2DFC8;
        }

        .hero-title {
            font-size: 28px;
            font-weight: 600;
            margin: 10px 0 8px;
        }

        .hero-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            max-width: 360px;
        }

        .hero-kopi-inner {
            border-radius: 999px;
            height: 220px;
            background: radial-gradient(circle at 30% 0, #FFE5C4, #8A5A3A);
            box-shadow: 0 20px 45px rgba(0,0,0,0.25);
            position: relative;
            overflow: hidden;
        }

        .hero-kopi-inner::before {
            content: "";
            position: absolute;
            inset: 14px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.35);
        }

        .hero-kopi-inner::after {
            content: "LILY CAFE";
            position: absolute;
            bottom: 18px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 11px;
            letter-spacing: 3px;
            color: rgba(255,255,255,0.85);
        }

    </style>
</head>
<body>

    <div class="navbar">
        <div class="navbar-inner">
            <a href="{{ url('/') }}" class="brand">
                <div class="brand-logo"></div>
                <span class="brand-text">LILY CAFE</span>
            </a>

            <div class="nav-links">
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                <a href="{{ url('/menus') }}">Menu</a>

                @auth
                    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit" class="btn-outline">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        @yield('content')
    </div>

</body>
</html>

