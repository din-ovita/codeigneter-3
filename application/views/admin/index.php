<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ADMIN</title>
</head>

<body class="relative">
    <div class="">
        <?php $this->load->view('style/navbar') ?>
    </div>
    <div class="absolute">
        <?php $this->load->view('style/sidebar') ?>
    </div>


    <div class="ml-64 mr-8 pt-5">
        <h1 class="text-3xl text-gray-500 mb-6">Dashboard Admin</h1>
        <div class="grid grid-cols-4 gap-6">
            <div class="bg-cyan-500 rounded-md py-6 px-4">
                <div>
                    <p class="text-white text-lg font-lg font-semibold">Jumlah Kelas</p>
                    <p class="mt-5 font-bold text-2xl text-white"><?php echo $kelas ?></p>
                </div>
                <!-- <i class="fas fa-user"> -->
            </div>
            <div class="bg-cyan-500 rounded-md py-6 px-4">
                <div>
                    <p class="text-white text-lg font-lg font-semibold">Jumlah Siswa</p>
                    <p class="mt-5 font-bold text-2xl text-white"><?php echo $siswa ?></p>
                </div>
                <!-- <i class="fas fa-user"> -->
            </div>
            <div class="bg-cyan-500 rounded-md py-6 px-4">
                <div>
                    <p class="text-white text-lg font-lg font-semibold">Jumlah Guru</p>
                    <p class="mt-5 font-bold text-2xl text-white"><?php echo $guru ?></p>
                </div>
                <!-- <i class="fas fa-user"> -->
            </div>
            <div class="bg-cyan-500 rounded-md py-6 px-4">
                <div>
                    <p class="text-white text-lg font-lg font-semibold">Jumlah Mapel</p>
                    <p class="mt-5 font-bold text-2xl text-white"><?php echo $mapel ?></p>
                </div>
                <!-- <i class="fas fa-user"> -->
            </div>
        </div>
    </div>
</body>

</html>