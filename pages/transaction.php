<?php

if(isset($_POST['submit'])) {
    // Tangkap data dari form transaksi
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $jenis_transaksi = $_POST['jenis_transaksi'];

    // Query untuk memeriksa apakah barang ada dalam tabel
    $sql_check_barang = "
        SELECT * FROM master_data 
        WHERE 
            id_barang = '$id_barang'";

    $result_check_barang = $conn->query($sql_check_barang);

    if ($result_check_barang->num_rows == 0) {
        // Jika barang tidak ditemukan, set notifikasi error dan arahkan kembali ke form transaksi

        header("location:".BASE_URL."index.php?page=transaction&act=0&rule=find");
    } else {
        // Query untuk memperbarui jumlah barang berdasarkan jenis transaksi
        
        if ($jenis_transaksi === 'in') {
            
            // Transaksi masuk: Tambahkan jumlah barang ke dalam tabel barang
            
            $sql = "
                UPDATE master_data SET 
                    jumlah_barang = jumlah_barang + $jumlah 
                    WHERE id_barang = '$id_barang'";

            if ($conn->query($sql) === TRUE) {
                // Jika transaksi berhasil ditambahkan, atur notifikasi sukses dan arahkan ke halaman review
                header("location:".BASE_URL."index.php?page=master-data&act=1&rule=transaction");
            } else {
                // Jika terjadi kesalahan, atur notifikasi error dan arahkan kembali ke form transaksi
                header("location:".BASE_URL."index.php?page=transaction&act=0&rule=transaction");
            }

        }  elseif ($jenis_transaksi === 'out') {
            // Transaksi keluar: Kurangi jumlah barang dari tabel barang
            // Periksa apakah jumlah barang mencukupi untuk transaksi

            $sql_check_stock = "
                SELECT jumlah_barang FROM master_data 
                WHERE id_barang = '$id_barang'";
            
            $result_check_stock = $conn->query($sql_check_stock);

            if ($result_check_stock->num_rows > 0) {
                $row = $result_check_stock->fetch_assoc();
                $stock = $row['jumlah_barang'];

                if ($stock < $jumlah) {
                    // Jika jumlah barang tidak cukup, atur notifikasi dan arahkan kembali ke form transaksi

                    header("location:".BASE_URL."index.php?page=transaction&act=0&rule=check");
                    exit();
                } else {

                    // Jika jumlah barang cukup, kurangi jumlah barang dari tabel barang

                    $sql = "UPDATE master_data SET jumlah_barang = jumlah_barang - $jumlah WHERE id_barang = '$id_barang'";

                    if ($conn->query($sql) === TRUE) {
                        // Jika transaksi berhasil ditambahkan, atur notifikasi sukses dan arahkan ke halaman review
                        header("location:".BASE_URL."index.php?page=master-data&act=1&rule=transaction");
                    } else {
                        // Jika terjadi kesalahan, atur notifikasi error dan arahkan kembali ke form transaksi
                        header("location:".BASE_URL."index.php?page=transaction&act=0&rule=transaction");
                    }
                }
            } else {
                // Jika terjadi kesalahan, atur notifikasi error dan arahkan kembali ke form transaksi
                header("location:".BASE_URL."index.php?page=transaction&act=0&rule=transaction");
            }
        }
    }
}
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Transaction</h1>
    <?php if ( isset($_GET['act'])){ ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?php if ($_GET['act'] == 1) {?>
        Successfully <?php echo $_GET['rule']?> data
        <?php } else { ?>
        Failed <?php echo $_GET['rule']?> data
        <?php } ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="id_barang">Nama Barang:</label>
            <select class="form-control" id="id_barang" name="id_barang" required>
                <option value="">- Pilih Barang -</option>
                <?php 
                    $sql = "select id_barang, kode_barang, nama_barang from master_data";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row["id_barang"]?>">[<?php echo $row["kode_barang"]?>]
                    <?php echo $row["nama_barang"]?></option>
                <?php }?>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>

        <div class="form-group">
            <label for="jenis_transaksi">Jenis Transaksi:</label>
            <select class="form-control" id="jenis_transaksi" name="jenis_transaksi" required>
                <option value="in">Transaksi In</option>
                <option value="out">Transaksi Out</option>
            </select>
        </div>

        <button type="submit" name="submit" value="submit" class="btn btn-primary">Tambah Transaksi</button>
    </form>
</div>

<script>
// Periksa setiap kali nilai di salah satu input berubah
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('input', function() {
        // Cek apakah ID Barang, Nama Barang, dan Kode Barang kosong atau tidak
        const idBarang = document.getElementById('id_barang').value;

        // Jika salah satu di antara ketiganya terisi, atur nilai required ke false
        if (idBarang) {
            document.getElementById('id_barang').removeAttribute('required');
        } else {
            // Jika ketiganya kosong, atur nilai required ke true untuk mencegah pengiriman formulir
            document.getElementById('id_barang').setAttribute('required', true);
        }
    });
});
</script>