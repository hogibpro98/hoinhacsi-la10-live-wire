<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\News;
use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Header extends Component
{
    public $search = null;

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function render()
    {
        $menuData = Menu::whereNull('parent_id')
            ->with('children')
            ->orderBy('position', 'asc')
            ->get();

        $profile = null;
        if (Auth::check()) {
            $profile = config('app.dataUser')[Str::slug(\Illuminate\Support\Facades\Auth::user()->name, '_')] ?? null;
        }

        $weekAgo = Carbon::now()->subWeek();

        $songSuggest = Song::where('created_at', '>=', $weekAgo)
            ->orderByDesc('view')
            ->take(4)
            ->get();

        $generalNews = News::where('date_public', '<=', now())->where('status', '=', 'public')->where('created_at', '>=', $weekAgo)
            ->orderByDesc('view')
            ->take(2)
            ->get();

        return view('livewire.header', [
            'profile' => $profile,
            'menu' => $menuData,
            'songSuggest' => $songSuggest,
            'generalNews' => $generalNews,
        ])->layout('layouts.guest');
    }
}
