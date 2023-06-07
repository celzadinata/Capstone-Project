@extends('layouts_pengusaha.app')
@section('title', 'Review')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($reviews as $review)
                    @if ($review->rate === null)
                        @continue
                    @endif

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <span><b>{{ $review->produk->nama_produk }} - </b></span>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rate)
                                            <img src="/assets/img/icon/star20.png" alt="">
                                        @endif
                                    @endfor
                                    <h6>{{ date('Y-m-d H:i', strtotime($review->created_at)) }}</h6>
                                </h3>
                                <p class="card-category">{{ $review->review }}</p>
                            </div>
                            <hr>
                            <div class="card-header">
                                <div class="stats">
                                    @if ($review->reply === null)
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $review->id }}">
                                            Beri Komentar
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-primary" hidden>
                                            Beri Komentar
                                        </button>
                                    @endif
                                    <h3 class="card-title"><b>Komentar</b></h3>
                                    <p class="card-category">{{ $review->reply }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- modal --}}
                        <div class="modal fade" id="exampleModal{{ $review->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Beri Komentar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('review.update', ['id' => $review->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <input class="form-control" value="{{ $review->reply }}" type="text"
                                                    name="reply" id="reply">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
