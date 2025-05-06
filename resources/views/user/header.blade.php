<header class="bg-white shadow">
  <nav class="container mx-auto px-4 py-3 flex items-center justify-between" x-data="{ userOpen: false }">
    <!-- Logo / Home -->
    <a href="{{ route('home') }}" class="flex items-center space-x-2">
      <img src="/images/logo.png" alt="Logo" class="h-8 w-8">
      <span class="text-xl font-bold text-gray-800">DashBord User</span>
    </a>

    <!-- User Dropdown -->
    <div class="relative">
      <button @click="userOpen = !userOpen"
              class="flex items-center space-x-2 bg-white border border-gray-200 rounded-full px-3 py-1 hover:bg-gray-50 focus:outline-none">
        <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.063a.75.75 0 111.13.994l-4 4.375a.75.75 0 01-1.08 0l-4-4.375a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
      </button>

      <div x-show="userOpen" @click.away="userOpen = false"
           class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg py-1 z-20">
        <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</button>
        </form>
      </div>
    </div>
  </nav>
</header>