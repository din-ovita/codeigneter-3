<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Siswa</title>
</head>

<body class="overflow-x-hidden">
    <div class="flex gap-10">
        <div class="fixed">
            <?php $this->load->view('style/sidebar') ?>
        </div>
        <div class="ml-[14rem]">
            <?php $this->load->view('style/navbar') ?>
            <div class="my-8 mx-10">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl text-gray-500 ">Data Siswa</h1>
                    <a href="<?php echo base_url('admin/tambah_siswa') ?>" class="bg-cyan-500 py-2 px-8 font-semibold text-white rounded-sm">ADD</a>
                </div>
                <table class="w-full bg-white shadow-lg rounded-md">
                    <tr class="bg-cyan-500 text-white">
                        <th class="border py-3">No</th>
                        <th class="border py-3">Foto</th>
                        <th class="border py-3">Nama</th>
                        <th class="border py-3">Gender</th>
                        <th class="border py-3">NISN</th>
                        <th class="border py-3">Kelas</th>
                        <th class="border py-3">Aksi</th>
                    </tr>
                    <?php $int = 0;
                    foreach ($result as $row) : $int++ ?>
                        <tr>
                            <td class="border py-3 px-3 text-center"><?= $int ?></td>
                            <td class="border py-3 px-3"><img src="<?php echo base_url('images/siswa/' . $row->foto) ?>" width="50" height="50" alt=""></td>
                            <td class="border py-3 px-3"><?= $row->nama_siswa ?></td>
                            <td class="border py-3 px-3"><?= $row->gender ?></td>
                            <td class="border py-3 px-3"><?= $row->nisn ?></td>
                            <td class="border py-3 px-3"> <?php echo kelas($row->id_kelas) ?>
                            </td>
                            <td class="border py-6 flex items-center justify-center gap-4">
                                <a href="<?php echo base_url('admin/ubah_siswa/') . $row->id_siswa ?>" class="py-1 px-4 bg-blue-500 text-gray-50">Update</a>
                                <button class="py-1 px-4 bg-red-500 text-gray-50" onclick="hapus(<?php echo $row->id_siswa ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        function hapus(id) {
            var yes = confirm('Sure Deleted?');
            if (yes == true) {
                window.location.href = '<?php echo base_url('admin/hapus_siswa/') ?>' + id;
            }
        }
    </script>
</body>

</html>