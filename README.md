# TaskMate — Student To-Do & Workspace Interface

**HCI 1 – Prototyping and Interface Development**  
**Cordova Public College (CPC) — 3rd Year BSIT**  
**Prepared by:** Cabansay, John Kenny C.  
**Instructor:** Irene Ida  
**Figma Prototype Link:** [View Figma UI Prototype](https://www.figma.com/design/IfAjSX72HZKikQJfz5U6Qd/Untitled?node-id=0-1&t=ZbiA5rVHTEzMEL2p-1)

---

## 1. Project Overview & HCI Rationale
TaskMate is an interactive desktop-first, mobile-responsive to-do list and academic task management application designed specifically for college students. Students often struggle to track assignments across different subjects; TaskMate gathers all coursework into a calming, structured dashboard with status tags, priority alerts, and instant progress feedback.

---

## 2. Organized Project Structure
The codebase follows standard Laravel MVC conventions with an intuitive, student-friendly layout:

```text
Taskmate/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php        # Figma 1, 4, 5, 16: Login, Register, Forgot Password, Logout
│   │   ├── DashboardController.php   # Figma 2: Overview stats, greeting, upcoming tasks
│   │   ├── TaskController.php        # Figma 3, 6, 7, 8, 9, 10, 11, 15: Task CRUD, filtering, search
│   │   └── PageController.php        # Figma 12, 13, 14: Notifications, Profile, Help & Tips
│   └── Models/
│       ├── Task.php                  # Course, due date, status, priority, description
│       └── User.php                  # Student authentication model
├── database/
│   ├── migrations/
│   │   └── create_tasks_table.php    # Clean schema for student tasks
│   ├── seeders/
│   │   └── DatabaseSeeder.php        # Pre-seeded with 12 realistic student tasks matching Figma
│   └── database.sqlite               # Zero-setup portable database
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php         # Master layout (sidebar, topbar, mobile drawer, modals)
│       │   └── guest.blade.php       # Auth layout (Login, Register, Forgot Password)
│       ├── auth/
│       │   ├── login.blade.php       # Figma 1_Login 1: Split-screen quote & sign-in card
│       │   ├── register.blade.php    # Figma 4_SignUp 1: Student registration
│       │   └── forgot-password.blade.php # Figma 5_Forgot Password 1: Password reset
│       ├── dashboard.blade.php       # Figma 2_Dashboard 1: Stats, motivational banner, upcoming
│       ├── tasks/
│       │   ├── index.blade.php       # Figma 3_My Tasks 1: Tabs (All/Pending/Completed), search, table
│       │   ├── create.blade.php      # Figma 7_Add Task 1: Add task form
│       │   ├── edit.blade.php        # Figma 8_Edit Task 1: Edit task form
│       │   └── show.blade.php        # Figma 6_Task Details 1: Full task view & toggle
│       ├── pages/
│       │   ├── notifications.blade.php # Figma 12_Notifications 1: Deadline alerts
│       │   ├── profile.blade.php     # Figma 13_Profile Settings 1: Student info & preferences
│       │   └── help.blade.php        # Figma 14_Help Tips 1: HCI guidelines & best practices
│       └── components/
│           ├── sidebar.blade.php     # Responsive desktop sidebar & mobile slide-over drawer
│           ├── topbar.blade.php      # Header with breadcrumbs, search, and student avatar
│           └── logout-modal.blade.php# Figma 16_Logout Confirmation 2 modal
└── run_project.bat                   # Double-click launcher to run the app immediately
```

---

## 3. Technology Stack
* **Backend:** Laravel 12 (PHP 8.2)
* **Frontend:** Laravel Blade + Tailwind CSS (via CDN) + Alpine.js
* **Database:** SQLite (self-contained, requires no MySQL configuration or setup)
* **Design System:** Navy (`#18345e`), Royal Blue (`#315fe8`), Slate (`#f4f7fb`), and Inter Typography matching Figma.

---

## 4. How to Run TaskMate

### Option A: One-Click Launcher (Easiest)
1. In Windows File Explorer, open the `c:\Users\caban\Downloads\Taskmate` folder.
2. Double-click `run_project.bat`.
3. Your browser will automatically open to `http://127.0.0.1:8000`!

### Option B: Terminal / Command Line
1. Open PowerShell or Command Prompt in the `Taskmate` directory:
   ```powershell
   "C:\xampp\php\php.exe" artisan serve
   ```
2. Open your browser and navigate to:
   ```
   http://127.0.0.1:8000
   ```

---

## 5. Demo Credentials
* **Email:** `Cabansay@gmail.com`
* **Password:** `password`
*(Any registered student account will also work)*
