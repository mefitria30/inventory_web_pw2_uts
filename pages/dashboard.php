            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Goods Total in Stocks</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $sql = "SELECT sum(jumlah_barang) as TotalBarang FROM master_data";
                                            $result = $conn->query($sql);

                                            while ($row = $result->fetch_assoc()) {
                                                echo $row["TotalBarang"];
                                            }
                                        ?>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-database fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>