@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Ulasan
        </title>
    </head>

    <style>
    .testimonial-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        background-color: #fff;
        margin-bottom: 20px;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    .testimonial-card blockquote {
        padding: 20px;
        height: 100%; 
        margin: 0;
        border-left: 12px solid #003EB7; 
        display: flex;
        align-items: center; 
    }

    .testimonial-card blockquote p {
        margin: 0; 
    }

    .testimonial-card .v-card {
        padding: 40px;
    } 

    .testimonial-card img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #fff; 
    }

    .testimonial-card .author-name {
        margin-left: 4px;
    }

    .testimonial-card .author-name span {
        display: block;
        font-weight: bold;
        color: #003EB7; 
    }

    .rating {
        margin-top: 10px;
    }

    .rating p {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
    }

    .delete-button {
        border: none;
        background: none;
        cursor: pointer;
        outline: none;
        font-size: 18px;
    }

    .delete-button:hover {
        color: red;a
    }
</style>

<div class="container-details">
        <h1 class="fw-bold my-4 text-center">Ulasan</h1>

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
            @if ($ulasan->isEmpty())
                <div class="col-flex mt-4">
                    <p class="text-center h5"><strong>Ulasan tidak ada</strong></p>
                </div>
            @endif

            <div class="container">
                <div class="row">
                    @foreach ($ulasan as $item)
                        <div class="col-lg-4 mb-4">
                            <div class="testimonial-card">
                            <div class="rating d-flex justify-content-between align-items-center">
                                <p class="@if ($item['rating'] == 'Baik') text-success @elseif ($item['rating'] == 'Cukup') text-warning @else text-danger @endif fw-bold">{{ $item['rating'] }}</p>
                                
                                @auth
                                    @if ($item['id_user'] == Auth::user()->id_user)
                                        <button type="button" class="btn delete-button" data-bs-toggle="modal"
                                            data-bs-target="#confirmDelete" data-index="{{ $item->id_ulasan }}">
                                            <i class="fa fa-trash" style="color: red"></i>
                                        </button>
                                    @endif
                                @endauth
                            </div>

                                <div class="d-flex v-card align-items-center">
                                    @if ($item->user->photo == null)
                                        <img src="{{ asset('images/profilepic.png') }}" alt="Image"
                                            class="img-fluid rounded-circle" width="60" height="60"
                                            style="object-fit: cover">
                                    @else
                                        <img src="{{ asset('storage/profileUser/' . $item->user->photo) }}"
                                            alt="Image" class="img-fluid rounded-circle" width="60" height="60"
                                            style="object-fit: cover">
                                    @endif

                                    <div class="author-name">
                                        <span>{{ $item->user->nama }}</span>
                                    </div>
                                    <p class="ms-auto card-text fs-6">{{ $item['tanggal'] }}</p>
                                </div>
                                <blockquote>
                                    <p>{{ $item['ulasan'] }}</p>
                                </blockquote>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

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
                            <textarea class="form-control" id="ulasan" rows="3" name="ulasan"
                                style="min-height: 100px;"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" style="background-color: #003EB7">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal konfirmasi hapus ulasan --}}
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confimDeleteTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body align-content-center">
                    <p class="text-center mb-0">Apakah Anda yakin ingin manghapus ulasan?</p>
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
        setTimeout(function () {
            var alert = document.getElementById('alerts');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = 0;

                setTimeout(function () {
                    alert.remove();
                }, 500);
            }
        }, 3500);

        document.addEventListener('DOMContentLoaded', function () {
            $('.delete-button').on('click', function () {
                var index = $(this).data('index');
                console.log('Index:', index); // debug only
                $('#indexUlasan').val(index);
            });
        });
    </script>
@endsection
