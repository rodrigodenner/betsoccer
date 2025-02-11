<?php

namespace App\Livewire\Themes\Betsoccer\Web\Components\Shared;

use Livewire\Component;

class MatchTable extends Component
{
  public $team;

  public function mount($team)
  {
    $this->team = $team;
  }

  public function render()
  {
    return view('livewire.themes.betsoccer.web.components.shared.match-table');
  }
}
