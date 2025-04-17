<x-guest-layout>
    <div class="min-h-screen bg-orange-100 flex items-center justify-center">
        <!-- Carte d'enregistrement -->
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <!-- Titre -->
            <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Inscription - Gestion des Événements</h1>

            <!-- Validation des erreurs -->
            <x-validation-errors class="mb-4" />

            <!-- Formulaire d'enregistrement -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Champ Nom -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <div class="relative">
                        <!-- Icône Nom -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 19a1 1 0 00.707.293h12a1 1 0 00.707-1.707L12 4.293 4.707 17.293a1 1 0 00.414 1.707z" />
                        </svg>
                        <input id="name" name="name" type="text" required class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400" placeholder="Entrez votre nom">
                    </div>
                </div>

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

                <!-- Champ Téléphone -->
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <div class="relative">
                        <!-- Icône Téléphone -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11m4 0h4m-4 4H7m-4 0h2m8 4h6m-6 4h6m-6-4v4m0-10V4" />
                        </svg>
                        <input id="phone" name="phone" type="text" required class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400" placeholder="Entrez votre numéro de téléphone">
                    </div>
                </div>

                <!-- Champ Mot de passe -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <div class="relative">
                        <!-- Icône Mot de passe -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m0-8a4 4 0 014 4H8a4 4 0 014-4zm6 4v6a2 2 0 01-2 2H8a2 2 0 01-2-2v-6" />
                        </svg>
                        <input id="password" name="password" type="password" required class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400" placeholder="Créez un mot de passe">
                    </div>
                </div>

                <!-- Champ Confirmation Mot de passe -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmez le mot de passe</label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400" placeholder="Confirmez le mot de passe">
                    </div>
                </div>

                <!-- Bouton S'inscrire -->
                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    S'inscrire
                </button>
            </form>

            <!-- Lien de connexion -->
            <p class="text-sm text-gray-600 text-center mt-4">
                Déjà inscrit ? <a href="{{ route('login') }}" class="text-orange-600 hover:underline">Connectez-vous</a>
            </p>
        </div>
    </div>
</x-guest-layout>
