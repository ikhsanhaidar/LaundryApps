<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Pengaturan Harga Laundry</h4>
                </div>
                <div class="card-body">
                    <?php 
                    include '../koneksi.php';

                    // mengambil data harga per kilo dari tabel harga
                    $data = mysqli_query($conn, "SELECT harga_per_kilo FROM harga");
                    while($d = mysqli_fetch_array($data)){ ?>
                    <form method="post" action="harga_update.php">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga per kilo</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $d['harga_per_kilo']; ?>" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ubah Harga</button>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
