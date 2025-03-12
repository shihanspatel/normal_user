<?php
include('index.php');
?>

<style>
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
    }

    .btn-sm {
        height: 48px;
        width: 110px;
        padding: 8px;
        border-radius: 10px;
    }

    .btn-outline-success {
        border-color: #28a745;
        color: #28a745;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }

    .btn-outline-warning {
        border-color: #ffc107;
        color: #ffc107;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: white;
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        /* Adds space between buttons */
        justify-content: center;
        /* Optional: centers the buttons */
    }

    /* Alternating row colors */
    .table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
        /* Light gray for odd rows */
    }

    .table-striped tbody tr:nth-child(even) {
        background-color: #ffffff;
        /* White for even rows */
    }
</style>

<div class="col-xxl-9 p-4" style="margin: auto;">
    <h1>Offer's Management</h1>
    <button id="addProductBtn" class="btn btn-outline-success btn-sm mb-3">Add Product</button>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Discount (%)</th>
                <th>Final Price</th>
                <th>Stock</th>
                <th>Actions</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="product-table-body"></tbody>
    </table>
</div>

<!-- Edit Product Modal -->
<div class="modal"  id="editProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="editProductDescription" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editProductPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductDiscount" class="form-label">Discount (%)</label>
                        <input type="number" class="form-control" id="editProductDiscount" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="editProductStock" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const products = [{
            name: 'Laptop',
            description: 'High-performance laptop',
            price: 1000,
            discount: 10,
            stock: 50,
            status: 'Active'
        },
        {
            name: 'Smartphone',
            description: 'Latest model smartphone',
            price: 700,
            discount: 5,
            stock: 100,
            status: 'Active'
        },
        {
            name: 'Tablet',
            description: 'Lightweight and portable tablet',
            price: 500,
            discount: 8,
            stock: 75,
            status: 'Active'
        },
         {
            name: 'Tablet',
            description: 'Lightweight and portable tablet',
            price: 500,
            discount: 8,
            stock: 75,
            status: 'Active'
        },
         {
            name: 'Tablet',
            description: 'Lightweight and portable tablet',
            price: 500,
            discount: 8,
            stock: 75,
            status: 'Active'
        } ,
        {
            name: 'Tablet',
            description: 'Lightweight and portable tablet',
            price: 500,
            discount: 8,
            stock: 75,
            status: 'Active'
        } 
    ];

    let currentEditingIndex = null;

    function renderProducts() {
        const tableBody = document.getElementById('product-table-body');
        tableBody.innerHTML = '';
        products.forEach((product, index) => {
            const finalPrice = product.price - (product.price * (product.discount / 100));
            const statusClass = product.status === 'Active' ? 'text-success' : 'text-danger';
            const buttonClass = product.status === 'Active' ? 'btn-outline-danger' : 'btn-outline-success';
            tableBody.innerHTML += `
                <tr>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>$${product.price}</td>
                    <td>${product.discount}%</td>
                    <td>$${finalPrice.toFixed(2)}</td>
                    <td>${product.stock}</td>
                    <td class="action-buttons">
                        <button class="btn btn-outline-warning btn-sm" onclick="editProduct(${index})">Edit</button>
                        <button class="btn ${buttonClass} btn-sm" onclick="toggleStatus(${index})">${product.status === 'Active' ? 'Deactivate' : 'Activate'}</button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteProduct(${index})">Delete</button>
                    </td>
                    <td id="status-${index}" class="${statusClass} fw-bold">${product.status}</td>
                </tr>`;
        });
    }

    function toggleStatus(index) {
        products[index].status = products[index].status === 'Active' ? 'Inactive' : 'Active';
        renderProducts();
    }

    function deleteProduct(index) {
        if (confirm('Are you sure you want to delete this product?')) {
            products.splice(index, 1);
            renderProducts();
        }
    }

    // Edit Product function
    function editProduct(index) {
        const product = products[index];
        currentEditingIndex = index; // Store the index of the product being edited
        document.getElementById('editProductName').value = product.name;
        document.getElementById('editProductDescription').value = product.description;
        document.getElementById('editProductPrice').value = product.price;
        document.getElementById('editProductDiscount').value = product.discount;
        document.getElementById('editProductStock').value = product.stock;

        const myModal = new bootstrap.Modal(document.getElementById('editProductModal'));
        myModal.show();
    }

    // Save edited product
    document.getElementById('editProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const updatedProduct = {
            name: document.getElementById('editProductName').value,
            description: document.getElementById('editProductDescription').value,
            price: parseFloat(document.getElementById('editProductPrice').value),
            discount: parseFloat(document.getElementById('editProductDiscount').value),
            stock: parseInt(document.getElementById('editProductStock').value),
            status: 'Active'
        };

        // Update the product in the array
        products[currentEditingIndex] = updatedProduct;
        renderProducts();

        // Close the modal after saving
        const myModal = bootstrap.Modal.getInstance(document.getElementById('editProductModal'));
        myModal.hide();
    });

    document.getElementById('addProductBtn').addEventListener('click', function() {
        alert('Add Product Modal will open here.');
    });

    renderProducts();
</script>