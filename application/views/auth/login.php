<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php echo $title ?></title>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="rounded-2xl shadow-lg max-w-4xl p-10 bg-gray-50 relative">
        <div class="absolute h-32 w-32 bg-cyan-600 rounded-full -z-10 -top-16 -right-16 shadow-lg"></div>
        <div class="absolute h-48 w-48 bg-transparent border border-4 border-gray-400 rounded-full -z-10 -bottom-24 -left-24 shadow-lg"></div>
        <div class="z-50">
            <h1 class="font-bold text-cyan-500 text-4xl">LOGIN</h1>
            <p class="font-semibold my-4">Enter your personal details and start journey with us </p>
            <form action="<?php echo base_url(); ?>Auth/aksi_login" method='post' class="mt-10">
                <div>
                    <label for="email" class="font-semibold">Email</label><br>
                    <input type="text" id="email" name="email" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300" placeholder="user_name">
                </div>
                <div class="relative">
                    <label for="password" class="font-semibold">Password</label><br>
                    <input type="password" id="password" name="password" required class="block rounded-sm p-2 w-full my-2 bg-gray-100 focus:outline-none focus:ring focus:ring-cyan-300" placeholder="*****">
                    <div class="absolute right-3 top-[55%]">
                        <i class="fas fa-eye-slash" onclick="togglePassword()" id="icon"></i>
                    </div>
                </div>
                <button type="submit" name="submit" class="mt-10 bg-cyan-500 w-full text-white font-semibold py-3 rounded-sm">LOGIN</button>
            </form>
        </div>
    </div>
    <script>
        function togglePassword() {
            var passwordType = document.getElementById("password");
            var icon = document.getElementById("icon");
            if (passwordType.type === "password") {
                passwordType.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordType.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>

</html>