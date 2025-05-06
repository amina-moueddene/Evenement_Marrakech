<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} — Réservations</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

  {{-- Header --}}
  @include('user.header')

  <div class="flex flex-1">
    {{-- Sidebar --}}
    @include('user.sidebar')

    {{-- Contenu principal --}}
    <main class="flex-1 p-6">
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b">
          <h2 class="text-2xl font-bold text-orange-600">Mes Réservations Approuvées</h2>
        </div>

        <div class="p-4 overflow-x-auto">
          <table class="min-w-full table-auto">
            <thead class="bg-orange-600 text-white">
              <tr>
                <th class="px-4 py-2">Event title</th>
                <th class="px-4 py-2">Visitor</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Téléphone</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Prix</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Action</th>
              </tr>
            </thead>
            <tbody class="text-gray-800">
              @foreach($data as $item)
              <tr class="border-b">
                <td class="px-4 py-2">{{ $item->event->event_title }}</td>
                <td class="px-4 py-2">{{ $item->name }}</td>
                <td class="px-4 py-2">{{ $item->email }}</td>
                <td class="px-4 py-2">{{ $item->phone }}</td>
                <td class="px-4 py-2">
                  <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
                    Approuvé
                  </span>
                </td>
                <td class="px-4 py-2">&euro; {{ $item->event->price }}</td>
                <td class="px-4 py-2">
                  <img src="/event/{{ $item->event->image }}"
                       alt="event image"
                       class="h-12 w-16 object-cover rounded">
                </td>
                <td class="px-4 py-2">
                  <form action="{{ url('delete_booking', $item->id) }}"
                        method="POST"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">
                      Supprimer
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  {{-- Footer --}}
  <footer class="mt-6 py-4 border-t text-center">
    <p class="text-orange-600 text-sm">
      &copy; {{ date('Y') }} Ville de Marrakech. Tous droits réservés.
    </p>
    <div class="space-x-4 mt-2">
      <a href="#" class="text-orange-600 hover:underline text-sm">Mentions légales</a>
      <a href="#" class="text-orange-600 hover:underline text-sm">Contact</a>
    </div>
  </footer>

</body>
</html>
