@extends('layouts.app')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<style>
    .menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .menu-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #3c2b20;
    }

    .btn-add {
        background: #8B5E3C;
        color: #fff;
        padding: 12px 22px;
        border-radius: 100px;
        font-size: 14px;
        text-decoration: none;
        transition: .25s ease;
        box-shadow: 0 8px 20px rgba(139, 94, 60, 0.25);
    }

    .btn-add:hover {
        background: #6F4529;
        transform: translateY(-3px);
    }

    .menu-grid {
        display: grid;
        gap: 26px;
    }

    @media (min-width: 900px) {
        .menu-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .menu-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #eadccd;
        transition: .35s ease;
        box-shadow: 0 14px 28px rgba(0,0,0,0.08);
    }

    .menu-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    .menu-thumb {
        height: 170px;
        background-size: cover;
        background-position: center;
        filter: brightness(0.96);
    }

    .menu-body {
        padding: 20px;
    }

    .menu-body h3 {
        font-size: 20px;
        margin-bottom: 6px;
        font-weight: 700;
        color: #3b2a1f;
    }

    .menu-price {
        font-size: 17px;
        font-weight: 700;
        color: #8B5E3C;
        margin-bottom: 10px;
    }

    .menu-desc {
        font-size: 14px;
        color: #7d6d61;
        margin-bottom: 20px;
        line-height: 1.5;
    }

    .menu-actions {
        padding: 0 20px 20px;
        display: flex;
        justify-content: space-between;
    }

    .btn-edit {
        background: #e7d8c8;
        padding: 8px 18px;
        border-radius: 100px;
        font-size: 13px;
        color: #4a3a2f;
        text-decoration: none;
        transition: .25s;
    }

    .btn-edit:hover {
        background: #d2bca5;
    }

    .btn-delete {
        background: #f0c4ba;
        padding: 8px 18px;
        border-radius: 100px;
        font-size: 13px;
        border: none;
        cursor: pointer;
        color: #4a2e27;
        transition: .25s;
    }

    .btn-delete:hover {
        background: #e5a798;
    }
</style>

{{-- HEADER --}}
<div class="menu-header">
    <h1>Menu Lily Café</h1>
    <a href="{{ route('menus.create') }}" class="btn-add">+ Tambah Menu</a>
</div>

{{-- ALERT --}}
@if (session('success'))
    <div style="background:#e8f6e8; border:1px solid #b5dfb5; padding:12px 18px; border-radius:10px; margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

{{-- JIKA KOSONG --}}
@if ($menus->count() == 0)

    <p style="text-align:center; padding:50px; color:#7a695f;">Menu masih kosong.</p>

@else

{{-- GRID --}}
<div class="menu-grid">

    @foreach ($menus as $menu)

        <div class="menu-card">

            {{-- FOTO MENU --}}
            <div class="menu-thumb"
                style="background-image:url('{{ $menu->image ? Storage::url($menu->image) : "https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=60" }}');">
            </div>

            <div class="menu-body">
                <h3>{{ $menu->name }}</h3>
                <div class="menu-price">Rp {{ number_format($menu->price) }}</div>
                <p class="menu-desc">{{ $menu->description ?: 'Tidak ada deskripsi.' }}</p>
            </div>

            <div class="menu-actions">
                <a href="{{ route('menus.edit', $menu->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                </form>
            </div>

        </div>

    @endforeach

</div>
@endif

@endsection
