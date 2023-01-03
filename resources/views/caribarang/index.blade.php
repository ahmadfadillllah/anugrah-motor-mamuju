@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <div class="row page-titles">
            <a href="{{ route('databarang.tambah') }}" class="btn btn-rounded btn-info"><span
                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
            </span>Tambah</a>
        </div>

        <div class="row">
            @foreach ($barang as $db)
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="new-arrival-product">
                            <div class="new-arrivals-img-contnent">
                                <img class="img-fluid" src="{{ asset('admin/dompet.dexignlab.com/xhtml/images/barang') }}/{{ $db->gambar }}" alt="">
                            </div>
                            <div class="new-arrival-content text-center mt-3">
                                <h4><a href="ecom-product-detail.html">{{ $db->nama }}</a></h4>
                                <p>Jenis Barang: {{ $db->jenis_barang->nama }}</p>
                                <p>Jumlah: {{ $db->jumlah }} {{ $db->satuan_barang->nama }}</p>
                                @if (Auth::user()->role == 'admin')
                                <a href="{{ route('databarang.edit', $db->id) }}" class="btn light btn-warning">Edit</a>
                                <button type="button" class="btn light btn-danger" data-bs-toggle="modal" data-bs-target="#hapusBarang-{{ $db->id }}">Hapus</button>
                                @include('databarang.modal.destroy')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
