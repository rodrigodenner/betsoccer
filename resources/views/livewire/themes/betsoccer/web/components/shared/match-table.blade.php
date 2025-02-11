<div class="flex justify-center mt-4">
  <table id="search-table"
         class="w-full mt-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
      <th scope="col" class="px-6 py-3 text-center">Data do Jogo</th>
      <th scope="col" class="px-6 py-3 text-center">Mandante</th>
      <th scope="col" class="px-6 py-3 text-center">Resultado</th>
      <th scope="col" class="px-6 py-3 text-center">Visitante</th>
      <th scope="col" class="px-6 py-3 text-center">Fase</th>
      <th scope="col" class="px-6 py-3 text-center">Status</th>
    </tr>
    </thead>
    <tbody>
    @if(count($this->team['matches']) > 0)
      @foreach($this->team['matches'] as $team)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 text-center">
            {{ \Carbon\Carbon::parse($team['utcDate'])->format('d/m/Y H:i') }}
          </td>
          <td class="px-6 py-4 text-center">
            <div class="flex flex-col items-center justify-center">
              @if(!empty($team['homeTeam']['crest']) && !empty($team['homeTeam']['name']))
                <img src="{{$team['homeTeam']['crest']}}" alt="Escudo do time {{$team['homeTeam']['name']}}"
                     class="w-6 h-6 mb-2 transition-transform duration-300 transform hover:scale-110">
                <span>{{$team['homeTeam']['name']}}</span>
              @else
                <span>Time não definido</span>
              @endif
            </div>
          </td>
          <td class="px-6 py-4 text-center">
            {{ $team['score']['fullTime']['home'] ?? '-' }} - {{ $team['score']['fullTime']['away'] ?? '-' }}
          </td>
          <td class="px-6 py-4 text-center">
            <div class="flex flex-col items-center justify-center">
              @if(!empty($team['awayTeam']['crest']) && !empty($team['awayTeam']['name']))
                <img src="{{$team['awayTeam']['crest']}}" alt="Escudo do time {{$team['awayTeam']['name']}}"
                     class="w-6 h-6 mb-2 transition-transform duration-300 transform hover:scale-110">
                <span>{{$team['awayTeam']['name']}}</span>
              @else
                <span>Time não definido</span>
              @endif
            </div>
          </td>
          <td class="px-6 py-4 text-center">
            {{ ucfirst(strtolower(str_replace('_', ' ', $team['stage'] ?? 'Desconhecido'))) }}
          </td>
          <td class="px-6 py-4 text-center">
            <span
              class="text-sm font-medium px-2.5 py-0.5 rounded-full {{ $team['statusFormatted']['class'] }}">
              {{ $team['statusFormatted']['label'] }}
            </span>
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="6" class="px-6 py-4 text-center">
          Não há jogos disponíveis no momento.
        </td>
      </tr>
    @endif
    </tbody>
  </table>
</div>
