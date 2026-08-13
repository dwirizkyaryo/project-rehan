<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pencatatan Laravel' }}</title>
    <script src="https://cdn.tailwindcss.com?v={{ time() }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="antialiased text-slate-800">

<div class="flex">
    <!-- Sidebar untuk Desktop -->
    <aside class="hidden md:block w-64 bg-white shadow-sm h-screen p-6 sticky top-0 flex-col">
        <div class="flex items-center gap-3 mb-8">
            <span class="material-symbols-outlined text-indigo-600 text-3xl">bar_chart</span>
            <h1 class="text-xl font-bold text-slate-800">Pencatatan</h1>
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
            <a href="#" class="flex items-center gap-3 p-3 rounded-xl font-medium text-slate-500 hover:bg-slate-50 opacity-50 cursor-not-allowed">
                <span class="material-symbols-outlined">assessment</span>Rekap
            </a>
            <a href="/stok" class="flex items-center gap-3 p-3 rounded-xl font-medium {{ request()->is('stok') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-50' }}">
                <span class="material-symbols-outlined">inventory</span>Stok
            </a>
            <div class="border-t border-slate-100 my-4"></div>
            <a href="#" class="flex items-center gap-3 p-3 rounded-xl font-medium text-slate-500 hover:bg-slate-50 opacity-50 cursor-not-allowed">
                <span class="material-symbols-outlined">settings</span>Admin
            </a>
        </nav>
    </aside>

    <div class="flex-1 pb-20 md:pb-0">
        <header class="md:hidden bg-white shadow-sm p-4 flex justify-between items-center sticky top-0 z-10">
            <h1 class="font-bold text-indigo-600">Pencatatan</h1>
        </header>
        <main class="p-4 md:p-8">
            {{ $slot }}
        </main> 
    </div> 
</div> 

<!-- Bottom Nav untuk Mobile -->
<nav class="md:hidden fixed bottom-0 w-full bg-white shadow-[0_-1px_3px_rgba(0,0,0,0.1)] flex justify-around p-3 z-50">
    <a href="/" class="flex flex-col items-center {{ request()->is('/') ? 'text-indigo-600' : 'text-slate-400' }}">
        <span class="material-symbols-outlined">dashboard</span>
        <span class="text-[10px] font-medium mt-1">Dash</span>
    </a>
    <a href="/stok" class="flex flex-col items-center {{ request()->is('stok') ? 'text-indigo-600' : 'text-slate-400' }}">
        <span class="material-symbols-outlined">inventory</span>
        <span class="text-[10px] font-medium mt-1">Stok</span>
    </a>
    <a href="#" class="flex flex-col items-center text-slate-400 opacity-50 cursor-not-allowed">
        <span class="material-symbols-outlined">assessment</span>
        <span class="text-[10px] font-medium mt-1">Rekap</span>
    </a>
    <a href="#" class="flex flex-col items-center text-slate-400 opacity-50 cursor-not-allowed">
        <span class="material-symbols-outlined">settings</span>
        <span class="text-[10px] font-medium mt-1">Admin</span>
    </a>
</nav>

</body>
</html>
