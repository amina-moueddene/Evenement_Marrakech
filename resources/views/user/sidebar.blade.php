<aside class="w-64 bg-white border-r shadow-lg h-screen sticky top-0 overflow-hidden">
  <nav class="mt-6 px-2">
    <ul class="space-y-1">
      <li>
        <a href="{{ route('home') }}"
           class="flex items-center px-4 py-2 rounded hover:bg-gray-100 transition-colors {{ request()->routeIs('home') ? 'bg-gray-200 font-semibold' : 'text-gray-700' }}">
          <i class="icon-user mr-3"></i>
          Dashbord
        </a>
      </li>
      <li>
        <a href="{{ route('user.profile') }}"
           class="flex items-center px-4 py-2 rounded hover:bg-gray-100 transition-colors {{ request()->routeIs('user.profile') ? 'bg-gray-200 font-semibold' : 'text-gray-700' }}">
          <i class="icon-list mr-3"></i>
          Your Reservations
        </a>
      </li>
      <!-- Autres liens -->
    </ul>
  </nav>
</aside>