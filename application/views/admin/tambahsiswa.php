<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ADD</title>
</head>

<body class="overflow-x-hidden">
    <div class="flex gap-10">
        <div class="fixed">
            <?php $this->load->view('style/sidebar') ?>
        </div>
        <div class="ml-[14rem]">
            <?php $this->load->view('style/navbar') ?>
            <div class="my-8 mx-10">
                <div class="rounded-2xl shadow-lg max-w-full p-10 bg-white">
                    <h1 class="text-2xl text-center font-bold text-cyan-500 mb-8 uppercase">Add Siswa</h1>
                    <form action="<?php echo base_url('admin/aksi_tambah_siswa') ?>" enctype="multipart/form-data" method="post">
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="nama" class="font-semibold">Nama</label><br>
                                <input type="text" id="nama" name="nama" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300" placeholder="user_name">
                            </div>
                            <div>
                                <label for="nisn" class="font-semibold">NISN</label><br>
                                <input type="text" id="nisn" name="nisn" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300" placeholder="3301">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="gender" class="font-semibold">Gender</label><br>
                                <select name="gender" id="gender" class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300">
                                    <option selected>Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label for="kelas" class="font-semibold">Kelas</label><br>
                                <select name="kelas" id="kelas" class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300">
                                    <option selected>Pilih</option>
                                    <?php foreach ($kelas as $row) : ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->tingkat_kelas . ' ' . $row->jurusan_kelas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="gender" class="font-semibold">Foto</label><br>
                            <input type="file" name="foto" class="block rounded-sm p-2 w-full my-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">
                        </div>
                        <button class="w-full text-white uppercase font-bold py-3 mt-10 rounded-sm bg-cyan-500 focus:outline-none focus:ring focus:ring-cyan-300">ADD SISWA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>