<?php

namespace App\Livewire\Themes\Betsoccer\Web\Pages\Home;

use Livewire\Component;

class HomePage extends Component
{

  public function render()
  {
    return view('livewire.themes.betsoccer.web.pages.home.home-page')
      ->layout('livewire.themes.betsoccer.layouts.web');
  }
}
