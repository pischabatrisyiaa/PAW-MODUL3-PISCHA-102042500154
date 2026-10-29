@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Detail Buku</h2>
            <p class="text-muted small mb-0">Informasi lengkap dan riwayat peminjaman buku ini.</p>
        </div>
        <div>
            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary btn-sm me-1">Edit</a>
            <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Kembali</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="fw-bold text-dark mb-3">{{ $buku->judul }}</h3>
                    <div class="row mb-2">
                        <div class="col-sm-3 text-muted">Penulis</div>
                        <div class="col-sm-9 fw-semibold">{{ $buku->penulis }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 text-muted">Penerbit</div>
                        <div class="col-sm-9 fw-semibold">{{ $buku->penerbit }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 text-muted">Tahun Terbit</div>
                        <div class="col-sm-9 fw-semibold">{{ $buku->tahun_terbit }}</div>
                    </div>
                </div>
                <div class="col-md-4 text-center border-start">
                    <div class="text-muted small mb-1">Status Ketersediaan Stok</div>
                    <div class="display-5 fw-bold text-dark mb-1">{{ $buku->stok }} <span class="fs-6 text-muted">eksemplar</span></div>
                    @if($buku->stok > 0)
                        <span class="badge bg-secondary px-3 py-2">Tersedia untuk dipinjam</span>
                    @else
                        <span class="badge bg-danger px-3 py-2">Stok Habis</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="fw-bold mb-0 text-dark">Riwayat Peminjaman Buku Ini</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Nama Anggota</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($buku->peminjaman as$item)
                        <tr>
                            <td class="ps-3 fw-semibold">{{ $item->anggota->nama ?? '-' }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $item->status === 'dipinjam' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Buku ini belum pernah dipinjam.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

