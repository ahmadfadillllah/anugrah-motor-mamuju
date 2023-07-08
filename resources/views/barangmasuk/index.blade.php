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
                        <h4 class="card-title">Barang Masuk</h4>
                        <a href="{{ route('barangmasuk.tambah') }}" class="btn btn-rounded btn-info"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info" data-bs-toggle="modal" data-bs-target="#tambahSatuanBarang"></i>
                        </span>Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok Sebelumnya</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang_masuk as $bm)
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
                                                <button type="button" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#hapusBarangMasuk-{{ $bm->id }}"><i class="fa fa-trash"></i></button>
                                                @include('barangmasuk.modal.destroy')
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
