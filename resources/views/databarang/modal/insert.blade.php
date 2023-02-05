<div class="modal fade" id="tambahBarang">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('databarang.insert') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Jenis Barang</label>
                        <select id="inputState" class="default-select form-control wide" name="jenisbarang_id">
                            <option selected value="">Pilih salah satu</option>
                            @foreach ($jenis_barangg as $jb)
                                <option value="{{ $jb->id }}">{{ $jb->id }} | {{ $jb->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Status</label>
                        <select id="inputState" class="default-select form-control wide" name="status">
                            <option selected value="">Pilih salah satu</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                            <option value="Proses Pengiriman">Proses Pengiriman</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
