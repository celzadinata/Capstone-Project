<div>
    <div class="row p-2">
        <div class="col-md-5 col-lg-5 border rounded p-2">
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
                        <span class="star-cb-group">
                            <input type="radio" id="rating-5" wire:model="rating" value="5" /><label
                                for="rating-5">5</label>
                            <input type="radio" id="rating-4" wire:model="rating" value="4" /><label
                                for="rating-4">4</label>
                            <input type="radio" id="rating-3" wire:model="rating" value="3" /><label
                                for="rating-3">3</label>
                            <input type="radio" id="rating-2" wire:model="rating" value="2" /><label
                                for="rating-2">2</label>
                            <input type="radio" id="rating-1" wire:model="rating" value="1"
                                checked="checked" /><label for="rating-1">1</label>
                        </span>
                        @if (!$checkIfExits)
                            <textarea type="text" class="form-control" id="pesan" placeholder="Tulis penilaian" wire:model="pesan"
                                rows="3"style="resize: none;" disabled></textarea>
                        @else
                            <textarea type="text" class="form-control" id="pesan" placeholder="Tulis penilaian" wire:model="pesan"
                                rows="3"style="resize: none;"></textarea>
                        @endif
                        @error('pesan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($checkIfExits)
                        <button type="submit" class="btn-resell">Kirim</button>
                    @endif
                </fieldset>
            </form>
        </div>
    </div>

    @if ($review->isEmpty())
        <h5 class="mt-2">Belum Ada Penilaian</h5>
    @else
        @foreach ($review as $r)
            <div class="row">
                <div class="col-md-2 col-lg-1">
                    <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" width="60px"
                        style="border-radius:5px">
                </div>
                <div class="col-md-5 col-lg-7">
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
                </div>
            </div>
        @endforeach
    @endif
</div>
