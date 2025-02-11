<?php

use App\Livewire\Themes\Betsoccer\Web\Pages\Home\CompetitionMatchesPage;
use App\Livewire\Themes\Betsoccer\Web\Pages\Home\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/competition-matches/{slug}', CompetitionMatchesPage::class)->name('competition-matches');

