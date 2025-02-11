@if(session('status'))
  <div class="p-4 mb-4 text-sm rounded-lg
    {{ str_contains(session('status'), 'Erro') ? 'bg-red-50 text-red-800 dark:bg-gray-800 dark:text-red-400' :
       (str_contains(session('status'), 'sucesso') ? 'bg-green-50 text-green-800 dark:bg-gray-800 dark:text-green-400' : 'bg-blue-50 text-blue-800 dark:bg-gray-800 dark:text-blue-400') }}"
       role="alert">
    <span class="font-medium">{{ session('status') }}</span>
  </div>
@endif
