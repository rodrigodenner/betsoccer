<div>
  <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center pt-4">
      <img class="rounded-t-lg w-28 h-28" src="{{$this->team['data']['crest']}}" alt="Escudo do Time"/>
      <span class="text-gray-200 text-lg font-bold mt-2">{{$this->team['data']['name']}}</span>
      <span class="text-gray-400  font-bold">{{$this->team['data']['area']['name']}}</span>
    </div>
    <div class="flex justify-center mt-4 mb-2">
      <button
        class="px-4 py-2 rounded-md mr-2 transition-colors duration-200
      text-white
      {{ $showLastMatches ? 'bg-blue-700' : 'bg-blue-500 hover:bg-blue-600' }}"
        wire:click="toggleMatches('last')">
        Jogos Anteriores
      </button>

      <button
        class="px-4 py-2 rounded-md transition-colors duration-200
      text-white
      {{ !$showLastMatches ? 'bg-blue-700' : 'bg-blue-500 hover:bg-blue-600' }}"
        wire:click="toggleMatches('next')">
        Próximos Jogos
      </button>
    </div>

    @if($showLastMatches)
      <livewire:themes.betsoccer.web.components.shared.match-table :team="$this->lastMatches['data']"/>
    @else
      <livewire:themes.betsoccer.web.components.shared.match-table :team="$this->nextMatches['data']"/>
    @endif
  </div>

</div>

