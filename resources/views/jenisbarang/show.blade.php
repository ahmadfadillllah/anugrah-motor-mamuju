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
                        <h4 class="card-title">Data Barang</h4>
                        <a href="{{ route('databarang.tambah') }}" type="button" class="btn btn-rounded btn-info"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>Jenis Barang</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Stok</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_barang as $jb)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $jb->jenis_barang->nama }}</td>
                                        <td>{{ $jb->nama }}</td>
                                        <td>{{ $jb->stok }}</td>
                                        <td>
                                            @if ($jb->status == 'Tersedia')
                                            <span class="badge badge-lg light badge-success">{{ $jb->status }}</span>
                                            @elseif ($jb->status == 'Tidak Tersedia')
                                            <span class="badge badge-lg light badge-warning">{{ $jb->status }}</span>
                                            @else
                                            <span class="badge badge-lg light badge-info">{{ $jb->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                    <a href="{{ route('databarang.edit', $jb->id) }}" type="button" class="btn btn-warning btn-xs">Edit</a>
                                                    <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapusJenisBarang-{{ $jb->id }}">Hapus</button>
                                                    @include('databarang.modal.destroy')
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
