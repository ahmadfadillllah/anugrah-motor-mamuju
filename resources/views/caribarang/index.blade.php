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
                        <a href="{{ route('dashboard.index') }}" type="button" class="btn btn-rounded btn-info">Kembali</a>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $jb)
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
