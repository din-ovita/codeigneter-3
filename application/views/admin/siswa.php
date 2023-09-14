<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Siswa</title>
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
            <h1 class="text-3xl text-gray-500 mb-6">Data Siswa</h1>
            <table class="w-full bg-white shadow-lg rounded-md">
                <tr class="bg-cyan-500 text-white">
                    <th class="border py-3">No</th>
                    <th class="border py-3">Nama</th>
                    <th class="border py-3">Gender</th>
                    <th class="border py-3">NISN</th>
                    <th class="border py-3">Aksi</th>
                </tr>
                <?php $int = 0;
                foreach ($result as $row) : $int++ ?>
                    <tr>
                        <td class="border py-3 px-3 text-center"><?= $int ?></td>
                        <td class="border py-3 px-3"><?= $row->nama_siswa ?></td>
                        <td class="border py-3 px-3"><?= $row->gender ?></td>
                        <td class="border py-3 px-3"><?= $row->nisn ?></td>
                        <td class="border py-3 flex items-center justify-center gap-4">
                            <a href="#" class="py-1 px-4 bg-blue-500 text-gray-50">Update</a>
                            <button class="py-1 px-4 bg-red-500 text-gray-50">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>