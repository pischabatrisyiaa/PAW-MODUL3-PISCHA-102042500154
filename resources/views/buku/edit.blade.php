@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Edit Data Buku</h2>
    <div class="card border-0 shadow-sm p-4">
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Buku</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok</label>
                <input type="number" name="stok" class="form-control" min="0" value="{{ old('stok', $buku->stok) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection