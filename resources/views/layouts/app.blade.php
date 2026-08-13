<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshBatch | {{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .card-hover { transition: all 0.3s ease; border: 1px solid #e2e8f0; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1); border-color: #cbd5e1; }
    </style>
</head>
<body class="antialiased text-slate-800">
<div class="flex">
    <!-- Sidebar -->
    <aside class="hidden md:block w-64 bg-white shadow-sm h-screen p-6 sticky top-0 flex-col">
        <div class="flex items-center gap-3 mb-8">
            <span class="material-symbols-outlined text-indigo-600 text-3xl">bar_chart</span>
            <h1 class="text-xl font-bold text-slate-800">FreshBatch</h1>
        </div>
        <nav class="flex flex-col space-y-1">
            <a href="/" class="flex items-center gap-3 p-3 rounded-xl font-medium {{ request()->is('/') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-50' }}">
                <span class="material-symbols-outlined">dashboard</span>Dashboard
            </a>
            <a href="/pemasukan" class="flex items-center gap-3 p-3 rounded-xl font-medium {{ request()->is('pemasukan') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-50' }}">
                <span class="material-symbols-outlined">trending_up</span>Pemasukan
            </a>
            <a href="/pengeluaran" class="flex items-center gap-3 p-3 rounded-xl font-medium {{ request()->is('pengeluaran') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-50' }}">
                <span class="material-symbols-outlined">trending_down</span>Pengeluaran
            </a>
            <a href="/rekap" class="flex items-center gap-3 p-3 rounded-xl font-medium {{ request()->is('rekap') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-50' }}">
                <span class="material-symbols-outlined">assessment</span>Rekap
            </a>
            <a href="/stok" class="flex items-center gap-3 p-3 rounded-xl font-medium {{ request()->is('stok') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-50' }}">
                <span class="material-symbols-outlined">inventory</span>Stok
            </a>
        </nav>
    </aside>
    <!-- Content -->
    <main class="flex-1 p-4 md:p-8">
        @yield('content')
    </main>
</div>
</body>
</html>
