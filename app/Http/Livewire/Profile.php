<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Profile extends Component
{
    public $activeTabOverview = 'total_view';

    public $tabs = [
        'overview' => [
            'name' => 'Trang tổng quan',
            'icon' => null,
        ],
        'story' => [
            'name' => 'Tiểu sử',
            'icon' => null,
        ],
        'library' => [
            'name' => 'Thư viện nội dung',
            'icon' => '/img/icon/star.svg',
        ],
        'prizes' => [
            'name' => 'Giải thưởng',
            'icon' => '/img/icon/star.svg',
        ],
        'forum' => [
            'name' => 'Diễn đàn',
            'icon' => null,
        ],
        'license' => [
            'name' => 'Đăng ký bản quyền',
            'icon' => null,
        ],
        'analysis' => [
            'name' => 'Phân tích',
            'icon' => null,
        ],
        'setting' => [
            'name' => 'Thiết lập',
            'icon' => null,
        ],
    ];

    public function render()
    {
        $profile = config('app.dataUser')[Str::slug(Auth::user()->name, '_')] ?? null;
        if (! $profile) {
            abort(404);
        }

        return view('livewire.profile',
            [
                'profile' => $profile,
            ]
        )->layout('layouts.guest');
    }
}
