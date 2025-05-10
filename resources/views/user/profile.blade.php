<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} — Réservations</title>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

{{-- Header --}}
{{-- Header --}}
<header class="bg-white shadow">
  <nav class="container mx-auto px-6 py-3 flex items-center justify-between relative" x-data="{ notifOpen: false, settingsOpen: false }">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center space-x-2">
      <img src="/images/logo.png" alt="Logo" class="h-15 w-30">
    </a>

    <div class="flex items-center space-x-6 relative">
      @auth
        <div class="relative">
          <a href="{{ url('/profile') }}" class="text-sm font-bold text-black hover:text-[#FF8C00]">
            History of my reservations
          </a>
          <!-- Orange underline moved further down -->
          <span class="absolute left-0 -bottom-6 w-full h-1 bg-[#FF8C00]"></span>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="flex items-center space-x-2">
          @csrf
          <button type="submit" class="flex items-center text-sm font-semibold text-white bg-[#FF8C00] px-3 py-1 rounded hover:bg-orange-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
            </svg>
            Log Out
          </button>
        </form>
      @endauth
    </div>
  </nav>
</header>


  <div class="flex flex-1">



    {{-- Main content --}}
    <main class="flex-1 p-4 space-y-6 overflow-x-auto">
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-4 py-3 border-b">
          <h2 class="text-2x font-bold "> My reservations history</h2>
        </div>

        <div class="p-4">
          <table class="min-w-full table-auto bg-white shadow-md rounded-lg border border-gray-200">
            <thead class="bg-[#FF8C00] text-white">
              <tr>
                <th class="px-3 py-1 text-left text-sm font-semibold">Preview</th>
                <th class="px-3 py-1 text-left text-sm font-semibold">Event Title</th>

                <th class="px-3 py-1 text-left text-sm font-semibold">Event Type</th>

                <th class="px-3 py-1 text-left text-sm font-semibold">Status</th>
                <th class="px-3 py-1 text-left text-sm font-semibold">Price</th>

                <th class="px-3 py-1 text-left text-sm font-semibold">Action</th>
              </tr>
            </thead>
            <tbody class="text-gray-800">
              @foreach($data as $item)
              <tr class="border-b hover:bg-gray-50 transition duration-200">
                  <td class="px-3 py-1 text-sm">
                  <img src="/event/{{ $item->event->image }}" alt="event image" class="h-8 w-12 object-cover rounded-lg shadow-sm">
                </td>
                <td class="px-3 py-1 text-sm">{{ $item->event->event_title }}</td>

                <td class="px-3 py-1 text-sm">{{ $item->event->event_type }}</td>

                <td class="px-3 py-1 text-sm">
                  <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                    Approved
                  </span>
                </td>
                <td class="px-3 py-1 text-sm">{{ $item->event->price }} MAD</td>

                <td class="px-3 py-1 text-sm">
                <form action="{{ route('delete_booking', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel your reservation?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded-lg hover:bg-red-700 focus:outline-none transition">Cancel</button>
</form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        <div class="mt-4 flex justify-center">
    {{ $data->links('pagination::tailwind') }}
</div>
<div class="mt-6 flex gap-6">
  <!-- Chart 1: Events by Type -->
  <div class="bg-white rounded-lg shadow p-4 w-1/2">
    <h3 class="text-lg font-semibold mb-2">Most Booked Event Types</h3>

    <canvas id="eventsByTypeChart" height="200"></canvas>
  </div>

  <!-- Chart 2: Bookings by Month -->
  <div class="bg-white rounded-lg shadow p-4 w-1/2">
    <h3 class="text-lg font-semibold mb-2">Bookings by Month</h3>
    <canvas id="bookingsByMonthChart" height="200"></canvas>
  </div>
</div>

        </div>
      </div>
    </main>
  </div>

  {{-- Footer --}}
  <footer class="mt-6 py-4 border-t text-center bg-white">
    <p class="text-[#000000FF] text-sm">
      &copy; {{ date('Y') }} Ville de Marrakech. Tous droits réservés.
    </p>
    <div class="space-x-4 mt-2">
      <a href="#" class="text-[#000000FF] hover:underline text-sm">Mentions légales</a>
      <a href="#" class="text-[#FF8C00] hover:underline text-sm">Contact</a>
    </div>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const ctx = document.getElementById("eventsByTypeChart").getContext("2d");

      const chart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: {!! json_encode(array_keys($eventTypeCounts)) !!}, // Event types (X-axis)
          datasets: [{
            label: "Number of Reservations", // Y-axis label
            data: {!! json_encode(array_values($eventTypeCounts)) !!},
            backgroundColor: "#C8BDB3FF",
            borderRadius: 8
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: false },
          },
          scales: {
            x: {
              title: {
                display: true,
                text: 'Event Type'
              }
            },
            y: {
              beginAtZero: true,
              ticks: { stepSize: 1 },
              title: {
                display: true,
                text: 'Number of Reservations'
              }
            }
          }
        }
      });
    });
  </script>


<script>
const ctx2 = document.getElementById("bookingsByMonthChart").getContext("2d");
const bookingsByMonthChart = new Chart(ctx2, {
    type: "line",
    data: {
        labels: {!! json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']) !!},
        datasets: [{
            label: "Bookings",
            data: {!! json_encode(array_values($bookingsByMonth)) !!},
            borderColor: "#F37735FF",
            backgroundColor: "rgba(52, 144, 220, 0.2)",
            borderWidth: 2,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1 },
                title: {
                    display: true,
                    text: 'Number of Reservations'
                }
            }
        }
    }
});

  </script>

</body>
</html>
