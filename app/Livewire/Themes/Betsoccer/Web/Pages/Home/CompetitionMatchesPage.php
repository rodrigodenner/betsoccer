<?php

namespace App\Livewire\Themes\Betsoccer\Web\Pages\Home;

use App\Services\MatchTrackerService;
use Livewire\Component;

class CompetitionMatchesPage extends Component
{
  public $matches = [];
  public $teamInput = '';
  public $teams = [];
  public $teamId = '';
  public $competitionCode;
  public $errorMessage = null;
  public $isLoading = true;

  public function mount($slug)
  {
    $this->competitionCode = $slug;

    $matches = app(MatchTrackerService::class)->getAllMatches($this->competitionCode);
    if (!$matches['success']) {
      $this->errorMessage = $matches['message'];
      $this->matches = [];
      $this->isLoading = false;
      return;
    }

    $this->matches = $matches['data'];
    if (empty($this->matches['matches'])) {
      $this->errorMessage = 'Nenhuma partida disponível para esta competição no momento.'; // Mensagem amigável
    }

    $this->isLoading = false;
  }

  public function searchTeam()
  {
    $teams = app(MatchTrackerService::class)->getAllTimes($this->competitionCode);

    if (!$teams['success']) {
      $this->errorMessage = $teams['message'];
      return;
    }

    $this->teamId = '';

    foreach ($teams['data']['teams'] ?? [] as $team) {
      if (stripos($team['name'], $this->teamInput) !== false) {
        $this->teamId = $team['id'];
        break;
      }
    }

    if ($this->teamId == '') {
      $this->errorMessage = 'Nenhum time encontrado.';
      $this->teamInput = '';
    }
  }

  public function render()
  {
    return view('livewire.themes.betsoccer.web.pages.home.competition-matches-page')
      ->layout('livewire.themes.betsoccer.layouts.web');
  }
}
