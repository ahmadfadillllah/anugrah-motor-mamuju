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
                        <h4 class="card-title">Tambah Barang Masuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('barangmasuk.insert') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tanggal Masuk</label>
                                        <input type="text" id="date-format" class="form-control" name="tanggal_masuk" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Barang</label>
                                        <select id="barang" class="default-select form-control wide" name="databarang_id" required>
                                            <option selected value="">Pilih barang</option>
                                            @foreach ($barang as $b)
                                            <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Stok</label>
                                        <input type="text" id="stok" class="form-control" name="stok" readonly>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" id="jumlahmasuk" name="jumlah" onkeyup="sum()" required>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Total Stok</label>
                                        <input type="number" class="form-control" id="result" name="stok" readonly>
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
	$(document).ready(function(){
		$("#barang").change(function(){
			var barang_id = $(this).val()
			$.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: "{{ route('barangmasuk.show') }}",
				method: "GET",
				data: {barang_id: barang_id},
				success: function(data){
                    console.log(data);
					document.getElementById('stok').value = data['stok'];
				}
			})
		})
	})

</script>
<script>
    function sum() {
        var stok = document.getElementById('stok').value;
        var jumlahmasuk = document.getElementById('jumlahmasuk').value;
        var result = parseInt(stok) + parseInt(jumlahmasuk);
        if (!isNaN(result)) {
            document.getElementById('result').value = result;
        }
    }
</script>
@include('dashboard.layout.footer')
