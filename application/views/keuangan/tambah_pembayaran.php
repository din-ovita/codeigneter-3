<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Pembayaran</title>
</head>

<body class="overflow-x-hidden">
    <div class="flex gap-10">
        <div class="fixed">
            <?php $this->load->view('keuangan/sidebar') ?>
        </div>
        <div class="ml-[14rem]">
            <?php $this->load->view('style/navbar') ?>
            <div class="my-8 mx-10">
                <div class="rounded-2xl shadow-lg max-w-full p-10 bg-white">
                    <h1 class="text-2xl text-center font-bold text-cyan-500 mb-8 uppercase">Add Pembayaran</h1>
                    <form action="<?php echo base_url('admin/aksi_tambah_pembayaran') ?>" enctype="multipart/form-data" method="post">
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="nama" class="font-semibold">Nama Siswa</label><br>
                                <select name="id_siswa" id="id_siswa" class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300">
                                    <option selected>Pilih</option>
                                    <?php foreach ($siswa as $row) : ?>
                                        <option value="<?php echo $row->id_siswa ?>"><?php echo $row->nama_siswa ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="jenis_pembayaran" class="font-semibold">Jenis Pembayaran</label><br>
                                <select name="jenis_pembayaran" id="jenis_pembayaran" class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300">
                                    <option value="Pembayaran SPP">Pembayaran SPP</option>
                                    <option value="Pembayaran Uang Gedung">Pembayaran Uang Gedung</option>
                                    <option value="Pembayaran Uang Seragam">Pembayaran Uang Seragam</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="nominal" class="font-semibold">Total Pembayaran</label><br>
                            <input type="number" id="nominal" name="nominal" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300" placeholder="Masukkan nominal">
                        </div>
                        <button class="w-full text-white uppercase font-bold py-3 mt-10 rounded-sm bg-cyan-500 focus:outline-none focus:ring focus:ring-cyan-300">ADD</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>