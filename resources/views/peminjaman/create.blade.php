@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Transaksi Peminjaman</h2>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Pilih Anggota</label>
            <select name="anggota_id" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($anggota as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Pilih Buku</label>
            <select name="buku_id" class="form-control" required>
                <option value="">-- Pilih Buku --</option>
                @foreach ($buku as $item)
                    <option value="{{ $item->id }}">{{ $item->judul }} (Stok: {{ $item->stok }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>
@endsection