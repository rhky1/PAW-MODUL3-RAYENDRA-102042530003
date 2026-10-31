@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-1">Transaksi Peminjaman Buku</h3>
                <p class="text-muted small mb-0">Catat peminjaman buku oleh anggota perpustakaan.</p>
            </div>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    {{-- TODO:- Buat dropdown select 'anggota_id' untuk memilih anggota peminjam --}}
                    {{--      - Buat dropdown select 'buku_id' untuk memilih buku yang akan dipinjam --}}
                    {{--      - Buat input field 'tanggal_pinjam' bertipe date --}}
                    {{--      - Tampilkan pesan error validasi di bawah setiap input jika ada error (@error) --}}
                    {{--      - Buat tombol submit untuk menyimpan transaksi peminjaman --}}
                    <div class="mb-3">
                        <label for="anggota_id" class="form-label">Anggota</label>
                        <select name="anggota_id" id="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror" required>
                            <option value="">Pilih Anggota</option>
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}" {{ old('anggota_id') == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                            @endforeach
                        </select>
                        @error('anggota_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="buku_id" class="form-label">Buku</label>
                        <select name="buku_id" id="buku_id" class="form-select @error('buku_id') is-invalid @enderror" required>
                            <option value="">Pilih Buku</option>
                            @foreach ($buku as $b)
                                <option value="{{ $b->id }}" {{ old('buku_id') == $b->id ? 'selected' : '' }}>{{ $b->judul }}</option>
                            @endforeach
                        </select>
                        @error('buku_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam') }}" required>
                        @error('tanggal_pinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
