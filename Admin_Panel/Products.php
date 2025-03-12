<?php
include('index.php');
?>
<style>
    .size {
        width: 25%;

    }
</style>
<div class="col-xxl-9 p-1">
    <div class="card text-center shadow-sm">
        <h2 class="mb-4 text-center">Product Management</h2>

        <!-- Add Product Button -->
        <!-- Product List Table for Shoes -->
        <div class="card p-4">
            <button class="btn btn-primary mb-3 size" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus"></i> Add Product
            </button>
            <h4>Product</h4>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="shoesProductTableBody">

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <input type="hidden" id="editIndex" name="editIndex">

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="productDesc" name="productDesc" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Price ($)</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-control" id="productCategory" name="productCategory">
                                    <option value="">-- Select Category --</option>
                                    <option value="Women's Bag">Women's Bag</option>
                                    <option value="Men's Wallet">Men's Wallet</option>
                                    <option value="Cloth">Cloth</option>
                                    <option value="Shoes">Shoes</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="productStock" name="productStock" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="productImage">
                        </div>

                        <button type="submit" class="btn btn-primary w-100" data-bs-dismiss="modal">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let shoes = [];
    let wallets = [];
    let cloth = [];
    let womanBags = [];
    let editMode = false;
    let currentCategory = 'shoes'; // Default category

    // Function to render products in table based on category
    function renderProducts() {
        let products;
        let tableBodyId;

        switch (currentCategory) {
            case 'shoes':
                products = shoes;
                tableBodyId = 'shoesProductTableBody';
                break;
            case 'wallets':
                products = wallets;
                tableBodyId = 'walletProductTableBody';
                break;
            case 'cloth':
                products = cloth;
                tableBodyId = 'clothProductTableBody';
                break;
            case 'womanBags':
                products = womanBags;
                tableBodyId = 'womanBagProductTableBody';
                break;
            default:
                products = shoes;
                tableBodyId = 'shoesProductTableBody';
        }

        const tbody = document.getElementById(tableBodyId);
        tbody.innerHTML = "";

        products.forEach((product, index) => {
            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td><img src="${product.image || 'placeholder.jpg'}" width="50" height="50" alt="Product"></td>
                    <td>${product.name}</td>
                    <td>${product.category}</td>
                    <td>$${product.price}</td>
                    <td>${product.stock}</td>
                    <td>
                        <button class="action-btn edit-btn btn btn-outline-warning btn-sm" onclick="editProduct(${index})"><i class="fas fa-edit"></i> Edit</button>
                        <button class="action-btn delete-btn btn btn-outline-danger btn-sm" onclick="deleteProduct(${index})"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                </tr>
            `;
        });
    }



    // Function to add or update product
    document.getElementById("productForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const name = document.getElementById("productName").value;
        const description = document.getElementById("productDesc").value;
        const price = document.getElementById("productPrice").value;
        const category = document.getElementById("productCategory").value;
        const stock = document.getElementById("productStock").value;
        const image = document.getElementById("productImage").files[0];

        let imageURL = "placeholder.jpg";
        if (image) {
            imageURL = URL.createObjectURL(image);
        }

        const product = {
            name,
            description,
            price,
            category,
            stock,
            image: imageURL
        };

        if (editMode) {
            const index = document.getElementById("editIndex").value;
            switch (currentCategory) {
                case 'shoes':
                    shoes[index] = product;
                    break;
                case 'wallets':
                    wallets[index] = product;
                    break;
                case 'cloth':
                    cloth[index] = product;
                    break;
                case 'womanBags':
                    womanBags[index] = product;
                    break;
            }
            editMode = false;
        } else {
            switch (currentCategory) {
                case 'shoes':
                    shoes.push(product);
                    break;
                case 'wallets':
                    wallets.push(product);
                    break;
                case 'cloth':
                    cloth.push(product);
                    break;
                case 'womanBags':
                    womanBags.push(product);
                    break;
            }
        }

        document.getElementById("productForm").reset();
        document.getElementById("editIndex").value = "";
        renderProducts();
        var modal = new bootstrap.Modal(document.getElementById("addProductModal"));
        modal.hide();
    });

    // Function to edit product
    function editProduct(index) {
        let products;
        switch (currentCategory) {
            case 'shoes':
                products = shoes;
                break;
            case 'wallets':
                products = wallets;
                break;
            case 'cloth':
                products = cloth;
                break;
            case 'womanBags':
                products = womanBags;
                break;
            default:
                products = shoes;
        }

        const product = products[index];

        document.getElementById("productName").value = product.name;
        document.getElementById("productDesc").value = product.description;
        document.getElementById("productPrice").value = product.price;
        document.getElementById("productCategory").value = product.category;
        document.getElementById("productStock").value = product.stock;
        document.getElementById("editIndex").value = index;

        editMode = true;
        var modal = new bootstrap.Modal(document.getElementById("addProductModal"));
        modal.show();
    }

    // Function to delete product
    function deleteProduct(index) {
        if (confirm("Are you sure you want to delete this product?")) {
            switch (currentCategory) {
                case 'shoes':
                    shoes.splice(index, 1);
                    break;
                case 'wallets':
                    wallets.splice(index, 1);
                    break;
                case 'cloth':
                    cloth.splice(index, 1);
                    break;
                case 'womanBags':
                    womanBags.splice(index, 1);
                    break;
            }
            renderProducts();
        }
    }
</script>

<!-- Validation in jQuery -->

<script>
    $(document).ready(function() {
        $("#productForm").validate({
            rules: {
                productName: {
                    required: true,
                    minlength: 3
                },
                productDesc: {
                    required: true,
                    minlength: 10
                },
                productPrice: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                productCategory: {
                    required: true
                },
                productStock: {
                    required: true,
                    digits: true,
                    min: 1
                },
                productImage: {
                    required: true,
                    extension: "jpg|jpeg|png|gif"
                }
            },
            messages: {
                productName: {
                    required: "Please enter a product name",
                    minlength: "Product name must be at least 3 characters long"
                },
                productDesc: {
                    required: "Please enter a product description",
                    minlength: "Description must be at least 10 characters long"
                },
                productPrice: {
                    required: "Please enter a price",
                    number: "Please enter a valid number",
                    min: "Price must be greater than 0"
                },
                productCategory: {
                    required: "Please select a category"
                },
                productStock: {
                    required: "Please enter stock quantity",
                    digits: "Stock quantity must be a whole number",
                    min: "Stock must be at least 1"
                },
                productImage: {
                    required: "Please upload an image",
                    extension: "Allowed file types: JPG, JPEG, PNG, GIF"
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("text-danger mt-1");
                error.insertAfter(element);
            },
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function(form) {
                alert("Product added successfully!");
                form.submit();
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>