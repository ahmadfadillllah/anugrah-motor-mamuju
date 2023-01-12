@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <form action="{{ route('barangkeluar.edit') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Barang</h4>
                            <button type="submit" class="btn btn-rounded btn-info"><span
                                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Edit</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check custom-checkbox ms-2">
                                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>No</th>
                                            <th>Jenis Barang</th>
                                            <th>Nama Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $b)
                                        <tr>
                                            <td>
                                                <div class="form-check custom-checkbox ms-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckBox2" name="id[]" value="{{ $b->id }}">
                                                    <label class="form-check-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $b->jenis_barang->nama }}</td>
                                            <td>{{ $b->nama }}</td>
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
