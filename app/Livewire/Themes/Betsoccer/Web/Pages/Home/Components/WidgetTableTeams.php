<?php

namespace App\Livewire\Themes\Betsoccer\Web\Pages\Home\Components;

use Livewire\Component;

class WidgetTableTeams extends Component
{
    public $matches;
    public $finishedMatches = [];

    public function mount($matches)
    {
        $this->matches = $matches;
    }

    public function render()
    {
        return view('livewire.themes.betsoccer.web.pages.home.components.widget-table-teams');
    }
}
