<nav>
  <ul class="flex flex-wrap gap-4 items-center ">
    <li>
      <a href="{{ route('habits.index') }}" class="{{ Route::is('habits.index') ? 'font-bold underline' : '' }} text-md border-r-2 border-habit-orange pr-2 hover:underline">
        Hoje
      </a>
    </li>
    <li>
      <a href="{{ route('history') }}" class="{{ Route::is('history') ? 'font-bold underline' : '' }} text-md border-r-2 border-habit-orange pr-2 hover:underline">
        Histórico
      </a>
    </li>
    <li>
      <a href="#" class="text-md border-r-2 border-habit-orange pr-2 hover:underline cursor-not-allowed">
        Calendário 🔒
      </a>
    </li>
    <li>
      <a href="{{ route('settings') }}" class="{{ Route::is('settings') ? 'font-bold underline' : '' }} text-md hover:underline">
        Gerenciar Hábitos
      </a>
    </li>
  </ul>
</nav>
