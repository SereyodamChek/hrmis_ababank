<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — ABA HRMIS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('/aba-logo.png') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-gradient { background: linear-gradient(180deg, #005D7B, #0A7288); }
        .card-shadow { box-shadow: 0 8px 22px rgba(0,0,0,0.08); }
        .smooth { transition: all .25s ease; }
    </style>
</head>
<body class="bg-[#f4f7f9] min-h-screen w-full">
<div class="flex min-h-screen w-full">
    <aside class="w-64 sidebar-gradient text-white p-6 hidden md:flex flex-col">
        <div class="flex items-center gap-3 mb-8">
            <img src="{{ asset('/aba-logo.png') }}" class="w-12 h-12 rounded-lg" alt="ABA Logo">
            <div>
                <h2 class="text-lg font-bold leading-tight">ABA HRMIS</h2>
                <p class="text-sm opacity-70">HR Dashboard</p>
            </div>
        </div>
        <nav class="space-y-2">
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-white/10 smooth">Dashboard</a>
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-white/10 smooth">Employees</a>
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-white/10 smooth">Departments</a>
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-white/10 smooth">Attendance</a>
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-white/10 smooth">Reports</a>
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-white/10 smooth">Settings</a>
        </nav>
    </aside>
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-8">
            <div class="bg-white px-4 py-2 rounded-xl shadow-sm w-72 text-gray-500">
                Search...
            </div>
            <div class="flex items-center gap-4">
                <button 
                    onclick="confirmLogout()" 
                    class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 smooth"
                >Logout</button>
                <div class="text-right">
                    <p class="font-bold text-gray-800">Administrator</p>
                    <p class="text-sm text-gray-500">admin@aba.com</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-white shadow grid place-items-center font-bold text-[#005D7B]">
                    A
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-6 rounded-xl card-shadow">
                <p class="text-gray-600">Employees</p>
                <h2 class="text-3xl font-extrabold text-[#005D7B]">1,248</h2>
            </div>
            <div class="bg-white p-6 rounded-xl card-shadow">
                <p class="text-gray-600">Departments</p>
                <h2 class="text-3xl font-extrabold text-[#005D7B]">18</h2>
            </div>
            <div class="bg-white p-6 rounded-xl card-shadow">
                <p class="text-gray-600">Today's Attendance</p>
                <h2 class="text-3xl font-extrabold text-[#005D7B]">1,040</h2>
            </div>
            <div class="bg-white p-6 rounded-xl card-shadow">
                <p class="text-gray-600">Pending Requests</p>
                <h2 class="text-3xl font-extrabold text-[#005D7B]">6</h2>
            </div>
        </div>
        <div class="mt-6 bg-white p-6 rounded-xl card-shadow">
            <h3 class="text-lg font-semibold mb-2">Overview</h3>
            <p class="text-gray-600">
                This is a high-quality premium HRMIS dashboard layout. Add widgets and dynamic data as needed.
            </p>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmLogout() {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will be logged out!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Logout'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('logout') }}";
        }
    });
}
</script>
</body>
</html>
