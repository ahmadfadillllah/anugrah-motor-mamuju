@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Barang Keluar</h4>
                        <a href="{{ route('barangkeluar.tambah') }}" class="btn btn-rounded btn-info"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info" data-bs-toggle="modal" data-bs-target="#tambahSatuanBarang"></i>
                        </span>Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tanggal Keluar</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok Sebelumnya</th>
                                        <th>Jumlah Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang_keluar as $bk)
                                    <tr>
                                        <td></td>
                                        <td>{{ $bm->tanggal_masuk }}</td>
                                        <td>{{ $bm->jenisbarang }}</td>
                                        <td>{{ $bm->namabarang }}</td>
                                        <td>{{ $bm->stok_sebelumnya }}</td>
                                        <td>{{ $bm->jumlah }}</td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a> --}}
                                                <button type="button" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#hapusBarangMasuk-{{ $bk->id }}"><i class="fa fa-trash"></i></button>
                                                @include('barangkeluar.modal.destroy')
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
