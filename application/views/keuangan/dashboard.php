<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Keuangan</title>
</head>

<body class="overflow-x-hidden">
    <div class="flex gap-10">
        <div class="fixed">
            <?php $this->load->view('keuangan/sidebar') ?>
        </div>
        <div class="ml-[14rem]">
            <?php $this->load->view('style/navbar') ?>
            <div class="my-8 mx-10">
                <h1 class="text-3xl text-gray-500 mb-6">Dashboard Keuangan</h1>
                <div class="grid grid-cols-3 gap-6">
                    <div class="bg-cyan-500 rounded-md py-6 px-4">
                        <div>
                            <p class="text-white text-lg font-lg font-semibold capitalize ">jumlah pembayaran SPP</p>
                            <p class="mt-5 font-bold text-2xl text-white"><?php echo $spp ?></p>
                        </div>
                    </div>
                    <div class="bg-cyan-500 rounded-md py-6 px-4">
                        <div>
                            <p class="text-white text-lg font-lg font-semibold capitalize">jumlah pembayaran uang gedung</p>
                            <p class="mt-5 font-bold text-2xl text-white"><?php echo $uang_gedung ?></p>
                        </div>
                    </div>
                    <div class="bg-cyan-500 rounded-md py-6 px-4">
                        <div>
                            <p class="text-white text-lg font-lg font-semibold capitalize">jumlah pembayaran uang seragam</p>
                            <p class="mt-5 font-bold text-2xl text-white"><?php echo $uang_seragam ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>