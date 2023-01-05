<div class="modal fade" id="tambahJenisBarang">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jenis Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('jenisbarang.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 col-md-12">
                        <label for="">Jenis</label>
                        <div class="mb-3">
                            <input type="text" class="form-control input-rounded" name="nama"
                                placeholder="Masukkan Jenis Barang" required>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="">Gambar</label>
                        <div class="mb-3">
                            <input type="file" class="form-control input-rounded" name="gambar"
                                placeholder="Masukkan Gambar" required>
                        </div>
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
