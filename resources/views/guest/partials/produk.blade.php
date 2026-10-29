<section class="navelle-products">
    <div class="navelle-products-heading">
        <span>OUR COLLECTION</span>
        <h2>Produk Navelle</h2>
        <p>Temukan gaya favoritmu untuk setiap hari.</p>
    </div>

    @if ($produk->isEmpty())
        <p class="navelle-empty">Belum ada produk yang tersedia.</p>
    @else
        <div class="navelle-product-grid">
            @foreach ($produk as $item)
                <article class="navelle-product-card">
                    <div class="navelle-product-image">
                        @if ($item->gambar)
                            <img
                                src="{{ asset($item->gambar) }}"
                                alt="{{ $item->nama_produk }}"
                            >
                        @else
                            <div class="navelle-no-image">
                                Navelle
                            </div>
                        @endif
                    </div>

                    <div class="navelle-product-info">
                        <p class="navelle-category">
                            {{ $item->kategori_nama ?? $item->kategori ?? 'Tanpa kategori' }}
                        </p>

                        <h3>{{ $item->nama_produk }}</h3>

                        <p class="navelle-description">
                            {{ $item->deskripsi ?: 'Pilihan fashion untuk gaya sehari-hari.' }}
                        </p>

                        <p class="navelle-price">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>

                        <p class="navelle-stock">
                            Stok tersedia: {{ $item->stok }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</section>

<style>
    .navelle-products {
        max-width: 1200px;
        margin: 0 auto;
        padding: 45px 6%;
    }

    .navelle-products-heading {
        text-align: center;
        margin-bottom: 32px;
    }

    .navelle-products-heading span {
        color: #c46786;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 3px;
    }

    .navelle-products-heading h2 {
        color: #51454a;
        font-size: 30px;
        margin: 10px 0;
    }

    .navelle-products-heading p {
        color: #81737a;
    }

    .navelle-product-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .navelle-product-card {
        background: #ffffff;
        border: 1px solid #f3e2e9;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(115, 70, 87, 0.07);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .navelle-product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(115, 70, 87, 0.12);
    }

    .navelle-product-image {
        height: 230px;
        background: #fff0f5;
        overflow: hidden;
    }

    .navelle-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .navelle-no-image {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #c46786;
        font-size: 25px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    .navelle-product-info {
        padding: 20px;
    }

    .navelle-category {
        color: #c46786;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .navelle-product-info h3 {
        color: #51454a;
        font-size: 19px;
        margin: 0 0 10px;
    }

    .navelle-description {
        color: #81737a;
        font-size: 14px;
        line-height: 1.6;
        min-height: 44px;
    }

    .navelle-price {
        color: #c46786;
        font-size: 19px;
        font-weight: bold;
        margin: 15px 0 8px;
    }

    .navelle-stock {
        color: #81737a;
        font-size: 13px;
        margin-bottom: 0;
    }

    .navelle-empty {
        text-align: center;
        padding: 30px;
        background: #fff0f5;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .navelle-product-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .navelle-product-image {
            height: 180px;
        }
    }

    @media (max-width: 480px) {
        .navelle-product-grid {
            grid-template-columns: 1fr;
        }

        .navelle-product-image {
            height: 230px;
        }
    }
</style>
