<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center">Laundry Apps</h3>
        
        <!-- fungsi untuk mengatur pesan gagal pada saat memasukkan pasword atau username -->
        <?php
        if(isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert alert-danger'>Login Gagal! Username / Password Salah!</div>";
            } elseif ($_GET['pesan'] == "logout") {
                echo "<div class='alert alert-success'>Anda telah berhasil logout.</div>";
            } elseif ($_GET['pesan'] == "belum_login") {
                echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman ini.</div>";
            }
        }
        ?>

        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control rounded-pill" name="username" id="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control rounded-pill" name="password" id="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block w-100 rounded-pill">Submit</button>
        </form>

        <!-- CDN JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>