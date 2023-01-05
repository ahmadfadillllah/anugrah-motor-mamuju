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
                        <h4 class="card-title">Tambah Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('databarang.insert') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Jenis Barang</label>
                                        <select id="inputState" class="default-select form-control wide" name="jenisbarang_id">
                                            <option selected value="">Pilih salah satu</option>
                                            @foreach ($jenis_barang as $jb)
                                                <option value="{{ $jb->id }}">{{ $jb->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Status</label>
                                        <select id="inputState" class="default-select form-control wide" name="status">
                                            <option selected value="">Pilih salah satu</option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                                            <option value="Proses Pengiriman">Proses Pengiriman</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Satuan Barang</label>
                                        <select id="inputState" class="default-select form-control wide" name="satuanbarang_id">
                                            <option selected value="">Pilih salah satu</option>
                                            @foreach ($satuan_barang as $sb)
                                                <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
