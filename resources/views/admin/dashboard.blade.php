@extends('layouts.admin.app')

@section('title', 'Dashboard - Navelle')
@section('page-heading', 'Dashboard Admin')

@section('content')

    <div class="mb-4">
        <h3 style="color: #bd6684; font-weight: bold;">
            Selamat datang kembali, Admin Navelle!
        </h3>
        <p style="color: #94858c;">
            Berikut ringkasan pengelolaan toko Navelle.
        </p>
    </div>

    <div class="row">
        <div class="col-12 col-xl-6 mb-4">
            <div class="customer-card p-4">
                <h5 style="color:#bd6684;">Kunjungan Terbaru</h5>
                <div style="height:260px;">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mb-4">
            <div class="customer-card p-4">
                <h5 style="color:#bd6684;">Kinerja Toko</h5>
                <div style="height:260px;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mb-4">
            <div class="customer-card p-4">
                <h5 style="color:#bd6684;">Ringkasan Data Toko</h5>
                <div style="height:260px;">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mb-4">
            <div class="customer-card p-4">
                <h5 style="color:#bd6684;">Pemberitahuan Terbaru</h5>

                <div class="mb-4">
                    <strong>Pengelolaan Pelanggan</strong>
                    <p>Periksa data pelanggan yang terdaftar di Navelle.</p>
                    <a href="{{ route('pelanggan.index') }}"
                       style="color:#bd6684;">
                        Lihat Data Pelanggan
                    </a>
                </div>

                <hr>

                <div class="mb-4">
                    <strong>Pengelolaan Pengguna</strong>
                    <p>Periksa akun pengguna yang terdaftar pada sistem.</p>
                    <a href="{{ route('users.index') }}"
                       style="color:#bd6684;">
                        Lihat Data Pengguna
                    </a>
                </div>

                <hr>

                <div>
                    <strong>Pengelolaan Produk</strong>
                    <p>Periksa informasi produk yang tersedia di toko.</p>
                    <a href="{{ route('produk.index') }}"
                       style="color:#bd6684;">
                        Lihat Data Produk
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="customer-card p-4">
                <h5 style="color:#bd6684;">Menu Pengelolaan Toko</h5>

                <div class="row mt-3">
                    <div class="col-12 col-md-4 mb-3">
                        <h6>Data Pelanggan</h6>
                        <p>Kelola informasi pelanggan Navelle.</p>
                        <a href="{{ route('pelanggan.index') }}"
                           class="btn-navelle">
                            Kelola Pelanggan
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <h6>Data Pengguna</h6>
                        <p>Kelola akun pengguna sistem.</p>
                        <a href="{{ route('users.index') }}"
                           class="btn-navelle">
                            Kelola Pengguna
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <h6>Data Produk</h6>
                        <p>Kelola informasi produk Navelle.</p>
                        <a href="{{ route('produk.index') }}"
                           class="btn-navelle">
                            Kelola Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="customer-card p-4">
                <h5 style="color:#bd6684;">Daftar Pesanan</h5>
                <p style="color:#94858c;">
                    Bagian ini masih berupa contoh tampilan, bukan data pesanan dari database.
                </p>

                <div class="table-responsive">
                    <table class="table customer-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Pesanan</th>
                                <th>Status</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>#NV001</td>
                                <td>Diproses</td>
                                <td>Contoh Pelanggan</td>
                                <td>Data contoh</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>#NV002</td>
                                <td>Menunggu</td>
                                <td>Contoh Pelanggan</td>
                                <td>Data contoh</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets-admin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/tooplate-scripts.js') }}"></script>

    <script>
        $(function () {
            if (typeof drawLineChart === 'function') {
                drawLineChart();
            }

            if (typeof drawBarChart === 'function') {
                drawBarChart();
            }

            if (typeof drawPieChart === 'function') {
                drawPieChart();
            }

            $(window).on('resize', function () {
                if (typeof updateLineChart === 'function') {
                    updateLineChart();
                }

                if (typeof updateBarChart === 'function') {
                    updateBarChart();
                }
            });
        });
    </script>
@endpush
