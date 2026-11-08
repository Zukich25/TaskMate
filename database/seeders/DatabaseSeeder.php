<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Student User (Matching Figma login info)
        $user = User::firstOrCreate(
            ['email' => 'Cabansay@gmail.com'],
            [
                'name' => 'John Kenny',
                'password' => Hash::make('password'),
            ]
        );

        // Prepopulate tasks matching Figma prototype
        $tasks = [
            [
                'user_id' => $user->id,
                'title' => 'Biology lab report',
                'course' => 'Biology • Chapter 4',
                'due_date' => Carbon::today(),
                'due_time' => '4:00 PM',
                'status' => 'In progress',
                'priority' => 'High',
                'description' => 'Complete enzyme kinetics lab report with graph data and conclusion notes.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'History reading notes',
                'course' => 'World History • Unit 2',
                'due_date' => Carbon::tomorrow(),
                'due_time' => '11:59 PM',
                'status' => 'Pending',
                'priority' => 'Medium',
                'description' => 'Read chapter 3-5 on the Renaissance and summarize key events.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Algebra practice set',
                'course' => 'Mathematics • 20 questions',
                'due_date' => Carbon::today()->addDays(3),
                'due_time' => '5:00 PM',
                'status' => 'Pending',
                'priority' => 'Medium',
                'description' => 'Solve problems 1-20 on quadratic equations and graph parabolas.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'HCI Laboratory Prototype',
                'course' => 'HCI 1 • Activity Handout',
                'due_date' => Carbon::today(),
                'due_time' => '6:00 PM',
                'status' => 'In progress',
                'priority' => 'High',
                'description' => 'Interactive TaskMate wireframe to high-fidelity prototype in Laravel & Figma.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Database Schema & ERD',
                'course' => 'IT 301 • Database Systems',
                'due_date' => Carbon::today()->addDays(4),
                'due_time' => '8:00 PM',
                'status' => 'In progress',
                'priority' => 'High',
                'description' => 'Create ERD diagrams for student enrollment system.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Discrete Mathematics Logic Review',
                'course' => 'Math 201 • Logic & Sets',
                'due_date' => Carbon::today()->addDays(5),
                'due_time' => '2:00 PM',
                'status' => 'In progress',
                'priority' => 'Medium',
                'description' => 'Truth tables and predicate calculus exercises.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Literature review essay',
                'course' => 'English 101 • Draft 1',
                'due_date' => Carbon::yesterday(),
                'due_time' => '11:59 PM',
                'status' => 'Completed',
                'priority' => 'Low',
                'description' => '500-word critical analysis on contemporary Filipino literature.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Web Systems Environment Setup',
                'course' => 'IT 302 • Web Systems',
                'due_date' => Carbon::today()->subDays(2),
                'due_time' => '3:00 PM',
                'status' => 'Completed',
                'priority' => 'Medium',
                'description' => 'Install XAMPP, PHP, Composer, and test local development environment.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Computer Networks Packet Tracer Lab',
                'course' => 'IT 303 • Networking',
                'due_date' => Carbon::today()->subDays(3),
                'due_time' => '10:00 AM',
                'status' => 'Completed',
                'priority' => 'High',
                'description' => 'Configure VLANs and router-on-a-stick topology.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Cordova Public College Community Outreach',
                'course' => 'NSTP • Civic Welfare',
                'due_date' => Carbon::today()->subDays(4),
                'due_time' => '9:00 AM',
                'status' => 'Completed',
                'priority' => 'Low',
                'description' => 'Coastal clean-up documentation report in Cordova Cebu.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Operating Systems File Management Lab',
                'course' => 'IT 304 • Operating Systems',
                'due_date' => Carbon::today()->subDays(5),
                'due_time' => '1:00 PM',
                'status' => 'Completed',
                'priority' => 'Medium',
                'description' => 'Linux bash scripting for automated file backups and disk monitoring.',
            ],
            [
                'user_id' => $user->id,
                'title' => 'System Analysis Feasibility Study',
                'course' => 'SAD • Milestone 1',
                'due_date' => Carbon::today()->subDays(6),
                'due_time' => '4:30 PM',
                'status' => 'Completed',
                'priority' => 'High',
                'description' => 'Initial scope, cost-benefit analysis, and stakeholder matrix.',
            ],
        ];

        foreach ($tasks as $taskData) {
            Task::create($taskData);
        }
    }
}
