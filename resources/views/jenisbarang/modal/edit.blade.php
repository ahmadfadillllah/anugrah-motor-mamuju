<div class="modal fade" id="editJenisBarang-{{ $db->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jenis Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('jenisbarang.update', $db->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 col-md-12">
                        <label for="">Jenis</label>
                        <div class="mb-3">
                            <input type="text" class="form-control input-rounded" name="nama"
                                value="{{ $db->nama }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
