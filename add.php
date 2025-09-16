<!-- Header -->
<?php include 'header.php';?>

<body class="p-4">

    <div class="container">

        <!-- Navbar -->
        <?php include 'title.php';?>

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

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Item Details</span>
                    <button type="button" class="btn btn-success btn-sm" id="addRow">+ Add Item</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover align-middle" id="itemsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Item</th>
                                <th style="width: 120px;">Quantity</th>
                                <th style="width: 300px;">Serial Nos</th>
                                <th style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <select name="item_id[]" class="form-select" required>
                                            <option value="">-- Select Item --</option>
                                            <!-- Populate items from backend -->
                                        </select>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#itemModal">+ Add</button>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" class="form-control quantity" min="1"
                                        value="1" required>
                                </td>
                                <td>
                                    <div class="serial-container">
                                        <input type="text" name="serial_no[0][]" class="form-control mb-1"
                                            placeholder="Serial No 1">
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm removeRow">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Customer Section -->
            <div class="card mb-4">
                <div class="card-header">👤 Customer Details</div>
                <div class="card-body">
                    <div class="input-group">
                        <select name="customer_id" id="customer_id" class="form-select" required>
                            <option value="">-- Select Customer --</option>
                        </select>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#customerModal">+ Add</button>
                    </div>
                </div>
            </div>

            <!-- Warranty -->
            <div class="card mb-4">
                <div class="card-header">🛡️ Warranty Details</div>
                <div class="card-body row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Warranty Period</label>
                        <select name="warranty_period" id="warranty_period" class="form-select" required>
                            <!-- <option value="">-- Select --</option> -->
                            <option value="2">2 Years</option>
                            <option value="5">5 Years</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Warranty For</label>
                        <select name="warranty_period" id="warranty_period" class="form-select" required>
                            <!-- <option value="">-- Select --</option> -->
                            <option value="TANK">Tank </option>
                            <option value="HEATING">Heating element anode electrical parts</option>
                        </select>
                    </div>
                    <div class="col-md-4">
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
                    <input type="text" id="name" class="form-control mb-2" placeholder="Full Name">
                    <label class="form-label">Phone</label>
                    <input type="text" id="phone" class="form-control mb-2" placeholder="Phone Number">
                    <label class="form-label">Address</label>
                    <input type="text" id="address" class="form-control" placeholder="Address">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveCustomer"
                        data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php';?>


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
    document.addEventListener("DOMContentLoaded", function() {
        const itemsTable = document.querySelector("#itemsTable tbody");
        const addRowBtn = document.querySelector("#addRow");

        // Add new row
        addRowBtn.addEventListener("click", function() {
            const rowCount = itemsTable.querySelectorAll("tr").length;
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
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
        <input type="number" name="quantity[]" class="form-control quantity" min="1" value="1" required>
      </td>
      <td>
        <div class="serial-container">
          <input type="text" name="serial_no[${rowCount}][]" class="form-control mb-1" placeholder="Serial No 1">
        </div>
      </td>
      <td>
        <button type="button" class="btn btn-danger btn-sm removeRow">Remove</button>
      </td>
    `;
            itemsTable.appendChild(newRow);
        });

        // Remove row
        itemsTable.addEventListener("click", function(e) {
            if (e.target.classList.contains("removeRow")) {
                e.target.closest("tr").remove();
            }
        });

        // Update serial inputs based on quantity
        itemsTable.addEventListener("input", function(e) {
            if (e.target.classList.contains("quantity")) {
                const qty = parseInt(e.target.value) || 1;
                const row = e.target.closest("tr");
                const serialContainer = row.querySelector(".serial-container");

                // Clear existing
                serialContainer.innerHTML = "";

                // Row index for unique names
                const rowIndex = Array.from(itemsTable.querySelectorAll("tr")).indexOf(row);

                // Generate inputs
                for (let i = 0; i < qty; i++) {
                    const input = document.createElement("input");
                    input.type = "text";
                    input.name = `serial_no[${rowIndex}][]`;
                    input.classList.add("form-control", "mb-1");
                    input.placeholder = `Serial No ${i + 1}`;
                    serialContainer.appendChild(input);
                }
            }
        });
    });
    // Customer
    document.getElementById("saveCustomer").addEventListener("click", function() {
        let name = document.getElementById("newCustomerName").value.trim();
        let phone = document.getElementById("newCustomerPhone").value.trim();
        let address = document.getElementById("newCustomerAddress").value.trim();
        if (name) {
            let sel = document.getElementById("customer_id");
            let text = name + (phone ? " (" + phone + ")" : "");
            let opt = new Option(text, name + "|" + phone + "|" + address, true, true);
            sel.add(opt);
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
