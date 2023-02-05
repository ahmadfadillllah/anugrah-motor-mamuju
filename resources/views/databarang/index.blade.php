@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Barang</h4>
                        <button type="button" type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#tambahBarang"><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Tambah</button>
                        @include('databarang.modal.insert')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_barang as $jb)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
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
                                    <div class="d-flex">
                                        <a href="{{ route('databarang.edit', $jb->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#hapusBarang-{{ $jb->id }}"><i class="fa fa-trash"></i></button>
                                        @include('databarang.modal.destroy')
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" type="button" class="btn btn-rounded btn-success" data-bs-toggle="modal" data-bs-target="#importBarang"><span
                        class="btn-icon-start text-success"><i class="fa fa-upload color-success"></i>
                    </span>Import</button>
                    @include('databarang.modal.import')
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
