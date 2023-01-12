@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('barangmasuk.update') }}" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Barang Masuk</h4>
                            <button type="submit" class="btn btn-rounded btn-success"><span
                                class="btn-icon-start text-success"><i class="fa fa-upload color-success"></i>
                            </span>Update</button>
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                            @csrf
                                            @foreach ($barang as $b)
                                            <tr>
                                                <td><strong>{{ $loop->iteration }}</strong></td>
                                                <td>{{ $b->jenis_barang->nama }}</td>
                                                <td>{{ $b->nama }}</td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" value="{{ $b->id }}" name="id[]" hidden>
                                                    <input type="number" class="form-control form-control-sm" value="{{ $b->stok }}" name="stok_sebelumnya[]" hidden>
                                                    <input type="number" class="form-control form-control-sm" value="{{ $b->stok }}" name="jumlah[]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('dashboard.layout.footer')
