<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} | Navelle</title>

    <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">

    <style>
        body {
            background: #fff8fa;
            color: #444;
        }

        .detail-container {
            max-width: 1100px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
        }

        .detail-image {
            width: 100%;
            height: 430px;
            object-fit: contain;
            background: #fff8fa;
            border-radius: 12px;
        }

        .detail-info h2 {
            color: #d66b91;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .detail-price {
            color: #d66b91;
            font-size: 25px;
            font-weight: bold;
            margin: 20px 0;
        }

        .detail-button {
            background: #d66b91;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
        }

        .detail-button:hover {
            background: #bd557c;
            color: white;
        }

        .back-button {
            color: #d66b91;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>

@include('guest.partials.navbar')

<div class="container detail-container">
    <div class="row align-items-center">

        <div class="col-md-6 mb-4">
            @if ($produk->gambar)
                <img
                    src="{{ asset('storage/' . $produk->gambar) }}"
                    alt="{{ $produk->nama_produk }}"
                    class="detail-image"
                >
            @else
                <div class="detail-image d-flex align-items-center justify-content-center">
                    Gambar produk belum tersedia
                </div>
            @endif
        </div>

        <div class="col-md-6 detail-info">
            <h2>{{ $produk->nama_produk }}</h2>

            <p>
                Kategori:
                {{ $produk->kategori_nama ?? $produk->kategori ?? '-' }}
            </p>

            <div class="detail-price">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </div>

            <p>{{ $produk->deskripsi ?? 'Belum ada deskripsi produk.' }}</p>

            <p>Stok: {{ $produk->stok }}</p>

            @if ($produk->stok > 0)
                <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="detail-button">
                        <i class="fa fa-shopping-cart"></i>
                        Tambahkan ke Keranjang
                    </button>
                </form>
            @else
                <p class="text-danger">Stok produk sedang habis.</p>
            @endif

            <a href="{{ url('/') }}" class="back-button">
                &larr; Kembali ke halaman utama
            </a>
        </div>

    </div>
</div>


<div class="container mb-5">
    <div class="detail-container">
        <h3 style="color: #d66b91; margin-bottom: 20px;">
            Tulis Ulasan Produk
        </h3>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form action="{{ route('ulasan-pelanggan.store') }}" method="POST">            @csrf

            <input type="hidden" name="produk_id" value="{{ $produk->id }}">

            <div class="mb-3">
                <label for="nama_pengulas">Nama</label>
                <input
                    type="text"
                    name="nama_pengulas"
                    id="nama_pengulas"
                    class="form-control"
                    value="{{ old('nama_pengulas', auth()->user()->name ?? '') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="email_pengulas">Email Aktif</label>
                <input
                    type="email"
                    name="email_pengulas"
                    id="email_pengulas"
                    class="form-control"
                    value="{{ old('email_pengulas', auth()->user()->email ?? '') }}"
                    placeholder="Masukkan Gmail aktif"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="rating">Rating Produk</label>
                <select name="rating" id="rating" class="form-control" required>
                    <option value="">-- Pilih Rating --</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}"
                            {{ old('rating') == $i ? 'selected' : '' }}>
                            {{ $i }} Bintang
                        </option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="komentar">Komentar</label>
                <textarea
                    name="komentar"
                    id="komentar"
                    class="form-control"
                    rows="4"
                    placeholder="Tuliskan pengalaman kamu menggunakan produk ini..."
                    required
                >{{ old('komentar') }}</textarea>
            </div>

            <button type="submit" class="detail-button">
                Kirim Ulasan
            </button>
        </form>
    </div>
</div>


@include('guest.partials.footer')

<script src="{{ asset('assets-guest/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets-guest/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets-guest/js/main.js') }}"></script>

</body>
</html>
