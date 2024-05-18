<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Master Data Form</h1>

    <form>
        <div class="form-group">
            <label for="id_barang">ID Barang:</label>
            <input type="number" class="form-control" id="id_barang" name="id_barang" required>
        </div>

        <div class="form-group">
            <label for="kode_barang">Kode Barang:</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" pattern="[a-zA-Z0-9]{1,20}"
                title="Max 20 characters">
        </div>

        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" pattern="[a-zA-Z0-9\s]{1,50}"
                title="Max 50 characters">
        </div>

        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang:</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
        </div>

        <div class="form-group">
            <label for="satuan_barang">Satuan Barang:</label>
            <select class="form-control" id="satuan_barang" name="satuan_barang">
                <option value="kg">Kg</option>
                <option value="pcs">Pcs</option>
                <option value="liter">Liter</option>
                <option value="meter">Meter</option>
            </select>
        </div>

        <div class="form-group">
            <label for="harga_ beli">Harga Beli:</label>
            <input type="text" class="form-control" id="harga_ beli" name="harga_beli" required>
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