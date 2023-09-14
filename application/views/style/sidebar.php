<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>

<div class="bg-gray-800 w-56 h-[37.45rem] py-2 px-3 relative">
    <ul class="mt-3">
        <li class="bg-cyan-500 py-2 px-4">
            <a href="<?php echo base_url('admin/siswa') ?>" class="font-semibold text-gray-100 flex gap-3 items-center"><i class="fas fa-user w-5 h-5"></i>
                <p>Siswa</p>
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