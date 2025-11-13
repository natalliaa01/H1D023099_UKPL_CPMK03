@extends('layouts.app')

@section('content')

<style>
    .form-container {
        background: #ffffff;
        padding: 35px;
        border-radius: 28px;
        max-width: 650px;
        margin: auto;
        border: 1px solid #eadccd;
        box-shadow: 0 20px 50px rgba(0,0,0,0.07);
    }

    h1 {
        font-size: 30px;
        font-weight: 700;
        color: #3c2b20;
        margin-bottom: 25px;
        text-align: center;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #4a3a2f;
    }

    input, textarea {
        width: 100%;
        padding: 12px 14px;
        border-radius: 14px;
        border: 1px solid #d4c2b3;
        margin-bottom: 18px;
        font-size: 15px;
        background: #fcf9f6;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
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
    }

    .btn-submit:hover {
        background: #6F4529;
        transform: translateY(-2px);
    }
</style>

<div class="form-container">

    <h1>Tambah Menu Baru</h1>

    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        
        <label>Nama Menu</label>
        <input type="text" name="name" id="name" required> {{-- Tambahkan id="name" --}}

        <label>Harga</label>
        <input type="number" name="price" id="price" required> {{-- Tambahkan id="price" --}}

        <label>Deskripsi</label>
        <textarea name="description" id="description"></textarea> {{-- Tambahkan id="description" --}}

        <label>Foto Menu</label>
        <input type="file" name="image" accept="image/*">

        <button class="btn-submit">Simpan Menu</button>
    </form>

</div>

@endsection
