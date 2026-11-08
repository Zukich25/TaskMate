<!-- Navigation Sidebar Component (Figma Sidebar Layout) -->
<aside 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-slate-200/80 flex flex-col justify-between transition-transform duration-300 ease-in-out lg:static lg:inset-auto"
>
    <div class="flex-1 overflow-y-auto px-4 py-6">
        <!-- Logo Branding -->
        <div class="flex items-center justify-between px-2 mb-8">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-[#315fe8] flex items-center justify-center text-white shadow-sm shadow-blue-500/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <span class="text-xl font-bold tracking-tight text-[#18345e] block">TaskMate</span>
                </div>
            </a>
            <!-- Mobile Close Button -->
            <button 
                type="button" 
                @click="sidebarOpen = false" 
                class="lg:hidden text-slate-400 hover:text-slate-600 p-1 rounded-lg"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Section 1: STUDENT WORKSPACE -->
        <div class="mb-6">
            <span class="px-3 text-[10px] font-bold tracking-wider uppercase text-[#91a0b5] block mb-2">
                Student Workspace
            </span>
            <nav class="space-y-1">
                <!-- Dashboard -->
                <a 
                    href="{{ route('dashboard') }}" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-[#315fe8]' : 'text-[#536581] hover:bg-slate-50 hover:text-[#18345e]' }}"
                >
                    <span class="text-base leading-none">⌂</span>
                    <span>Dashboard</span>
                </a>

                <!-- My Tasks -->
                <a 
                    href="{{ route('tasks.index') }}" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('tasks.*') && !request()->has('filter') ? 'bg-blue-50 text-[#315fe8]' : 'text-[#536581] hover:bg-slate-50 hover:text-[#18345e]' }}"
                >
                    <span class="text-base leading-none">▤</span>
                    <span>My Tasks</span>
                </a>

                <!-- Pending -->
                <a 
                    href="{{ route('tasks.index', ['filter' => 'pending']) }}" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request('filter') === 'pending' ? 'bg-blue-50 text-[#315fe8]' : 'text-[#536581] hover:bg-slate-50 hover:text-[#18345e]' }}"
                >
                    <span class="text-base leading-none text-amber-500">◷</span>
                    <span>Pending</span>
                </a>

                <!-- Completed -->
                <a 
                    href="{{ route('tasks.index', ['filter' => 'completed']) }}" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request('filter') === 'completed' ? 'bg-blue-50 text-[#315fe8]' : 'text-[#536581] hover:bg-slate-50 hover:text-[#18345e]' }}"
                >
                    <span class="text-base leading-none text-emerald-500">✓</span>
                    <span>Completed</span>
                </a>

                <!-- Notifications -->
                <a 
                    href="{{ route('notifications') }}" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('notifications') ? 'bg-blue-50 text-[#315fe8]' : 'text-[#536581] hover:bg-slate-50 hover:text-[#18345e]' }}"
                >
                    <span class="text-base leading-none text-indigo-500">♧</span>
                    <span>Notifications</span>
                </a>
            </nav>
        </div>

        <!-- Section 2: WORKSPACE PREFERENCES -->
        <div class="mb-6">
            <span class="px-3 text-[10px] font-bold tracking-wider uppercase text-[#91a0b5] block mb-2">
                Workspace
            </span>
            <nav class="space-y-1">
                <!-- Help & Tips -->
                <a 
                    href="{{ route('help') }}" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('help') ? 'bg-blue-50 text-[#315fe8]' : 'text-[#536581] hover:bg-slate-50 hover:text-[#18345e]' }}"
                >
                    <span class="text-base leading-none">?</span>
                    <span>Help & Tips</span>
                </a>

                <!-- Profile & Settings -->
                <a 
                    href="{{ route('profile') }}" 
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('profile') ? 'bg-blue-50 text-[#315fe8]' : 'text-[#536581] hover:bg-slate-50 hover:text-[#18345e]' }}"
                >
                    <span class="text-base leading-none">⚙</span>
                    <span>Profile & Settings</span>
                </a>
            </nav>
        </div>
    </div>

    <!-- User Profile & Logout Bottom Card (Figma Style) -->
    <div class="p-4 border-t border-slate-100 bg-slate-50/50">
        <div class="flex items-center justify-between mb-3 px-1">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-9 h-9 rounded-full bg-blue-100 text-[#315fe8] font-bold flex items-center justify-center text-sm shrink-0 border border-blue-200">
                    {{ strtoupper(substr(Auth::user()->name ?? 'J', 0, 1)) }}
                </div>
                <div class="min-w-0 truncate">
                    <p class="text-xs font-bold text-[#253858] truncate">
                        {{ Auth::user()->name ?? 'John Kenny' }}
                    </p>
                    <p class="text-[11px] text-[#8291a8] truncate">Student account</p>
                </div>
            </div>
            <a href="{{ route('profile') }}" class="text-[#60718c] hover:text-[#18345e] p-1 font-bold text-sm">⋯</a>
        </div>

        <!-- Logout Button -->
        <button 
            type="button" 
            @click="showLogoutModal = true"
            class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-rose-50 text-[#a74a44] hover:bg-rose-100 active:bg-rose-200 font-semibold text-xs transition duration-150"
        >
            <span class="text-sm">↪</span>
            <span>Logout</span>
        </button>
    </div>
</aside>
