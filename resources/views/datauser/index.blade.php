@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('notif.index')
        <!-- row -->
        <div class="row">
            @foreach ($user as $u)
            <div class="col-xl-4 col-lg-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="text-center p-3 overlay-box " style="background-image: url(images/big/img1.jpg);">
                        <div class="profile-photo">
                            <img src="{{ asset('admin/dompet.dexignlab.com/xhtml/images/profile') }}/{{ $u->avatar }}" width="100" class="img-fluid rounded-circle" alt="">
                        </div>
                        <h3 class="mt-3 mb-1 text-white">{{ $u->name }}</h3>
                        <p class="text-white mb-0">{{ $u->role }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Email</span> <strong class="text-muted">{{ $u->email }}	</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Handphone</span> 		<strong class="text-muted">{{ $u->no_hp }}</strong></li>
                    </ul>
                    <div class="card-footer border-0 mt-0">
                        <button type="button" class="btn btn-warning btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#destroyUser-{{ $u->id }}">Hapus User</button>
                        @include('datauser.modal.destroy')
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
