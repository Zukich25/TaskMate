<!-- Logout Confirmation Modal -->
<div 
    x-show="showLogoutModal" 
    x-cloak
    class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true"
>
    <!-- Backdrop overlay -->
    <div 
        x-show="showLogoutModal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"
        @click="showLogoutModal = false"
    ></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div 
            x-show="showLogoutModal"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative transform overflow-hidden rounded-3xl bg-white p-6 sm:p-8 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-slate-100"
        >
            <!-- Warning Icon -->
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-50 text-rose-600 mb-5">
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </div>

            <div class="text-center">
                <h3 class="text-xl font-bold text-[#172b4d]" id="modal-title">Log out of TaskMate?</h3>
                <p class="mt-2 text-sm text-[#75849a]">
                    Are you sure you want to end your current student session? You can sign back in anytime with your credentials.
                </p>
            </div>

            <div class="mt-6 flex flex-col-reverse sm:flex-row gap-3">
                <button 
                    type="button" 
                    @click="showLogoutModal = false"
                    class="w-full inline-flex justify-center rounded-xl bg-slate-100 px-4 py-3 text-sm font-semibold text-[#536581] hover:bg-slate-200 transition"
                >
                    Cancel
                </button>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button 
                        type="submit" 
                        class="w-full inline-flex justify-center rounded-xl bg-rose-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-rose-700 transition"
                    >
                        Yes, Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
