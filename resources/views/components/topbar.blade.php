<!-- Topbar Header Component -->
<header class="bg-white/80 backdrop-blur-md sticky top-0 z-30 border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between">
    <!-- Left: Mobile Menu Toggle & Breadcrumbs -->
    <div class="flex items-center gap-3">
        <!-- Mobile Drawer Hamburger -->
        <button 
            type="button" 
            @click="sidebarOpen = true" 
            class="lg:hidden p-2 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Breadcrumb Navigation -->
        <div>
            <div class="flex items-center gap-1.5 text-xs text-[#8796ab]">
                <span>Home</span>
                <span>/</span>
                <span class="text-[#536581] font-medium">@yield('breadcrumb', 'Dashboard')</span>
            </div>
            <h1 class="text-xl sm:text-2xl font-bold text-[#172b4d] tracking-tight">
                @yield('page_title', 'Dashboard')
            </h1>
        </div>
    </div>

    <!-- Right: Search Form & Quick Actions -->
    <div class="flex items-center gap-3 sm:gap-4">
        <!-- Search Bar -->
        <form action="{{ route('tasks.index') }}" method="GET" class="relative hidden sm:block">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#61738e]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search tasks..." 
                class="w-48 md:w-64 pl-9 pr-4 py-2 rounded-xl border border-slate-200 bg-slate-50 text-xs text-[#253858] placeholder-[#8492a6] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#315fe8] focus:border-transparent transition"
            >
        </form>

        <!-- Add Task Quick Button -->
        <a 
            href="{{ route('tasks.create') }}" 
            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-[#315fe8] hover:bg-[#254ec9] active:bg-[#1f40aa] text-white text-xs font-semibold shadow-sm transition"
        >
            <span class="text-base font-bold leading-none">＋</span>
            <span class="hidden sm:inline">Add task</span>
        </a>

        <!-- User Avatar Initial -->
        <a 
            href="{{ route('profile') }}" 
            class="w-9 h-9 rounded-full bg-blue-50 text-[#315fe8] font-bold flex items-center justify-center text-xs border border-blue-200/80 hover:ring-2 hover:ring-[#315fe8]/30 transition"
            title="Profile & Settings"
        >
            {{ strtoupper(substr(Auth::user()->name ?? 'J', 0, 1)) }}
        </a>
    </div>
</header>
