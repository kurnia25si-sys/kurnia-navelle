
{{-- Pesan berhasil --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Pesan kesalahan umum --}}
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- Pesan kesalahan validasi --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>

        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
