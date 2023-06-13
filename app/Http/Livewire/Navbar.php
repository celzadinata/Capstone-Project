<?php

namespace App\Http\Livewire;

use App\Models\kategori;
use Livewire\Component;

class Navbar extends Component
{

    public function render()
    {
        $list_kategori = kategori::paginate(5);
        return view('livewire.navbar', compact('list_kategori'));
    }
}
