<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Warranty Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: linear-gradient(135deg, #f0f4f8, #e9ecef);
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-header {
        background: linear-gradient(90deg, #0a246b, #1c3f8c);
        padding: 1rem 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .main-header img {
        height: 40px;
    }

    .main-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
    }

    .main-header h2 {
        font-size: 1.1rem;
        font-weight: 500;
        opacity: 0.9;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
    }

    .card-header {
        background: #f8f9fb;
        font-weight: 600;
        font-size: 1rem;
        border-bottom: 2px solid #dee2e6;
        border-radius: 12px 12px 0 0 !important;
    }

    .form-label {
        font-weight: 500;
    }

    .btn-primary {
        background: linear-gradient(90deg, #0a246b, #1c3f8c);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #092056, #152f6b);
    }

    .btn-success {
        background: linear-gradient(90deg, #198754, #28a745);
        border: none;
    }

    .btn-success:hover {
        background: linear-gradient(90deg, #146c43, #218838);
    }

    .table th {
        background: #f1f3f5;
    }

    .modal-header {
        background: #f8f9fb;
        font-weight: 600;
    }

    .modal-content {
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }
    </style>
</head>

<body class="p-4">

    <div class="container">

        <!-- Header -->
        <div class="main-header d-flex justify-content-between align-items-center">
            <img src="images/full-rain-logo.png" alt="Logo">
            <div class="text-center flex-grow-1">
                <h1>Woo Sun Eco Homes (Pvt) Ltd</h1>
                <h2>Warranty Tracker System</h2>
            </div>
        </div>

        <!-- Form -->
        <form action="save_warranty.php" method="POST" class="needs-validation" novalidate>

            <!-- Invoice Details -->
            <div class="card mb-4">
                <div class="card-header">📑 Invoice Details</div>
                <div class="card-body row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Invoice No</label>
                        <input type="text" name="invoice_no" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Invoice Date</label>
                        <input type="date" name="invoice_date" id="invoice_date" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Dealer</label>
                        <div class="input-group">
                            <select name="dealer_id" id="dealer_id" class="form-select" required>
                                <option value="">-- Select Dealer --</option>
                            </select>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#dealerModal">+ Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items + Customers -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>📦 Items & Customers</span>
                    <button type="button" id="addRow" class="btn btn-sm btn-success">+ Add Row</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="itemsTable">
                        <thead>
                            <tr>
                                <th style="width:40%">Item</th>
                                <th style="width:40%">Customer</th>
                                <th style="width:20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <select name="item_id[]" class="form-select" required>
                                            <option value="">-- Select Item --</option>
                                        </select>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#itemModal">+ Add</button>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <select name="customer_id[]" id="customer_id" class="form-select" required>
                                            <option value="">-- Select Customer --</option>
                                        </select>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#customerModal">+ Add</button>
                                    </div>
                                </td>
                                <td><button type="button" class="btn btn-danger btn-sm removeRow">Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Warranty -->
            <div class="card mb-4">
                <div class="card-header">🛡️ Warranty Details</div>
                <div class="card-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Warranty Period</label>
                        <select name="warranty_period" id="warranty_period" class="form-select" required>
                            <option value="">-- Select --</option>
                            <option value="2">2 Years</option>
                            <option value="5">5 Years</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Warranty Expiry Date</label>
                        <input type="date" name="warranty_expiry" id="warranty_expiry" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-5">💾 Save Warranty</button>
            </div>
        </form>
    </div>

    <!-- Dealer Modal -->
    <div class="modal fade" id="dealerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Dealer</h5>
                </div>
                <div class="modal-body">
                    <label class="form-label">Dealer Name</label>
                    <input type="text" id="newDealer" class="form-control" placeholder="Enter dealer name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveDealer" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Item Modal -->
    <div class="modal fade" id="itemModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Item</h5>
                </div>
                <div class="modal-body">
                    <label class="form-label">Item Name</label>
                    <input type="text" id="newItem" class="form-control" placeholder="Enter item name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveItem" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Customer</h5>
                </div>
                <div class="modal-body">
                    <label class="form-label">Customer Name</label>
                    <input type="text" id="newCustomerName" class="form-control mb-2" placeholder="Full Name">
                    <label class="form-label">Phone</label>
                    <input type="text" id="newCustomerPhone" class="form-control mb-2" placeholder="Phone Number">
                    <label class="form-label">Address</label>
                    <input type="text" id="newCustomerAddress" class="form-control" placeholder="Address">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveCustomer"
                        data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Dealer
    document.getElementById("saveDealer").addEventListener("click", function() {
        let name = document.getElementById("newDealer").value.trim();
        if (name) {
            let sel = document.getElementById("dealer_id");
            let opt = new Option(name, name, true, true);
            sel.add(opt);
            document.getElementById("newDealer").value = "";
        }
    });

    // Item
    document.getElementById("saveItem").addEventListener("click", function() {
        let name = document.getElementById("newItem").value.trim();
        if (name) {
            document.querySelectorAll("select[name='item_id[]']").forEach(sel => {
                let opt = new Option(name, name, true, true);
                sel.add(opt);
            });
            document.getElementById("newItem").value = "";
        }
    });

    // Customer
    document.getElementById("saveCustomer").addEventListener("click", function() {
        let name = document.getElementById("newCustomerName").value.trim();
        let phone = document.getElementById("newCustomerPhone").value.trim();
        let address = document.getElementById("newCustomerAddress").value.trim();
        if (name) {
            document.querySelectorAll("select[name='customer_id[]']").forEach(sel => {
                let text = name + (phone ? " (" + phone + ")" : "");
                let opt = new Option(text, name + "|" + phone + "|" + address, true, true);
                sel.add(opt);
            });
            document.getElementById("newCustomerName").value = "";
            document.getElementById("newCustomerPhone").value = "";
            document.getElementById("newCustomerAddress").value = "";
        }
    });

    // Add/remove item rows
    document.getElementById("addRow").addEventListener("click", function() {
        let table = document.getElementById("itemsTable").getElementsByTagName("tbody")[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
        <td>
          <div class="input-group">
            <select name="item_id[]" class="form-select" required>
              <option value="">-- Select Item --</option>
            </select>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#itemModal">+ Add</button>
          </div>
        </td>
        <td>
          <div class="input-group">
            <select name="customer_id[]" class="form-select" required>
              <option value="">-- Select Customer --</option>
            </select>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#customerModal">+ Add</button>
          </div>
        </td>
        <td><button type="button" class="btn btn-danger btn-sm removeRow">Remove</button></td>`;
    });

    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("removeRow")) {
            e.target.closest("tr").remove();
        }
    });

    // Auto expiry date
    document.getElementById("warranty_period").addEventListener("change", function() {
        let invoiceDate = document.getElementById("invoice_date").value;
        let years = parseInt(this.value);
        if (invoiceDate && years) {
            let date = new Date(invoiceDate);
            date.setFullYear(date.getFullYear() + years);
            document.getElementById("warranty_expiry").value = date.toISOString().split("T")[0];
        }
    });
    </script>

</body>

</html>