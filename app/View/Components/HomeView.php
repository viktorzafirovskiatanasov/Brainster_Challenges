<?php

namespace App\View\Components;

use App\Models\Discussion;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class HomeView extends Component
{
    public function render()
    {
        $discussions = Discussion::where('status', 'approved')->get();

        return view('components.home-view', compact('discussions'));
    }
}
