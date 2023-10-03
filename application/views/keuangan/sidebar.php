<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>

<div class="bg-gray-800 w-56 h-[100vh] py-2 px-3 relative">
    <div class="mt-3 ">
        <a href="http://localhost/codeigniter-3/admin/" class="font-bold uppercase text-cyan-600 text-xl">Admin Keuangan</a>
    </div>
    <ul class="mt-8">
        <li class="py-2 px-4 my-2 <?= $menu == 'dashboard' ? 'bg-cyan-500' : '' ?>">
            <a href="<?php echo base_url('admin/dashboard_keuangan') ?>" class=" font-semibold text-gray-100 flex gap-3 items-center"><i class="fas fa-palette w-5 h-5"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class=" py-2 px-4 my-2 <?= $menu == 'pembayaran' ? 'bg-cyan-500' : '' ?>">
            <a href="<?php echo base_url('admin/pembayaran') ?>" class=" font-semibold text-gray-100 flex gap-3 items-center"><i class="fas fa-money-bill-wave w-5 h-5"></i>
                <p>Pembayaran</p>
            </a>
        </li>
    </ul>
    <div class="absolute bottom-5">
        <a href="<?php echo base_url('auth/logout') ?>" class="flex items-center gap-3 px-4 w-full">
            <i class="fas fa-sign-out-alt w-5 h-5 text-red-500"></i>
            <p class="font-semibold text-gray-400">Keluar</p>
        </a>
    </div>
</div>