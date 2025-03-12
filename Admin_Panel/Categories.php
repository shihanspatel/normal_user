<?php

include('index.php');

?>

<div class="col-xxl-9" style="margin-left: auto; margin-right: auto;">
    <!-- <div class="card text-center shadow-sm"> -->
        <h2 class="mb-3">Manage Categories</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>White Shoes</td>
                        <td><img src="images/soe2.avif" style="width: 100px; height: 100px;"></td>
                        <td><button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">Active</button></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <img src="images/trash.svg" alt=""> Delete
                                </button>
                                <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/soe2.avif">
                                    <img src="images/pencil-square.svg" alt=""> Edit
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>White Shoes</td>
                        <td><img src="images/soe2.avif" style="width: 100px; height: 100px;"></td>
                        <td><button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">Active</button></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <img src="images/trash.svg" alt=""> Delete
                                </button>
                                <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/soe2.avif">
                                    <img src="images/pencil-square.svg" alt=""> Edit
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>White Shoes</td>
                        <td><img src="images/soe2.avif" style="width: 100px; height: 100px;"></td>
                        <td><button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">Active</button></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <img src="images/trash.svg" alt=""> Delete
                                </button>
                                <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/soe2.avif">
                                    <img src="images/pencil-square.svg" alt=""> Edit
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>White Shoes</td>
                        <td><img src="images/soe2.avif" style="width: 100px; height: 100px;"></td>
                        <td><button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">Active</button></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <img src="images/trash.svg" alt=""> Delete
                                </button>
                                <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/soe2.avif">
                                    <img src="images/pencil-square.svg" alt=""> Edit
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>White Shoes</td>
                        <td><img src="images/soe2.avif" style="width: 100px; height: 100px;"></td>
                        <td><button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">Active</button></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <img src="images/trash.svg" alt=""> Delete
                                </button>
                                <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/soe2.avif">
                                    <img src="images/pencil-square.svg" alt=""> Edit
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>White Shoes</td>
                        <td><img src="images/soe2.avif" style="width: 100px; height: 100px;"></td>
                        <td><button class="status-btn status-active toggle-status btn btn-success btn-sm w-100" data-status="active">Active</button></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="action-btn delete-btn btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <img src="images/trash.svg" alt=""> Delete
                                </button>
                                <button class="action-btn edit-btn btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-image="images/soe2.avif">
                                    <img src="images/pencil-square.svg" alt=""> Edit
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">Image URL</label>
                        <input type="url" class="form-control" id="categoryImage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure you want to delete this category?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteCategoryBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Edit button functionality
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('categoryName').value = this.getAttribute('data-category');
                document.getElementById('categoryImage').value = this.getAttribute('data-image');
            });
        });

        // Status toggle functionality
        document.querySelectorAll('.toggle-status').forEach(button => {
            button.addEventListener("click", function() {
                if (this.classList.contains("status-active")) {
                    this.classList.remove("status-active");
                    this.classList.add("status-inactive");
                    this.textContent = "Inactive";
                    this.classList.remove("btn-success");
                    this.classList.add("btn-secondary");
                } else {
                    this.classList.remove("status-inactive");
                    this.classList.add("status-active");
                    this.textContent = "Active";
                    this.classList.remove("btn-secondary");
                    this.classList.add("btn-success");
                }
            });
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>