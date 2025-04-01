<x-guest-layout>
    <div class="min-h-screen bg-orange-100 flex items-center justify-center">
        <!-- Carte de connexion -->
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <!-- Titre -->
            <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Connexion - Gestion des Événements</h1>

            <!-- Validation des erreurs -->
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formulaire de connexion -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Champ Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <!-- Icône Email -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.386 4.94a1 1 0 001.228 0L19 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z" />
                        </svg>
                        <input id="email" name="email" type="email" required class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400" placeholder="Entrez votre email">
                    </div>
                </div>

                <!-- Champ Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <div class="relative">
                        <!-- Icône Mot de passe -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m0-8a4 4 0 014 4H8a4 4 0 014-4zm6 4v6a2 2 0 01-2 2H8a2 2 0 01-2-2v-6" />
                        </svg>
                        <input id="password" name="password" type="password" required class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400" placeholder="Entrez votre mot de passe">
                    </div>
                </div>

                <!-- Souviens-toi de moi -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="flex items-center text-sm text-gray-600">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                        <span class="ml-2">Se souvenir de moi</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-orange-600 hover:underline">Mot de passe oublié ?</a>
                    @endif
                </div>

                <!-- Bouton de connexion -->
                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    Connexion
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
