<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <!-- Tambahkan CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-hover tbody tr:hover {
            background-color: #e2e6ea;
        }
        .btn-custom {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-users"></i> Data Pelanggan</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5>Daftar Pelanggan Terdaftar</h5>
                    <a href="tambahPelanggan.php" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>

                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../koneksi.php";
                            $no = 1;
                            $query = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY namaPelanggan ASC");
                            while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($data['namaPelanggan']); ?></td>
                            <td><?php echo htmlspecialchars($data['hpPelanggan']); ?></td>
                            <td><?php echo htmlspecialchars($data['alamatPelanggan']); ?></td>
                            <td>
                                <a href="editPelanggan.php?id=<?php echo $data['idPelanggan']; ?>" class="btn btn-warning btn-sm btn-custom">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="hapusPelanggan.php?id=<?php echo $data['idPelanggan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tambahkan JS Bootstrap 5 dan FontAwesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


