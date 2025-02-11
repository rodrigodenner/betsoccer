<div>
  @if($isLoading)
    <div class="flex justify-center items-center h-64">
      <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-gray-900 dark:border-gray-100"></div>
    </div>
  @else
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg dark:bg-gray-900">
      <div class="flex justify-between items-center mb-6 px-6 py-4 bg-gray-100 dark:bg-gray-800 rounded-t-lg shadow-md">
        <div>

          <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            {{ $this->matches['competition']['name'] ?? 'Não contem informações' }}
          </h2>
          <!-- Temporada -->
          <p class="text-sm text-gray-600 dark:text-gray-400">
            Temporada {{ $this->matches['filters']['season'] ?? 'Não contem informações' }}
          </p>
        </div>

        @if (isset($this->matches['resultSet']['first']) && isset($this->matches['resultSet']['last']) && !empty($this->matches['resultSet']['first']) && !empty($this->matches['resultSet']['last']))
          <div class="text-sm text-gray-600 dark:text-gray-400">
            <p>
              Rodadas de
              {{ \Carbon\Carbon::parse($this->matches['resultSet']['first'])->format('d/m/Y') }}
              até
              {{ \Carbon\Carbon::parse($this->matches['resultSet']['last'])->format('d/m/Y') }}
            </p>
          </div>
        @endif

        @if (isset($this->matches['competition']['emblem']) && !empty($this->matches['competition']['emblem']))
          <img src="{{ $this->matches['competition']['emblem'] }}" alt="Emblema da Competição"
               class="h-16 w-16 object-cover rounded-full bg-gray-200">
        @endif

      </div>

      <div class="px-2 flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text"
                 wire:model="teamInput"
                 wire:keydown.enter="searchTeam"
                 class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 placeholder="Buscar time">
        </div>
      </div>
    </div>

    @if($errorMessage)
      <div
        class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4 dark:bg-yellow-800 dark:border-yellow-600 dark:text-yellow-100">
        {{ $errorMessage }}
      </div>
    @endif

    @if (empty($this->matches['matches']))
      <div class="text-center py-8">
        <p class="text-gray-600 dark:text-gray-400 text-lg">
          Nenhuma partida disponível para esta competição no momento.
        </p>
        <p class="text-gray-500 dark:text-gray-500 text-sm mt-2">
          Tente novamente mais tarde ou explore outras competições.
        </p>
      </div>
    @elseif ($teamId == '')
      <livewire:themes.betsoccer.web.pages.home.components.widget-table-teams
        :matches="$this->matches['matches']"
      />
    @else
      <livewire:themes.betsoccer.web.pages.home.components.widget-card-team :teamId="$teamId"/>
    @endif
  @endif
</div>
