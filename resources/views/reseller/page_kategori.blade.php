@extends('layouts_reseller.app')
@section('title', 'Kategori')
@section('content')
    <section class="page-kategori">
        <div class="container">
            <hr class="my-2 hr-kategori opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row">
                <div class="col-md-3 col-lg-2 pe-5 mt-4 side-panel-kategori" data-aos="zoom-in-right" data-aos-delay="100">
                    <form class="d-flex mb-4" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <h1>Semua Kategori</h1>
                </div>
                <div class="col-md-9 col-lg-10 mt-4">
                    {{-- A --}}
                    @if ($a->isEmpty())
                    @else
                        <span data-aos="zoom-in">A</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- B --}}
                    @if ($b->isEmpty())
                    @else
                        <span data-aos="zoom-in">B</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- C --}}
                    @if ($c->isEmpty())
                    @else
                        <span data-aos="zoom-in">C</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- D --}}
                    @if ($d->isEmpty())
                    @else
                        <span data-aos="zoom-in">D</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- E --}}
                    @if ($e->isEmpty())
                    @else
                        <span data-aos="zoom-in">E</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- F --}}
                    @if ($f->isEmpty())
                    @else
                        <span data-aos="zoom-in">F</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- G --}}
                    @if ($g->isEmpty())
                    @else
                        <span data-aos="zoom-in">G</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- H --}}
                    @if ($h->isEmpty())
                    @else
                        <span data-aos="zoom-in">H</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- I --}}
                    @if ($i->isEmpty())
                    @else
                        <span data-aos="zoom-in">I</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- J --}}
                    @if ($j->isEmpty())
                    @else
                        <span data-aos="zoom-in">J</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- K --}}
                    @if ($k->isEmpty())
                    @else
                        <span data-aos="zoom-in">K</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- L --}}
                    @if ($l->isEmpty())
                    @else
                        <span data-aos="zoom-in">L</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- M --}}
                    @if ($m->isEmpty())
                    @else
                        <span data-aos="zoom-in">M</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- N --}}
                    @if ($n->isEmpty())
                    @else
                        <span data-aos="zoom-in">N</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- O --}}
                    @if ($o->isEmpty())
                    @else
                        <span data-aos="zoom-in">O</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- P --}}
                    @if ($p->isEmpty())
                    @else
                        <span data-aos="zoom-in">P</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- Q --}}
                    @if ($q->isEmpty())
                    @else
                        <span data-aos="zoom-in">Q</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- R --}}
                    @if ($r->isEmpty())
                    @else
                        <span data-aos="zoom-in">R</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- S --}}
                    @if ($s->isEmpty())
                    @else
                        <span data-aos="zoom-in">S</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- T --}}
                    @if ($t->isEmpty())
                    @else
                        <span data-aos="zoom-in">T</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- U --}}
                    @if ($u->isEmpty())
                    @else
                        <span data-aos="zoom-in">U</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- V --}}
                    @if ($v->isEmpty())
                    @else
                        <span data-aos="zoom-in">V</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- W --}}
                    @if ($w->isEmpty())
                    @else
                        <span data-aos="zoom-in">W</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- X --}}
                    @if ($x->isEmpty())
                    @else
                        <span data-aos="zoom-in">X</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- Y --}}
                    @if ($y->isEmpty())
                    @else
                        <span data-aos="zoom-in">Y</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- Z --}}
                    @if ($z->isEmpty())
                    @else
                        <span data-aos="zoom-in">Z</span>
                        <hr class="mt-1 opacity-100" data-aos="flip-right" data-aos-delay="100">
                        <div class="row row-cols-auto row-cols-lg-auto" data-aos="fade">
                            @foreach ($m as $kategori)
                                <div class="col mb-3">
                                    <div class="card" id="">
                                        <a type="button" class="btn-kategori"
                                            href="{{ route('produk_kategori.reseller', $kategori->id) }}">{{ $kategori->nama }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
