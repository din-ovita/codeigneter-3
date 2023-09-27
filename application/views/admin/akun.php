<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <title>Akun</title>
</head>

<body class="d-flex" style="overflow: hidden;">
    <?php foreach ($user as $users) : ?>
        <div class="bg-dark" style="width: 16rem; height: 100vh; position:relative;">
            <h4 style="color: white;" class="p-4">Dashboard Admin</h4>
            <ul style="list-style: none;">
                <li class="mt-5">
                    <a href="" style="text-decoration:none; font-size:18px; color:white; font-weight:600;">Dashboard</a>
                </li>
                <li class="mt-3"> <a href="" style="text-decoration:none; font-size:18px; color:white; font-weight:600;">Siswa</a>
                </li>
                <li class="mt-3"> <a href="" style="text-decoration:none; font-size:18px; color:white; font-weight:600;">Lain nya</a>
                </li>
                <li class="mt-3">
                    <div class="dropdown">
                        <p class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:18px; color:white; font-weight:600;">
                            Account
                        </p>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div style="position:absolute; bottom:0px;">
                <p style=" font-size:18px; color:white; font-weight:600; " class="p-4">Log out</p>
            </div>
        </div>
        <div>
            <div style="width: 82vw;">
                <nav class="bg-white w-full shadow-lg bg-gray-50 flex items-center py-3 px-5">
                    <div style="text-align:end; ">
                        <a href=""><i class="far fa-user" style="font-size: 20px; color:black;"></i></a>
                    </div>
                </nav>
            </div>
            <div class="shadow-lg p-5" style="margin: 3rem 2rem;">
                <h2 class="text-center">Akun</h2>
                <form class="mt-5" action="<?php echo base_url('admin/aksi_ubah_akun') ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Masukkan Email" value="<?php echo $users->email ?>">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Masukkan Username" value="<?php echo $users->username ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_password" placeholder="Password Baru">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Konfimasi Password</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="confirm_password" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="foto" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="mt-4 d-flex">
                        <button type="submit" class="btn btn-primary" style="width: 200px;"><b>Ubah</b></button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>