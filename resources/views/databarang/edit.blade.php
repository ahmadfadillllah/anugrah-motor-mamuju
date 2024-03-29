@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('databarang.update', $data_barang->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $data_barang->nama }}" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Jenis Barang</label>
                                        <select id="inputState" class="default-select form-control wide" name="jenisbarang_id">
                                            <option {{ $data_barang->jenisbarang_id == $data_barang->jenisbarang_id ? "$data_barang->jenis_barang->nama" : ""}} value="{{ $data_barang->jenisbarang_id }}">{{ $data_barang->jenis_barang->nama }}
                                            @foreach ($jenis_barang as $jb)
                                                <option value="{{ $jb->id }}">{{ $jb->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="mb-3 col-md-6">
                                        <label class="form-label">Status</label>
                                        <select id="inputState" class="default-select form-control wide" name="status">
                                            <option {{ $data_barang->status == 'Tersedia' ? "Tersedia" : ""}} value="{{ $data_barang->status }}">{{ $data_barang->status }}
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                                            <option value="Proses Pengiriman">Proses Pengiriman</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
