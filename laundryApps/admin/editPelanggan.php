<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Data Pelanggan</h4>
                </div>
                <div class="card-body">
                    <?php
                    include '../koneksi.php';
                    
                    $id = $_GET['id'];
                    $data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE idPelanggan='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <form method="post" action="updatePelanggan.php">
                            <input type="hidden" name="id" value="<?php echo $d['idPelanggan']; ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama .." value="<?php echo $d['namaPelanggan']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="hp" class="form-label">HP</label>
                                <input type="number" class="form-control" id="hp" name="hp" placeholder="Masukkan no.hp .." value="<?php echo $d['hpPelanggan']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat .." value="<?php echo $d['alamatPelanggan']; ?>">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


