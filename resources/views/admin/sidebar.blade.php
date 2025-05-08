<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
        <div class="avatar mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="rounded-circle" style="width:45px; height:45px;">
            <circle cx="50" cy="50" r="48" fill="#f0f2f5"/>
            <circle cx="50" cy="40" r="20" fill="#8e9aaf"/>
            <path d="M25,85 C25,65 75,65 75,85" fill="#8e9aaf"/>
          </svg>
        </div>
        <div class="title">
            <h5 class="m-0 text-white">{{ Auth::user()->name ?? 'Admin' }}</h5>
            <small class="text-muted">Administrator</small>
        </div>
        </div>
       
        <ul class="list-unstyled">
    <li class="{{ request()->routeIs('index') ? 'active' : '' }}">
        <a style="color: white; display: flex; align-items: center;" href="{{ route('index') }}">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V12H9v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9z" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="{{ request()->is('create_event') ? 'active' : '' }}">
        <a style="color: white; display: flex; align-items: center;" href="{{ url('create_event') }}">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Add Event</span>
        </a>
    </li>
    <li class="{{ request()->is('view_event') ? 'active' : '' }}">
        <a style="color: white; display: flex; align-items: center;" href="{{ url('view_event') }}">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>View Event</span>
        </a>
    </li>
    <li class="{{ request()->is('bookings') ? 'active' : '' }}">
        <a style="color: white; display: flex; align-items: center;" href="{{ url('bookings') }}">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Bookings</span>
        </a>
    </li>
    <li class="{{ request()->is('view_gallary') ? 'active' : '' }}">
        <a style="color: white; display: flex; align-items: center;" href="{{ url('view_gallary') }}">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 4a2 2 0 012-2h2l2 3h10a2 2 0 012 2v2M3 4v16a2 2 0 002 2h14a2 2 0 002-2V8M3 4l5 9a2 2 0 002 1h4a2 2 0 002-2V4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Gallery</span>
        </a>
    </li>
    <li class="{{ request()->is('all_messages') ? 'active' : '' }}">
        <a style="color: white; display: flex; align-items: center;" href="{{ url('all_messages') }}">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.83L3 20l1.16-3.52A8.96 8.96 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Messages</span>
        </a>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a style="color: white; display: flex; align-items: center;" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H5a3 3 0 01-3-3V7a3 3 0 013-3h5a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Log Out</span>
        </a>
    </li>
</ul>
      </nav>
      <!-- Sidebar Navigation end-->
       