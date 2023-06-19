<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\notifikasi;
use Illuminate\Support\Facades\Auth;

class Notif extends Component
{

    public function render()
    {
        $id = Auth::id();
        $notifikasi = notifikasi::where('users_id', $id)->get();
        $jml_notif = notifikasi::where('users_id', $id)->count();
        return view('livewire.notif', compact('notifikasi','jml_notif'));
    }
}
