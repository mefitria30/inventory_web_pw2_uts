<?php
// Buat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel Barang
$sql = "SELECT * FROM master_data";
$result = $conn->query($sql);

// Proses pencarian
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM master_data WHERE nama_barang LIKE '%$keyword%' OR id_barang = '$keyword' OR kode_barang = '$keyword'";
    $result = $conn->query($sql);
} else {
    // Jika tidak ada pencarian, tampilkan semua data barang
    $sql = "SELECT * FROM master_data";
    $result = $conn->query($sql);
}
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Master</h1>
<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                        <?php if (isset($_SESSION['notif'])) : ?>
                            <div class="notif"><?php echo $_SESSION['notif']; ?></div>
                            <?php unset($_SESSION['notif']); // Hapus notifikasi setelah ditampilkan 
                            ?>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <input type="text" name="keyword" placeholder="Cari berdasarkan nama, ID, atau kode barang">
                            <button type="submit" name="search">Cari</button>
                            <div class="table-responsive">
                                <br>
                                <?php
                                if ($result->num_rows > 0) {
                                    echo "<table>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Status Barang</th>
                                    <th>Aksi</th>
                                </tr>";
                                    while ($row = $result->fetch_assoc()) {
                                        // Perbarui status barang menjadi "Not Available" jika jumlah barang = 0
                                        $status_barang = ($row["jumlah_barang"] == 0) ? "Not Available" : ($row["status_barang"] ? 'Available' : 'Not Available');
                                        echo "<tr>
                                <td>" . $row["id_barang"] . "</td>
                                <td>" . $row["kode_barang"] . "</td>
                                <td>" . $row["nama_barang"] . "</td>
                                <td>" . $row["jumlah_barang"] . "</td>
                                <td>" . $row["satuan_barang"] . "</td>
                                <td>" . $row["harga_beli"] . "</td>
                                <td>" . $status_barang . "</td>
                                <td>
                                    <button onclick='hapusBarang(" . $row["id_barang"] . ")'>Hapus</button>
                                    <button onclick='editBarang(" . $row["id_barang"] . ")'>Edit</button>
                                </td>
                            </tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "Tidak ada data yang ditemukan.";
                                }
                                ?>
                                <br>
                            </div>
                        </div>
                    </div>

                </div>
</div>
