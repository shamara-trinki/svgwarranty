<!-- Header -->
<?php include 'header.php';?>

<body>

    <div class="container-fluid mt-4">
        <!-- Navbar -->
        <?php include 'title.php';?>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Header -->
                        <h4 class="mb-0 fw-semibold">📋 Warranty Details</h4>

                        <!-- Buttons Group -->
                        <div class="d-flex gap-2">
                            <a href="add.php" class="btn btn-primary btn-modern">
                                ➕ Add New Warranty
                            </a>
                            <a href="update.php" class="btn btn-primary btn-modern"><i class="fa fa-file"></i>
                                UpdateInfo
                            </a>
                            <a href="dealer-report.php" class="btn btn-primary btn-modern"><i class="fa fa-user"
                                    aria-hidden="true"></i> Dealer Report

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Table -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-3">
                    <div class="table-responsive">
                        <table id="warrantyTable" class="table table-striped table-bordered nowrap align-middle"
                            style="width:100%">
                            <thead class="table-white
                             text-center">
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
                            <tbody>
                                <!-- Data will be loaded dynamically via DataTables AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include 'footer.php';?>

    <script>
    $(document).ready(function() {
        $('#warrantyTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            columnDefs: [{
                className: "text-center",
                targets: "_all"
            }]
        });
    });
    </script>

</body>

</html>