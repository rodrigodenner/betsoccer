<?php

namespace App\Livewire\Themes\Betsoccer\Web\Pages\Home\Components;

use App\Services\MatchTrackerService;
use Livewire\Component;

class WidgetCardTeam extends Component
{
  public $teamId;
  public $team;
  public $lastMatches;
  public $nextMatches;
  public $showLastMatches = true;

  public function mount($teamId)
  {
    $this->teamId = $teamId;
    $this->team = app(MatchTrackerService::class)->findOneTeam($this->teamId);
    $this->lastMatches = app(MatchTrackerService::class)->getLastMatches($this->teamId);
    $this->nextMatches = app(MatchTrackerService::class)->getUpcomingMatches($this->teamId);
  }

  public function toggleMatches($type)
  {
    $this->showLastMatches = ($type === 'last');
  }
  public function render()
  {
    return view('livewire.themes.betsoccer.web.pages.home.components.widget-card-team');
  }
}
