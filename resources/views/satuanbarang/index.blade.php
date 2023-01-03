@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Satuan Barang</h4>
                        <button type="button" class="btn btn-rounded btn-info"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info" data-bs-toggle="modal" data-bs-target="#tambahSatuanBarang"></i>
                        </span>Tambah</button>
                        @include('satuanbarang.modal.insert')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>Satuan Barang</strong></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($satuan_barang as $jb)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $jb->nama }}</td>
                                        <td>
                                            <div class="dropdown">
                                                    <button type="button" class="btn btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#editSatuanBarang-{{ $jb->id }}">Edit</button>
                                                    @include('satuanbarang.modal.edit')
                                                    <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapusSatuanBarang-{{ $jb->id }}">Hapus</button>
                                                    @include('satuanbarang.modal.destroy')
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
