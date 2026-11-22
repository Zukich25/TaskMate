# TaskMate — Student To-Do List & Workspace

**Course:** HCI 1 – Prototyping and Interface Development  
**Institution:** Cordova Public College (CPC) – 3rd Year BSIT  
**Student:** Cabansay, John Kenny C.  
**Instructor:** Irene Ida  

---

## 📌 Project Overview
TaskMate is an interactive to-do list and academic task manager built specifically for college students. It helps organize assignments, lab reports, and exam deadlines into a clear dashboard with priority tags, status filters, and instant progress tracking.

---

## 🛠️ Tech Stack
* **Backend:** PHP 8.2 & Laravel 12 (MVC Architecture)
* **Frontend:** Laravel Blade, Tailwind CSS, Alpine.js
* **Database:** SQLite (`database.sqlite`) — portable with zero database setup required
* **Deployment:** Vercel Serverless Ready (`vercel.json` + `api/index.php`)

---

## 🚀 How to Run Locally

### Option 1: Double-Click Launcher (Easiest on Windows)
1. In the project folder, double-click **`run_project.bat`**.
2. Keep the black terminal window open.
3. Your browser will automatically open to:  
   👉 **`http://127.0.0.1:8000`**

### Option 2: Command Line
```powershell
# In the Taskmate folder:
php artisan serve
```
Then visit: `http://127.0.0.1:8000`

---

## 🔑 Demo Account
* **Email:** `Cabansay@gmail.com`
* **Password:** `password`
*(You can also click **Create account** to register a new student account.)*

---

## 🌐 Deploying to Vercel (Live Demo)
1. Initialize git and push this repository to your GitHub account:
   ```bash
   git add .
   git commit -m "Deploy TaskMate to Vercel"
   git push origin main
   ```
2. Log into [Vercel](https://vercel.com/) and click **"Add New Project"**.
3. Import your `Taskmate` GitHub repository.
4. Vercel automatically detects `vercel.json` and `api/index.php`.
5. Click **Deploy**! Your project will be live with its own public URL.
