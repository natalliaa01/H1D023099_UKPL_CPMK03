@extends('layouts.app')

@section('content')

<style>
    /* HERO SECTION */
    .hero-wrapper {
        position: relative;
        background: linear-gradient(120deg, #f0e8df, #e5d5c4);
        border-radius: 26px;
        padding: 58px 60px;
        overflow: hidden;
        margin-bottom: 45px;
        display: flex;
        align-items: center;
        gap: 50px;
    }

    .hero-wrapper::before {
        content: "";
        position: absolute;
        top: -40px;
        left: -40px;
        width: 280px;
        height: 280px;
        background: #fff3e2;
        opacity: .35;
        border-radius: 50%;
        filter: blur(90px);
    }

    .hero-content h1 {
        font-size: 40px;
        font-weight: 600;
        line-height: 1.25;
        margin-bottom: 12px;
        color: #3c2b20;
    }

    .hero-content p {
        font-size: 15px;
        color: #7b6a59;
        max-width: 420px;
        margin-bottom: 26px;
    }

    .hero-img {
        width: 310px;
        height: 230px;
        border-radius: 40px;
        background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=60')
            center/cover no-repeat;
        box-shadow: 0 20px 55px rgba(0,0,0,0.18);
        position: relative;
    }

    .hero-btn {
        background: #8B5E3C;
        padding: 12px 30px;
        color: #fff;
        border-radius: 999px;
        font-size: 15px;
        text-decoration: none;
        font-weight: 500;
        transition: .25s ease;
        display: inline-block;
    }

    .hero-btn:hover {
        background: #6c4529;
        padding-left: 35px;
        padding-right: 35px;
    }

    /* GRID CARDS */
    .stats-grid {
        display: grid;
        gap: 26px;
    }

    @media(min-width:900px) {
        .stats-grid {
            grid-template-columns: repeat(2,1fr);
        }
    }

    .stat-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 30px;
        border: 1px solid #ede3d8;
        box-shadow: 0 18px 40px rgba(0,0,0,0.05);
        transition: 0.25s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 28px 50px rgba(0,0,0,0.07);
    }

    .stat-card h3 {
        font-size: 18px;
        margin-bottom: 8px;
        color: #3f2e22;
        font-weight: 700;
    }

    .value {
        font-size: 36px;
        font-weight: 700;
        color: #8B5E3C;
        margin-bottom: 10px;
    }

    .icon-bean {
        width: 46px;
        position: absolute;
        top: 22px;
        right: 22px;
        opacity: 0.12;
    }

    .quick-link {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 999px;
        border: 1px solid #e0d2c3;
        font-size: 14px;
        text-decoration: none;
        color: #5a4635;
        margin-right: 8px;
        margin-bottom: 8px;
        transition: .2s;
    }

    .quick-link:hover {
        background: #f4ece3;
    }
</style>

{{-- HERO --}}
<div class="hero-wrapper">
    <div class="hero-content">
        <h1>Mengelola Menu Cafe<br>Tak Pernah Semudah Ini.</h1>

        <p>
            Nikmati pengalaman mengelola menu Lily Cafe dengan desain premium dan workflow yang simple.
            Tambahkan, edit, dan hapus menu dengan tampilan yang bersih dan profesional.
        </p>

        <a href="{{ route('menus.index') }}" class="hero-btn">
            Kelola Menu Sekarang
        </a>
    </div>

    <div class="hero-img"></div>
</div>

{{-- STATISTIK / QUICK PANEL --}}
<div class="stats-grid">

    {{-- CARD 1 - Total Menu --}}
    <div class="stat-card">
        <img src="https://cdn-icons-png.flaticon.com/512/924/924514.png" class="icon-bean">
        <h3>Total Menu Terdaftar</h3>
        <div class="value">{{ $totalMenu ?? \App\Models\Menu::count() }}</div>
        <p>Jumlah item menu yang tersedia di Lily Café saat ini.</p>
    </div>

    {{-- CARD 2 - Akses Cepat --}}
    <div class="stat-card">
        <img src="https://cdn-icons-png.flaticon.com/512/2972/2972159.png" class="icon-bean">
        <h3>Akses Cepat</h3>
        <p style="margin-bottom:16px; color:#7b6a59;">
            Beberapa aksi yang sering digunakan untuk mengelola menu Lily Café.
        </p>

        <a href="{{ route('menus.index') }}" class="quick-link">📋 Lihat Semua Menu</a>
        <a href="{{ route('menus.create') }}" class="quick-link">➕ Tambah Menu Baru</a>
    </div>

</div>

@endsection
