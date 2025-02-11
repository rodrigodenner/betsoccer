<div>
  @if($isLoading)
    <div class="flex justify-center items-center h-64">
      <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-gray-900"></div>
    </div>
  @elseif($errorMessage)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      {{ $errorMessage }}
    </div>
  @else
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      @foreach($competitions as $competition)
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:shadow-2xl cursor-pointer">
          <div class="flex flex-col items-center">
            <a href="{{ route('competition-matches', $competition['id']) }}" class="flex flex-col items-center" wire:navigate>
              <div class="w-24 h-24 rounded-full overflow-hidden mb-4">
                <img src="{{ $competition['emblem'] }}" alt="{{ $competition['name'] }}" class="w-full h-full object-cover">
              </div>
              <h3 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-100">
                {{ $competition['name'] }}
              </h3>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
