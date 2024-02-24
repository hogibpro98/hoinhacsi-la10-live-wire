<?php

use App\Http\Livewire\Admin\Album\DataEntry as AlbumDataEntry;
use App\Http\Livewire\Admin\Album\DataTable as AlbumDataTable;
use App\Http\Livewire\Admin\Category\DataEntry as CategoryDataEntry;
use App\Http\Livewire\Admin\Category\DataTable as CategoryDataTable;
use App\Http\Livewire\Admin\ClientMenuManage;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Leader\DataEntry as LeaderDataEntry;
use App\Http\Livewire\Admin\Leader\DataTable as LeaderDataTable;
use App\Http\Livewire\Admin\News\DataEntry as NewsDataEntry;
use App\Http\Livewire\Admin\News\DataTable as NewsDataTable;
use App\Http\Livewire\Admin\Partner\DataEntry as PartnerDataEntry;
use App\Http\Livewire\Admin\Partner\DataTable as PartnerDataTable;
use App\Http\Livewire\Admin\Slide\DataEntry as SlideDataEntry;
use App\Http\Livewire\Admin\Slide\DataTable as SlideDataTable;
use App\Http\Livewire\Admin\Song\DataEntry as SongDataEntry;
use App\Http\Livewire\Admin\Song\DataTable as SongDataTable;
use App\Http\Livewire\Admin\Tag\DataEntry as TagDataEntry;
use App\Http\Livewire\Admin\Tag\DataTable as TagDataTable;
use App\Http\Livewire\Admin\Topic\DataEntry as TopicDataEntry;
use App\Http\Livewire\Admin\Topic\DataTable as TopicDataTable;
use App\Http\Livewire\Admin\TopPartner\DataEntry as TopPartnerDataEntry;
use App\Http\Livewire\Admin\TopPartner\DataTable as TopPartnerDataTable;
use App\Http\Livewire\Category;
use App\Http\Livewire\Home;
use App\Http\Livewire\Library;
use App\Http\Livewire\NewsDetail;
use App\Http\Livewire\Partner;
use App\Http\Livewire\Profile;
use App\Http\Livewire\ProfileDetail;
use App\Http\Livewire\Song;
use App\Http\Livewire\SongDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/library', Library::class)->name('library');

Route::get('/profile', Profile::class)->name('profile')->middleware('auth');
Route::get('/profile/{id}', ProfileDetail::class)->name('profile-detail');

Route::get('/news/{slug}', NewsDetail::class)->where('slug', '.*')->name('news-detail');

Route::get('/partners', Partner::class)->name('partners');
Route::get('/category/{slug}', Category::class)->where('slug', '.*')->name('categories');
Route::get('/songs', Song::class)->name('songs');
Route::get('/song/{slug}', SongDetail::class)->where('slug', '.*')->name('song-detail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    Route::prefix('partner')->group(function () {
        Route::prefix('artist')->group(function () {
            Route::get('/', PartnerDataTable::class)->name('admin.partner.artist');
            Route::get('/create-form', PartnerDataEntry::class)->name('admin.partner.artist.add');
            Route::get('/edit/{id}', PartnerDataEntry::class)->name('admin.partner.artist.edit');
        });
        Route::prefix('singer')->group(function () {
            Route::get('/', PartnerDataTable::class)->name('admin.partner.singer');
            Route::get('/create-form', PartnerDataEntry::class)->name('admin.partner.singer.add');
            Route::get('/edit/{id}', PartnerDataEntry::class)->name('admin.partner.singer.edit');
        });

    });

    Route::prefix('slide')->group(function () {
        Route::get('/', SlideDataTable::class)->name('admin.slide');
        Route::get('/create-form', SlideDataEntry::class)->name('admin.slide.add');
        Route::get('/edit/{id}', SlideDataEntry::class)->name('admin.slide.edit');
    });
    Route::prefix('topic')->group(function () {
        Route::get('/', TopicDataTable::class)->name('admin.topic');
        Route::get('/create-form', TopicDataEntry::class)->name('admin.topic.add');
        Route::get('/edit/{id}', TopicDataEntry::class)->name('admin.topic.edit');
    });
    Route::prefix('category')->group(function () {
        Route::get('/', CategoryDataTable::class)->name('admin.category');
        Route::get('/create-form', CategoryDataEntry::class)->name('admin.category.add');
        Route::get('/edit/{id}', CategoryDataEntry::class)->name('admin.category.edit');
    });
    Route::prefix('album')->group(function () {
        Route::get('/', AlbumDataTable::class)->name('admin.album');
        Route::get('/create-form', AlbumDataEntry::class)->name('admin.album.add');
        Route::get('/edit/{id}', AlbumDataEntry::class)->name('admin.album.edit');
    });
    Route::prefix('tag')->group(function () {
        Route::get('/', TagDataTable::class)->name('admin.tag');
        Route::get('/create-form', TagDataEntry::class)->name('admin.tag.add');
        Route::get('/edit/{id}', TagDataEntry::class)->name('admin.tag.edit');
    });
    Route::prefix('news')->group(function () {
        Route::get('/', NewsDataTable::class)->name('admin.news');
        Route::get('/create-form', NewsDataEntry::class)->name('admin.news.add');
        Route::get('/edit/{id}', NewsDataEntry::class)->name('admin.news.edit');
    });

    Route::prefix('song')->group(function () {
        Route::get('/', SongDataTable::class)->name('admin.song');
        Route::get('/create-form', SongDataEntry::class)->name('admin.song.add');
        Route::get('/edit/{id}', SongDataEntry::class)->name('admin.song.edit');
    });
    Route::prefix('leader')->group(function () {
        Route::get('/', LeaderDataTable::class)->name('admin.leader');
        Route::get('/create-form', LeaderDataEntry::class)->name('admin.leader.add');
        Route::get('/edit/{id}', LeaderDataEntry::class)->name('admin.leader.edit');
    });
    Route::prefix('top-partner')->group(function () {
        Route::get('/', TopPartnerDataTable::class)->name('admin.top-partner');
        Route::get('/create-form', TopPartnerDataEntry::class)->name('admin.top-partner.add');
        Route::get('/edit/{id}', TopPartnerDataEntry::class)->name('admin.top-partner.edit');
    });
    Route::prefix('menu')->group(function () {
        Route::get('/', ClientMenuManage::class)->name('admin.menu');
    });

});
