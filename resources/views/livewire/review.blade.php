<div>
    <div class="row p-1">
        @if ($review->isEmpty())
            <h5 class="mt-2">Belum Ada Penilaian</h5>
        @else
            @foreach ($review as $r)
                <div class="row ms-1">
                    <div class="col-md-2 col-lg-1">
                        @if ($r->users->avatar == null)
                            <img src="{{ asset('assets/img/icon/admin.png') }}" width="40px" style="border-radius:5px">
                        @else
                            <img src="{{ asset('assets/users/reseller/' . $r->users_id . '/avatar/' . $r->users->avatar) }}"
                                width="60px" style="border-radius:5px">
                        @endif
                    </div>
                    <div class="col-md-5 col-lg-8">
                        <h5>{{ $r->users->username }}</h5>
                        @if ($r->rate == 1)
                            1 <i class="fa-solid fa-star" style="color: #CE3ABD;"> </i>
                        @elseif($r->rate == 2)
                            2 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                style="color: #CE3ABD;"> </i>
                        @elseif($r->rate == 3)
                            3 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                style="color: #CE3ABD;"></i><i class="fa-solid fa-star" style="color: #CE3ABD;"> </i>
                        @elseif($r->rate == 4)
                            4 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                style="color: #CE3ABD;"></i><i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i
                                class="fa-solid fa-star" style="color: #CE3ABD;"> </i>
                        @elseif($r->rate == 5)
                            5 <i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                style="color: #CE3ABD;"></i><i class="fa-solid fa-star" style="color: #CE3ABD;"></i><i
                                class="fa-solid fa-star" style="color: #CE3ABD;"></i><i class="fa-solid fa-star"
                                style="color: #CE3ABD;"> </i>
                        @endif
                        <small class="text-muted" style="font-size: 12px"><i class="fa-solid fa-circle fa-2xs"></i>
                            {{ $r->created_at->diffForHumans() }}</small>
                        <p>{{ $r->review }}</p>
                        @if ($r->reply)
                            <div class="p-2 komen">
                                <p>Respon Penjual</p>
                                <p>{{ $r->reply }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        @if ($checkIfExits)
            <div class="col-md-5 col-lg-7 border rounded p-2 mx-2">
                <form wire:submit.prevent="reviewProduk">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="pesan">
                                <h5>Beri nilai pada produk</h5>
                            </label><br>
                            @if (session()->has('message'))
                                <div class="alert alert-danger" style="font-size: 13px">
                                    <i class="fa-solid fa-triangle-exclamation" style="color: #ea0606;"></i>
                                    {{ session('message') }}
                                </div>
                            @endif
                            @error('rating')
                                <small class="text-danger ml-3" style="font-size: 13px">Silahkan Memberi Bintang</small><br>
                            @enderror
                            <span class="star-cb-group">
                                <input type="radio" id="rating-5" wire:model.defer="rating"
                                    value="5"{{ !$checkIfExits ? ' disabled' : '' }} /><label
                                    for="rating-5">5</label>
                                <input type="radio" id="rating-4" wire:model.defer="rating"
                                    value="4"{{ !$checkIfExits ? ' disabled' : '' }} /><label
                                    for="rating-4">4</label>
                                <input type="radio" id="rating-3" wire:model.defer="rating"
                                    value="3"{{ !$checkIfExits ? ' disabled' : '' }} /><label
                                    for="rating-3">3</label>
                                <input type="radio" id="rating-2" wire:model.defer="rating"
                                    value="2"{{ !$checkIfExits ? ' disabled' : '' }} /><label
                                    for="rating-2">2</label>
                                <input type="radio" id="rating-1" wire:model.defer="rating"
                                    value="1"{{ !$checkIfExits ? ' disabled' : '' }} checked="checked" /><label
                                    for="rating-1">1</label>
                            </span>

                            <textarea type="text" class="form-control" id="pesan" placeholder="Tulis penilaian" wire:model.defer="pesan"
                                rows="3" style="resize: none;"{{ !$checkIfExits ? ' disabled' : '' }}></textarea>

                            @error('pesan')
                                <small class="text-danger" style="font-size: 13px">Silahkan Mengisi Review</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn-resell">Kirim</button>
                    </fieldset>
                </form>
            </div>
        @endif

    </div>
</div>
