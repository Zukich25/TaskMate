@extends('layouts.app')

@section('title', 'Help & Tips - TaskMate')
@section('breadcrumb', 'Help & Tips')
@section('page_title', 'Help & Tips')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div>
        <p class="text-sm font-medium text-[#71819a]">
            Helpful tips to organize your college coursework and get the most out of TaskMate.
        </p>
    </div>

    <!-- Help & Tips Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Tip 1 -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-[#315fe8] flex items-center justify-center font-bold text-lg">
                1
            </div>
            <h3 class="text-base font-bold text-[#172b4d]">Group by Course</h3>
            <p class="text-xs sm:text-sm text-[#71819a] leading-relaxed">
                Always include the subject code or course name (e.g., "HCI 1" or "IT 301") in the course field. This keeps your assignments clearly separated and easy to search.
            </p>
        </div>

        <!-- Tip 2 -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg">
                2
            </div>
            <h3 class="text-base font-bold text-[#172b4d]">Quick Toggle Checkboxes</h3>
            <p class="text-xs sm:text-sm text-[#71819a] leading-relaxed">
                Click any checkbox on the dashboard or task list to instantly mark an assignment complete. It moves straight into your "Completed" archive.
            </p>
        </div>

        <!-- Tip 3 -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-lg">
                3
            </div>
            <h3 class="text-base font-bold text-[#172b4d]">Set Priority Levels</h3>
            <p class="text-xs sm:text-sm text-[#71819a] leading-relaxed">
                Tag major exams or projects as <span class="font-bold text-rose-600">High</span> priority. They will appear with visual alert badges so you won't miss urgent deadlines.
            </p>
        </div>

        <!-- Tip 4 -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-lg">
                4
            </div>
            <h3 class="text-base font-bold text-[#172b4d]">HCI Usability Principles</h3>
            <p class="text-xs sm:text-sm text-[#71819a] leading-relaxed">
                TaskMate is designed following Jakob Nielsen's Usability Heuristics: consistent visual hierarchy, error prevention, recognizable status colors, and zero navigation dead ends.
            </p>
        </div>
    </div>

    <!-- Academic Information Box -->
    <div class="p-6 rounded-3xl bg-blue-50/70 border border-blue-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h4 class="text-xs font-bold uppercase tracking-wider text-[#315fe8]">Cordova Public College (CPC)</h4>
            <p class="text-sm font-bold text-[#18345e] mt-0.5">HCI 1 – Prototyping and Interface Development</p>
            <p class="text-xs text-slate-500 mt-1">Instructor: Irene Ida • Student: Cabansay John Kenny C. (3rd Year – BSIT)</p>
        </div>
        <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl bg-[#315fe8] text-white text-xs font-bold shadow-sm hover:bg-blue-700 transition shrink-0 text-center">
            Go to Dashboard
        </a>
    </div>

</div>
@endsection
