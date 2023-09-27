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
            </div>
        </div>
    </div>
</body>

</html>