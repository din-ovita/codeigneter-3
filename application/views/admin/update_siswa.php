<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>UPDATE</title>
</head>

<body>
    <div class="relative">
        <div class="">
            <?php $this->load->view('style/navbar') ?>
        </div>
        <div class="absolute">
            <?php $this->load->view('style/sidebar') ?>
        </div>


        <div class="ml-64 mr-8 pt-5">
            <div class="rounded-2xl shadow-lg max-w-full p-10 bg-white">
                <h1 class="text-2xl text-center font-bold text-cyan-500 mb-8 uppercase">UPDATE Siswa</h1>
                <?php foreach ($siswa as $data_siswa) : ?>
                    <form action="<?php echo base_url('admin/aksi_ubah_siswa') ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_siswa" value="<?php echo $data_siswa->id_siswa ?>">
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="nama" class="font-semibold">Nama</label><br>
                                <input type="text" id="nama" name="nama" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300" placeholder="user_name" value="<?php echo $data_siswa->nama_siswa ?>">
                            </div>
                            <div>
                                <label for="nisn" class="font-semibold">NISN</label><br>
                                <input type="text" id="nisn" name="nisn" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300" placeholder="3301" value="<?php echo $data_siswa->nisn ?>">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="gender" class="font-semibold">Gender</label><br>
                                <select name="gender" id="gender" class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300">
                                    <option selected value="<?php echo $data_siswa->gender ?>"><?php echo $data_siswa->gender ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label for="kelas" class="font-semibold">Kelas</label><br>
                                <select name="id_kelas" id="kelas" class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300">
                                    <option selected value="<?php echo $data_siswa->id_kelas ?>"><?php echo kelas($data_siswa->id_kelas) ?></option>
                                    <?php foreach ($kelas as $row) : ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->tingkat_kelas . ' ' . $row->jurusan_kelas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label for="foto" class="font-semibold">Foto</label><br>
                                <input type="file" id="foto" name="foto" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300">
                            </div>
                        </div>
                        <button class="w-full text-white uppercase font-bold py-3 mt-10 rounded-sm bg-cyan-500 focus:outline-none focus:ring focus:ring-cyan-300">UPDATE SISWA</button>
                    </form>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</body>

</html>