<?php
// Sample data for demonstration purposes (replace this with a database query)
$users = [
    ["id" => 1, "name" => "Priyal Antala", "email" => "pantala956@rku.ac.in", "mobile" => "8469845115", "status" => "Active"],
    ["id" => 2, "name" => "Shihans Patel", "email" => "shihanspatel07@gmail.com", "mobile" => "8780074890", "status" => "Active"],
    ["id" => 3, "name" => "Shubham Desai", "email" => "shubham.desai24@rku.ac.in", "mobile" => "9510426917", "status" => "Inactive"],
    ["id" => 4, "name" => "Shivam Patel", "email" => "shivam.patel82@gmail.com", "mobile" => "9328646039", "status" => "Active"],
    ["id" => 5, "name" => "Deep Vasoya", "email" => "deep.vasoya81@rku.ac.in", "mobile" => "8128530976", "status" => "Inactive"],
    ["id" => 6, "name" => "Milan Savliya", "email" => "msavaliya07@rku.ac.in", "mobile" => "9723818018", "status" => "Active"],
    ["id" => 7, "name" => "Meet Mavani", "email" => "meet.mavani87@gmail.com", "mobile" => "", "status" => "Active"],
];
?>

<?php include('Header.php'); ?>

<div class="col-xxl-9">
    <div class="card text-center shadow-sm">
        <div class="container my-4">
            <h2 class="mb-4">Manage Users</h2>

            <!-- Search and Add User buttons -->
            <div class="d-flex justify-content-between mb-3">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search" name="query" id="searchInput">
                    <button class="btn btn-dark" type="submit">Search</button>
                </form>
                <button class="btn btn-primary">+ Add User</button>
            </div>

            <!-- Make Table Responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="userTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr id="userRow<?= $user['id'] ?>" class="<?= $user['status'] === 'Active' ? 'bg-white' : 'bg-lightgray' ?>">
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['mobile'] ?: 'N/A' ?></td>
                                <td>
                                    <button class="btn <?= $user['status'] === 'Active' ? 'btn-success' : 'btn-secondary' ?> btn-sm w-100 statusBtn"
                                        onclick="toggleStatus(<?= $user['id'] ?>, this)">
                                        <?= $user['status'] ?>
                                    </button>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-warning" style="width: 100px;" onclick="editUser(<?= $user['id'] ?>)">Edit</button>
                                        <button class="btn btn-outline-danger" style="width: 100px;" onclick="deleteUser(<?= $user['id'] ?>)">Delete</button>
                                        <button class="btn btn-outline-info" style="width: 100px;" onclick="viewUser(<?= $user['id'] ?>)">View</button>
                                        <button class="btn btn-outline-primary" style="width: 100px;" onclick="addToCart(<?= $user['id'] ?>)">Cart</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit User -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="editName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="editMobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveUserChanges()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Functionality -->
<script>
    let currentUserId = null;

    // Open Edit User Modal and populate fields
    function editUser(userId) {
        currentUserId = userId; // Store the user id of the one being edited

        const userRow = document.getElementById("userRow" + userId);
        const name = userRow.cells[1].textContent;
        const email = userRow.cells[2].textContent;
        const mobile = userRow.cells[3].textContent === 'N/A' ? '' : userRow.cells[3].textContent;
        const status = userRow.cells[4].textContent.trim();

        document.getElementById("editName").value = name;
        document.getElementById("editEmail").value = email;
        document.getElementById("editMobile").value = mobile;
        document.getElementById("editStatus").value = status;

        const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
        editModal.show();
    }

    // Save Changes to User Info
    function saveUserChanges() {
        const name = document.getElementById("editName").value;
        const email = document.getElementById("editEmail").value;
        const mobile = document.getElementById("editMobile").value;
        const status = document.getElementById("editStatus").value;

        // Update the data in the table
        const userRow = document.getElementById("userRow" + currentUserId);
        userRow.cells[1].textContent = name;
        userRow.cells[2].textContent = email;
        userRow.cells[3].textContent = mobile ? mobile : 'N/A';
        userRow.cells[4].textContent = status;

        // Close modal
        const editModal = bootstrap.Modal.getInstance(document.getElementById("editUserModal"));
        editModal.hide();
    }

    // Toggle Active/Inactive Status
    function toggleStatus(userId, button) {
        const currentStatus = button.textContent.trim();

        if (currentStatus === "Active") {
            button.textContent = "Inactive";
            button.classList.remove("btn-success");
            button.classList.add("btn-secondary");
            // button.closest('tr').classList.remove("bg-success");
            // button.closest('tr').classList.add("bg-danger");
        } else {
            button.textContent = "Active";
            button.classList.remove("btn-secondary");
            button.classList.add("btn-success");
            // button.closest('tr').classList.remove("bg-danger");
            // button.closest('tr').classList.add("bg-success");
        }
    }

    // Search functionality
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#userTable tbody tr");

        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            let email = row.cells[2].textContent.toLowerCase();
            let mobile = row.cells[3].textContent.toLowerCase();

            row.style.display = (name.includes(filter) || email.includes(filter) || mobile.includes(filter)) ? "" : "none";
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>