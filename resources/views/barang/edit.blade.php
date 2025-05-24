<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f5f7fa, #c3cfe2);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        <h2 class="mb-4">✏️ Edit Barang</h2>

        <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" class="form-control" name="kode" value="{{ old('kode', $barang->kode) }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" class="form-control" name="harga_satuan" value="{{ old('harga_satuan', $barang->harga_satuan) }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                @if ($barang->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $barang->foto) }}" width="100" class="rounded">
                    </div>
                @endif
                <input type="file" class="form-control" name="foto">
            </div>

            <a href="{{ route('barangs.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-primary">💾 Update</button>
        </form>
    </div>
</div>
</body>
</html>
