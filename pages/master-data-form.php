<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = "";
    }
    
    if($action == 'edit') {
        $id_barang         = $_GET['id_barang'];
        $sqlUpdate  = "select * from master_data where id_barang = '$id_barang'";

        $startUpdate = mysqli_query($conn, $sqlUpdate);
        $getData = mysqli_fetch_array($startUpdate);

        if ($getData !== null) {
            $id_barang            = $getData['id_barang'];
            $kode_barang           = $getData['kode_barang'];
            $nama_barang         = $getData['nama_barang'];
            $jumlah_barang       = $getData['jumlah_barang'];
            $satuan_barang       = $getData['satuan_barang'];
            $harga_beli       = $getData['harga_beli'];
        } else {
            $failed     = 'Data not found';
        }
    }
?>

<div class="container-fluid">

    <!-- Page Heading -->


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800">Master Data Form</h1>
        <a href="<?php echo BASE_URL."index.php?page=master-data";?>"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i>
            Back</a>
    </div>

    <form>
        <div class="form-group">
            <label for="id_barang">ID Barang:</label>
            <input type="number" class="form-control" id="id_barang" name="id_barang" value="<?php echo $id_barang ?>"
                required>
        </div>

        <div class="form-group">
            <label for="kode_barang">Kode Barang:</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" pattern="[a-zA-Z0-9]{1,20}"
                value="<?php echo $kode_barang ?>" title="Max 20 characters">
        </div>

        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                value="<?php echo $nama_barang ?>" pattern="[a-zA-Z0-9\s]{1,50}" title="Max 50 characters">
        </div>

        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang:</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang"
                value="<?php echo $jumlah_barang ?>" required>
        </div>

        <div class="form-group">
            <label for="satuan_barang">Satuan Barang:</label>
            <select class="form-control" id="satuan_barang" name="satuan_barang">
                <option value="">- Pilih Satuan Barang -</option>
                <option value="kg" <?php if($satuan_barang == "kg") echo "selected"; ?>>Kg</option>
                <option value="pcs" <?php if($satuan_barang == "pcs") echo "selected"; ?>>Pcs</option>
                <option value="liter" <?php if($satuan_barang == "liter") echo "selected"; ?>>Liter</option>
                <option value="meter" <?php if($satuan_barang == "meter") echo "selected"; ?>>Meter</option>
                <option value="S" <?php if($satuan_barang == "S") echo "selected"; ?>>S</option>
                <option value="M" <?php if($satuan_barang == "M") echo "selected"; ?>>M</option>
                <option value="L" <?php if($satuan_barang == "L") echo "selected"; ?>>L</option>
                <option value="XL" <?php if($satuan_barang == "XL") echo "selected"; ?>>XL</option>
                <option value="XS" <?php if($satuan_barang == "XS") echo "selected"; ?>>XS</option>
                <option value="3XL" <?php if($satuan_barang == "3XL") echo "selected"; ?>>3XL</option>
            </select>
        </div>

        <div class="form-group">
            <label for="harga_beli">Harga Beli:</label>
            <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $harga_beli ?>"
                required>
        </div>

        <div class="form-group">
            <label for="status_barang">Status Barang:</label>
            <select class="form-control" id="status_barang" name="status_barang">
                <option value="tersedia">Tersedia</option>
                <option value="tidak-tersedia">Tidak Tersedia</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" value="Simpan">
    </form>

</div>