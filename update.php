<!-- Header -->
<?php include 'header.php';?>

<body>
    <div class="container-fluid mt-4">
        <!-- Navbar -->
        <?php include 'title.php';?>

        <!-- Customers Table -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-primary">👤 Customers</h5>
                        <button class="btn btn-primary btn-modern" data-bs-toggle="modal"
                            data-bs-target="#customerModal">➕ Add Customer</button>
                    </div>
                    <div class="table-responsive">
                        <table id="customerTable" class="table table-striped table-bordered nowrap align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dealer & Item Tables side by side -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-primary">🏢 Dealers</h5>
                        <button class="btn btn-success btn-modern" data-bs-toggle="modal"
                            data-bs-target="#dealerModal">➕ Add Dealer</button>
                    </div>
                    <div class="table-responsive">
                        <table id="dealerTable" class="table table-striped table-bordered nowrap align-middle">
                            <thead class="table-info text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Dealer Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-primary">📦 Items</h5>
                        <button class="btn btn-success btn-modern" data-bs-toggle="modal" data-bs-target="#itemModal">➕
                            Add Item</button>
                    </div>
                    <div class="table-responsive">
                        <table id="itemTable" class="table table-striped table-bordered nowrap align-middle">
                            <thead class="table-success text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Item Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modals -->
    <!-- Customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add / Update Customer</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="customerForm">
                        <input type="hidden" id="customerIndex">
                        <div class="mb-3">
                            <label class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-modern w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Dealer Modal -->
    <div class="modal fade" id="dealerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add / Update Dealer</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="dealerForm">
                        <input type="hidden" id="dealerIndex">
                        <div class="mb-3">
                            <label class="form-label">Dealer Name</label>
                            <input type="text" class="form-control" id="dealerName" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-modern w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Item Modal -->
    <div class="modal fade" id="itemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add / Update Item</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="itemForm">
                        <input type="hidden" id="itemIndex">
                        <div class="mb-3">
                            <label class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="itemName" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-modern w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


 <!-- Footer -->
    <?php include 'footer.php';?>

    <script>
    $(document).ready(function() {
        var customerTable = $('#customerTable').DataTable({
            responsive: true,
            columnDefs: [{
                className: 'text-center',
                targets: '_all'
            }]
        });
        var dealerTable = $('#dealerTable').DataTable({
            responsive: true,
            columnDefs: [{
                className: 'text-center',
                targets: '_all'
            }]
        });
        var itemTable = $('#itemTable').DataTable({
            responsive: true,
            columnDefs: [{
                className: 'text-center',
                targets: '_all'
            }]
        });

        var customers = [],
            dealers = [],
            items = [];

        function refreshTable(data, table) {
            table.clear();
            data.forEach((row, i) => {
                table.row.add([
                    i + 1,
                    row.name,
                    `<span class="action-icon text-primary editRecord" data-index="${i}">✏️</span>
                         <span class="action-icon text-danger deleteRecord" data-index="${i}">🗑️</span>`
                ]).draw(false);
            });
        }

        // Customer CRUD
        $('#customerForm').on('submit', function(e) {
            e.preventDefault();
            var index = $('#customerIndex').val();
            var name = $('#customerName').val();
            if (index === '') customers.push({
                name
            });
            else customers[index] = {
                name
            };
            refreshTable(customers, customerTable);
            $('#customerForm')[0].reset();
            $('#customerIndex').val('');
            $('#customerModal').modal('hide');
        });
        $('#customerTable').on('click', '.editRecord', function() {
            var i = $(this).data('index');
            $('#customerIndex').val(i);
            $('#customerName').val(customers[i].name);
            $('#customerModal').modal('show');
        });
        $('#customerTable').on('click', '.deleteRecord', function() {
            if (confirm('Delete?')) {
                customers.splice($(this).data('index'), 1);
                refreshTable(customers, customerTable);
            }
        });

        // Dealer CRUD
        $('#dealerForm').on('submit', function(e) {
            e.preventDefault();
            var index = $('#dealerIndex').val();
            var name = $('#dealerName').val();
            if (index === '') dealers.push({
                name
            });
            else dealers[index] = {
                name
            };
            refreshTable(dealers, dealerTable);
            $('#dealerForm')[0].reset();
            $('#dealerIndex').val('');
            $('#dealerModal').modal('hide');
        });
        $('#dealerTable').on('click', '.editRecord', function() {
            var i = $(this).data('index');
            $('#dealerIndex').val(i);
            $('#dealerName').val(dealers[i].name);
            $('#dealerModal').modal('show');
        });
        $('#dealerTable').on('click', '.deleteRecord', function() {
            if (confirm('Delete?')) {
                dealers.splice($(this).data('index'), 1);
                refreshTable(dealers, dealerTable);
            }
        });

        // Item CRUD
        $('#itemForm').on('submit', function(e) {
            e.preventDefault();
            var index = $('#itemIndex').val();
            var name = $('#itemName').val();
            if (index === '') items.push({
                name
            });
            else items[index] = {
                name
            };
            refreshTable(items, itemTable);
            $('#itemForm')[0].reset();
            $('#itemIndex').val('');
            $('#itemModal').modal('hide');
        });
        $('#itemTable').on('click', '.editRecord', function() {
            var i = $(this).data('index');
            $('#itemIndex').val(i);
            $('#itemName').val(items[i].name);
            $('#itemModal').modal('show');
        });
        $('#itemTable').on('click', '.deleteRecord', function() {
            if (confirm('Delete?')) {
                items.splice($(this).data('index'), 1);
                refreshTable(items, itemTable);
            }
        });
    });
    </script>
</body>

</html>
