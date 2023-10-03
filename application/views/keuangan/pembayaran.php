<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <title>Pembayaran</title>
</head>

<body class="overflow-x-hidden">
    <div class="flex gap-10">
        <div class="fixed">
            <?php $this->load->view('keuangan/sidebar') ?>
        </div>
        <div class="ml-[14rem]">
            <?php $this->load->view('style/navbar') ?>
            <div class="my-8 mx-10">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl text-gray-500 ">Data Pembayaran</h1>
                    <div>
                        <a href="<?php echo base_url('admin/tambah_pembayaran') ?>" class="bg-cyan-500 py-2 px-6 font-semibold text-white rounded-sm">ADD</a>
                        <a href="<?php echo base_url('admin/export') ?>" class="bg-cyan-500 py-2 px-6 font-semibold text-white rounded-sm">EXPORT</a>
                        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" class="bg-cyan-500 py-2 px-5 font-semibold text-white rounded-sm">IMPORT</button>
                    </div>
                </div>
                <table class="w-full bg-white shadow-lg rounded-md">
                    <tr class="bg-cyan-500 text-white">
                        <th class="border py-3 w-[5%]">No</th>
                        <th class="border py-3">Nama Siswa</th>
                        <th class="border py-3">Kelas</th>
                        <th class="border py-3">Jenis Pembayaran</th>
                        <th class="border py-3">Nominal</th>
                        <th class="border py-3">Aksi</th>
                    </tr>
                    <?php $int = 0;
                    foreach ($pembayaran as $row) : $int++ ?>
                        <tr>
                            <td class="border py-3 px-3 text-center"><?= $int ?></td>
                            <td class="border py-3 px-3"><?php echo siswa($row->id_siswa) ?></td>
                            <td class="border py-3 px-3"><?php echo siswa2($row->id_siswa) ?></td>
                            <td class="border py-3 px-3"><?= $row->jenis_pembayaran ?></td>
                            <td class="border py-3 px-3"><?php echo convRupiah($row->total) ?></td>
                            </td>
                            <td class="border py-6 flex items-center justify-center gap-4">
                                <a href="<?php echo base_url('admin/ubah_pembayaran/') . $row->id_bayar ?>" class="py-1 px-4 bg-blue-500 text-gray-50">Update</a>
                                <button class="py-1 px-4 bg-red-500 text-gray-50" onclick="hapus(<?php echo $row->id_bayar ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Import Pembayaran
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-6 space-y-6" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/import') ?>">
                    <div>
                        <label class="font-semibold" for="foto">Upload File</label>
                        <input type="file" class="block mt-4" name="file">
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <button data-modal-hide="defaultModal" type="button" class="font-medium py-2 px-4 bg-gray-400 rounded-sm outline-none text-white">Kembali</button>
                        <input name="import" value="Import" type="submit" class="font-medium py-2 px-4 bg-cyan-500 rounded-sm outline-none text-white"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script>
        function hapus(id) {
            var yes = confirm('Sure Deleted?');
            if (yes == true) {
                window.location.href = '<?php echo base_url('admin/hapus_pembayaran/') ?>' + id;
            }
        }

        function kembali() {
            window.history.go(-1);
        }
    </script>
</body>

</html>