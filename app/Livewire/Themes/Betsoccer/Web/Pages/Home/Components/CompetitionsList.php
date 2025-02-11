<?php

namespace App\Livewire\Themes\Betsoccer\Web\Pages\Home\Components;

use App\Services\MatchTrackerService;
use Livewire\Component;

class CompetitionsList extends Component
{
  public $competitions = [];
  public $errorMessage = null;
  public $isLoading = true;

  public function mount()
  {
    $competitions = app(MatchTrackerService::class)->getAllCompetitions();

    if (!$competitions['success']) {
      $this->errorMessage = $competitions['message'];
      $this->competitions = [];
      $this->isLoading = false;
      return;
    }

    $this->competitions = $competitions['data']['competitions'];
    $this->isLoading = false;
  }

  public function render()
  {
    return view('livewire.themes.betsoccer.web.pages.home.components.competitions-list');
  }
}
