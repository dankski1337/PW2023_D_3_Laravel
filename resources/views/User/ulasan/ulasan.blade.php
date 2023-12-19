@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Ulasan
        </title>
    </head>

    <style>
        body {
            background-color: #F8F7FC;
        }
    </style>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">
            Ulasan
        </h1>

        @if (session('success'))
            <div class="alert alert-success mt-4 text-center" id="alerts">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-4 text-center" id="alerts">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        @auth
            <div class="col d-flex">
                <div class="me-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ulasanModal"
                        style="background-color: #003EB7">
                        Tambah Ulasan
                    </button>
                </div>
            </div>
        @endauth
        <div class="col align-items-center-mt-4">
            @foreach ($ulasan as $item)
                <div class="row-lg-flex row-md-flex rw-sm-flex mt-4">
                    <div class="card w-100 p-2">
                        <div class="card-body">
                            <div class="col d-flex m-2">
                                <div class="me-auto d-flex align-items-center">
                                    <img src="{{ asset('storage/profileUser/' . $item->user->photo) }}" alt=""
                                        class="image-fluid rounded-circle" width="32" height="32"
                                        style="object-fit: cover">
                                    <p class="ms-2 card-text fs-5">{{ $item->user->nama }}</p>
                                </div>
                                <p class="ms-2 card-text fs-6">{{ $item['tanggal'] }}</p>
                            </div>
                            <div class="col d-flex m-2">
                                <p
                                    class="
                                @if ($item['rating'] == 'Baik') text-success
                                @elseif ($item['rating'] == 'Cukup')
                                    text-warning
                                @else
                                    text-danger @endif
                                card-text fw-bold">
                                    {{ $item['rating'] }}</p>
                            </div>
                            <div class="col d-flex m-2">
                                <p class="card-text">{{ $item['ulasan'] }}</p>
                                @auth
                                    @if ($item['id_user'] == Auth::user()->id_user)
                                        <button type="button" class="btn ms-auto delete-button" data-bs-toggle="modal"
                                            data-bs-target="#confirmDelete" data-index="{{ $item->id_ulasan }}"><i
                                                class="fa fa-trash fs-5" style="color: red"></i></button>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- pagination --}}
            <div class="mt-2 d-flex justify-content-center">
                {!! $ulasan->links() !!}
            </div>
        </div>
    </div>

    {{-- modal tambah ulasan --}}
    <div class="modal fade" id="ulasanModal" tabindex="-1" role="dialog" aria-labelledby="ulasanModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="ulasanModalTitle">Tambah Ulasan</h5>
                </div>
                <div class="modal-body col-auto">
                    <form method="POST" action="{{ route('ulasan.create') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="rating">Rating</label>
                            <select class="form-select" aria-label="ratingLabel" id="rating" name="rating">
                                <option value="" selected>Pilih Rating</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="ulasan">Ulasan</label>
                            <textarea class="form-control" id="ulasan" rows="3" name="ulasan" style="min-height: 100px;"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #003EB7">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal confirm hapus ulasan --}}
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confimDeleteTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body align-content-center">
                    <p>
                        Apakah Anda yakin ingin manghapus ulasan?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form action="{{ route('ulasan.destroy', $item->id_ulasan) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id_ulasan" id="indexUlasan">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        setTimeout(function() {
            var alert = document.getElementById('alerts');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = 0;

                setTimeout(function() {
                    alert.remove();
                }, 500);
            }
        }, 3500);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete-button').on('click', function() {
                var index = $(this).data('index');
                console.log('Index:', index); // Add this line for debugging
                $('#indexUlasan').val(index);
            });
        });
    </script>
@endsection
