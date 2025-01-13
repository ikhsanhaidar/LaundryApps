<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Tambah Pelanggan</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="pelangganAksi.php">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Ketikan nama pelanggan">
                        </div>
                        <div class="mb-3">
                            <label for="hp" class="form-label">Handphone</label>
                            <input type="number" class="form-control" id="hp" name="hp" placeholder="ketikan no.hp">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Ketikan alamat pelanggan">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>