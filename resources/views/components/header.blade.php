<header class="min-h-full">
    <nav class="bg-gray-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
        <div class="flex items-center justify-between flex-1 mr-6">
            <div class="flex-shrink-0">
                <h1 class="text-2xl font-bold text-white">PokéLang</h1>
            </div>
            <div class="ml-10 flex items-baseline space-x-4">
                <a href="/pokedex" class="{{ request()->is('pokedex*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Pokédex</a>

                <a href="/moves" class="{{ request()->is('moves*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Moves</a>

                <a href="/qa" class="{{ request()->is('qa*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Q&A</a>

                @guest
                    <a href="/login" class="{{ request()->is('login*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log In</a>

                    <a href="/register" class="{{ request()->is('register*') ? 'hidden' : ''}} inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Get started
                    </a>
                @else
                    <a href="/settings" class="{{ request()->is('setting*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Setting</a>
                    <form method="POST" action="/logout">
                        @csrf
                        
                        <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
        </div>
    </div>
    </nav>
</header>