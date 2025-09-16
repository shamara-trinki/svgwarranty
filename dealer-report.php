<!-- Header -->
<?php include 'header.php';?>

<body>

    <div class="container-fluid mt-4">
        <!-- Navbar -->
        <?php include 'title.php';?>

        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-4 mb-4 border-0" style="border-radius: 15px; background: #ffffff;">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                        <h4 class="mb-2 mb-md-0 fw-bold text-primary">Dealer Report</h4>
                    </div>

                    <!-- Filter Form -->
                    <form id="dealerReportForm" class="row g-3 align-items-end">

                        <!-- Dealer Select -->
                        <div class="col-md-3 col-sm-6">
                            <label for="dealerSelect" class="form-label fw-semibold">Select Dealer</label>
                            <select class="form-select shadow-sm" id="dealerSelect" required>
                                <option value="">Select Dealer</option>
                                <option value="Dealer1">Dealer 1</option>
                                <option value="Dealer2">Dealer 2</option>
                            </select>
                        </div>

                        <!-- Start Month -->
                        <div class="col-md-3 col-sm-6">
                            <label for="startMonth" class="form-label fw-semibold">Start Month</label>
                            <input type="month" class="form-control shadow-sm" id="startMonth" required>
                        </div>

                        <!-- End Month -->
                        <div class="col-md-3 col-sm-6">
                            <label for="endMonth" class="form-label fw-semibold">End Month</label>
                            <input type="month" class="form-control shadow-sm" id="endMonth" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-3 col-sm-6 d-grid">
                            <button type="submit" class="btn btn-primary btn-modern fw-semibold shadow-sm">
                                Generate Report
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>



        <!-- Table -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-3">
                    <div class="table-responsive">
                        <table id="dealerReportTable" class="table table-striped table-bordered nowrap align-middle"
                            style="width:100%">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Invoice No</th>
                                    <th>Invoice Date</th>
                                    <th>Dealer</th>
                                    <th>Customer</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Serial No</th>
                                    <th>Warranty Expiry</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dynamic data -->
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
        // Initialize DataTable
        var table = $('#dealerReportTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            columnDefs: [{
                className: "text-center",
                targets: "_all"
            }]
        });

        // Handle form submission
        $('#dealerReportForm').on('submit', function(e) {
            e.preventDefault();
            var dealer = $('#dealerSelect').val();
            var startMonth = $('#startMonth').val();
            var endMonth = $('#endMonth').val();

            if (!dealer || !startMonth || !endMonth) return;

            // Example: clear table
            table.clear().draw();

            // Dummy data (replace with AJAX fetch from backend)
            var dummyData = [{
                    invoice: 'INV001',
                    date: '2025-02-05',
                    dealer: dealer,
                    customer: 'Customer A',
                    item: 'Item 1',
                    qty: 5,
                    serial: 'S123',
                    warranty: '2025-12-01'
                },
                {
                    invoice: 'INV002',
                    date: '2025-03-12',
                    dealer: dealer,
                    customer: 'Customer B',
                    item: 'Item 2',
                    qty: 3,
                    serial: 'S124',
                    warranty: '2025-12-10'
                },
                {
                    invoice: 'INV003',
                    date: '2025-04-20',
                    dealer: dealer,
                    customer: 'Customer C',
                    item: 'Item 3',
                    qty: 2,
                    serial: 'S125',
                    warranty: '2025-12-15'
                }
            ];

            // Filter data between startMonth and endMonth
            var filtered = dummyData.filter(row => {
                return row.date >= startMonth + '-01' && row.date <= endMonth + '-31';
            });

            filtered.forEach((row, index) => {
                table.row.add([
                    index + 1,
                    row.invoice,
                    row.date,
                    row.dealer,
                    row.customer,
                    row.item,
                    row.qty,
                    row.serial,
                    row.warranty
                ]).draw(false);
            });
        });
    });
    </script>

</body>

</html>
