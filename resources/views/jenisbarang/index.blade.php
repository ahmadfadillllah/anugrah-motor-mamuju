@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <div class="row page-titles">
            <button href="{{ route('jenisbarang.insert') }}" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#tambahJenisBarang"><span
                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
            </span>Tambah</button>
            @include('jenisbarang.modal.insert')
        </div>

        <div class="row">
            @foreach ($jenis_barang as $db)
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="new-arrival-product">
                            <div class="new-arrivals-img-contnent">
                                <img class="img-fluid" src="{{ asset('admin/dompet.dexignlab.com/xhtml/images/barang') }}/{{ $db->gambar }}" alt="">
                            </div>
                            <div class="new-arrival-content text-center mt-3">
                                <h4><a href="{{ route('jenisbarang.show', $db->id) }}">{{ $db->nama }}</a></h4>
                                <button type="button" class="btn light btn-warning" data-bs-toggle="modal" data-bs-target="#editJenisBarang-{{ $db->id }}">Edit</button>
                                @include('jenisbarang.modal.edit')
                                <button type="button" class="btn light btn-danger" data-bs-toggle="modal" data-bs-target="#hapusJenisBarang-{{ $db->id }}">Hapus</button>
                                @include('jenisbarang.modal.destroy')
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



