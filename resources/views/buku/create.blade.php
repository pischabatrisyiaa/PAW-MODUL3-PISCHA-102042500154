@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Tambah Transaksi Peminjaman</h2>
    <div class="card border-0 shadow-sm p-4">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih Anggota</label>
                <select name="anggota_id" class="form-select" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($anggota as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih Buku</label>
                <select name="buku_id" class="form-select" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($buku as $item)
                        <option value="{{ $item->id }}">{{ $item->judul }} (Stok: {{ $item->stok }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<!-- @endsection/ -->