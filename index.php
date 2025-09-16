<?php
$mysqli = new mysqli('localhost', 'root', 'busy@123', ' warrenty23');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully!";

?>


<!-- Header -->
<?php include 'header.php';?>


<body>

    <div class="container-fluid py-4">
        <!-- Navbar -->
        <?php include 'title.php';?>

        <div class="row">

            <div class="col-xl-12">


                <div class="row g-4">
                    <!-- Search Form -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label class="form-label fw-semibold">Tracking Serial No.</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input id="tracking_no" type="text" name="tracking_no" class="form-control"
                                        placeholder="Enter Serial No..." required>
                                </div>
                                <button type="button" class="btn btn-primary w-100 rounded-pill" id="SearchTrackingNo">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Results Table -->
                    <div class="col-md-9">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice No</th>
                                                <th>Invoice Date</th>
                                                <th>Dealer</th>
                                                <th>Customer</th>
                                                <th>Item</th>
                                                <th>Warranty Period</th>
                                                <th>Warranty Expiry</th>
                                                <th>Status</th>
                                                <th>Qty</th>
                                                <th>Serial No</th>
                                            </tr>
                                        </thead>
                                        <tbody id="warrantyTableBody" class="text-center text-muted">
                                            <tr>
                                                <td colspan="11"> Enter a serial number and click Search...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php';?>


</body>

</html>
