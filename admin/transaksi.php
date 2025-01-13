<?php include 'header.php'; ?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Data Transaksi Laundry</h4>
        </div>
        <div class="card-body">

            <a href="transaksi_tambah.php" class="btn btn-primary btn-sm"> <i class="bi bi-plus"></i> Transaksi Baru
            </a>
            
            <br/>
            <br/>

            <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                    <tr>
                        <th style="width:1%;">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (Kg)</th>
                        <th>Tgl. Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>				
                        <th style="width:25%;">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // koneksi database
                    include '../koneksi.php';
                    // mengambil data pelanggan dari database
                    $data = mysqli_query($conn,"SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = idPelanggan ORDER BY transaksi_id DESC");
                    $no = 1;
                    // mengubah data ke array dan menampilkannya dengan perulangan while
                    while($d = mysqli_fetch_array($data)){ ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                            <td><?php echo $d['transaksi_tgl']; ?></td>
                            <td><?php echo $d['namaPelanggan']; ?></td>
                            <td><?php echo $d['transaksi_berat']; ?></td>
                            <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                            <td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
                            <td>
                                <?php 
                                if($d['transaksi_status'] == "0"){
                                    echo "<span class='badge bg-warning text-dark'>PROSES</span>";
                                } elseif($d['transaksi_status'] == "1"){
                                    echo "<span class='badge bg-info text-dark'>DICUCI</span>";
                                } elseif($d['transaksi_status'] == "2"){
                                    echo "<span class='badge bg-success'>SELESAI</span>";
                                }
                                ?>							
                            </td>
                            <td>
                                <a href="transaksi_invoice.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank" class="btn btn-warning btn-sm">Invoice</a>
                                <a href="transaksi_edit.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="transaksi_hapus.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?');">Batalkan</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $d['transaksi_id']; ?>">Detail</button>


                                <!-- Modal -->
                                <div class="modal fade" id="modal-<?php echo $d['transaksi_id']; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $d['transaksi_id']; ?>" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel-<?php echo $d['transaksi_id']; ?>">Detail Transaksi</h5>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-4">
                                                    <h4 class="text-center">Daftar Cucian</h4>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Jenis Pakaian</th>
                                                                <th scope="col" style="width: 20%;">Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $pakaian = mysqli_query($conn, "SELECT * FROM pakaian WHERE pakaian_transaksi = '" . $d['transaksi_id'] . "'");

                                                            while ($p = mysqli_fetch_array($pakaian)) { ?>
                                                                <tr>
                                                                    <td><?php echo $p['pakaian_jenis']; ?></td>
                                                                    <td><?php echo $p['pakaian_jumlah']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- datatables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

<script>
    $(document).ready(function() {
        $('#table-datatable').DataTable();
    });
</script>

