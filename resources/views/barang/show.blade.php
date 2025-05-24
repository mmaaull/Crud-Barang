<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f5f7fa, #c3cfe2);
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="card p-4">
        <h2 class="mb-4">📋 Detail Barang</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Kode:</strong> {{ $barang->kode }}</li>
            <li class="list-group-item"><strong>Nama:</strong> {{ $barang->nama_barang }}</li>
            <li class="list-group-item"><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</li>
            <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($barang->harga_satuan, 0, ',', '.') }}</li>
            <li class="list-group-item"><strong>Jumlah:</strong> {{ $barang->jumlah }}</li>
            <li class="list-group-item">
                <strong>Foto:</strong><br>
                @if ($barang->foto)
                    <img src="{{ asset('storage/' . $barang->foto) }}" width="120">
                @else
                    <span class="text-muted">Tidak ada foto</span>
                @endif
            </li>
        </ul>
        <a href="{{ route('barangs.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
</div>
</body>
</html>
