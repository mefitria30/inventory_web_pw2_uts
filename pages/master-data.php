<?php
ob_start();

// Query untuk mengambil data dari tabel Barang
    $sql = "SELECT * FROM master_data";
    $result = $conn->query($sql);
    
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = "";
    }

// delete barang
    if($action == 'delete'){
        $id_barang     = $_GET['id_barang'];

        $sqlDelete = "delete from master_data where id_barang = '$id_barang'";
        $startDelete = mysqli_query($conn, $sqlDelete);

        header("location:".BASE_URL."index.php?page=master-data");
        
    }   
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Barang</h6>
                <a href="<?php echo BASE_URL."index.php?page=master-data-form";?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Add Master Data</a>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Satuan Barang</th>
                        <th>Harga Beli</th>
                        <th>Status Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {

                        // Perbarui status barang menjadi "Not Available" jika jumlah barang = 0
                        $status_barang = ($row["jumlah_barang"] == 0 ) ?  'Out of Stock'  : ($row["status_barang"] == 1 ? 'Available' : 'Not Available');
                        
                    ?>
                    <tr>
                        <td><?php echo $no++; ?>.</td>
                        <td><?php echo $row["kode_barang"]?></td>
                        <td><?php echo $row["nama_barang"]?></td>
                        <td><?php echo $row["jumlah_barang"]?></td>
                        <td><?php echo $row["satuan_barang"]?></td>
                        <td><?php echo $row["harga_beli"]?></td>
                        <td><?php echo $status_barang?></td>
                        <td>
                            <a href="<?php echo BASE_URL."index.php?page=master-data-form&action=edit&id_barang=".$row["id_barang"];?>"
                                class="badge badge-info">Edit</a>

                            <a href="<?php echo BASE_URL."index.php?page=master-data&action=delete&id_barang=".$row["id_barang"];?>"
                                class="badge badge-danger" onclick="
                                return confirm('Are you want to delete this data?');">Hapus</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>