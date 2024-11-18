<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <title>Stocks</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #DADADA;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #333;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            padding-bottom: 260px;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: all 0.3s ease;
            margin-bottom: 5px;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a:hover {
            background-color: #555;
            transform: scale(1.05);
            color: #f0f0f0;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
            flex-grow: 1;
            overflow: hidden;
        }

        .navbar {
            background-color: #333;
            padding: 15px;
            color: white;
            text-align: center;
        }

        .navbar h2 {
            margin: 0;
            
        }

        .container-background {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
           
        }
        .search-bar input {
            padding: 0.5rem;
            width: 300px;
            font-size: 16px;
        }
        .stock-table-container h2 {
            margin-bottom: 20px;
        }
        
        /* Table styling */
        .stock-table-container {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            overflow: hidden;
        }

        .stock-table-container thead {
            background-color: grey;
        }

        .stock-table-container th, .stock-table-container td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .stock-table-container tbody tr:nth-child(even) {
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #1C4E80;
            color:white;
        }

        /* Button Styling */
        .Btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none; 
        }

        .Btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .Btn-danger {
            background-color: #dc3545;
        }

        .Btn-danger:hover {
            background-color: #c82333;
        }

        .Btn-primary {
            background-color: #007bff;
        }

        .Btn-primary:hover {
            background-color: #0056b3;
        }

        /* Pagination Styling */
        .pagination {
            display: inline-block;
            padding-top: 20px;
            text-align: center;
        }

        .pagination a {
            color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
            margin: 0 4px;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .pagination a.active {
            background-color: #1C4E80;
            color: white;
        }

        .pagination i {
            margin-right: 5px;
        }

     
      
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="User Profile.php"><i class="fa-solid fa-cog"></i> User Profile</a>
        <a href="dashboard.php"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
        <a href="inventory.php"><i class="fa-solid fa-file-alt"></i> Borrow</a>
        <a href="stocks.php"><i class="fa-solid fa-boxes"></i> Stocks</a>    
        <a href="tracker.php"><i class="fa-solid fa-map-marker-alt"></i> Transaction Details</a>
        <a href="return.php"><i class="fa-solid fa-undo-alt"></i> Return Record</a>
        <a href="login.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="navbar">
            <h2>Stocks </h2>
        </div>
        <!-- Background container for search and table -->
        <div class="container-background">
            <!-- Search bar -->
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search Stocks..." class="form-control" onkeyup="filterTable()">
                <a href="stocking.php" class="Btn">Add New Stock</a>
                
            </div>

    

            <!-- Stock Table -->
            <div class="stock-table-container">
                <h2>Current Stock</h2>
                <table class="stock-table-container" id="stock-table">
                    <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'db.php';

                            // Pagination Logic
                            $limit = 5;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $offset = ($page - 1) * $limit;

                            $sql = "SELECT * FROM stocks LIMIT $limit OFFSET $offset";
                            $result  = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $idd = $row['id'];
                                ?>
                                <tr>
                                    
                                    <td><?= $row['id']?></td>
                                    <td><?= $row['itemid']?></td>
                                    <td><?= $row['itemname']?></td>
                                    <td><?= $row['category']?></td>
                                    <td><?= $row['quantity']?></td>
                                    <td>
                                        <a href="del.php?id=<?php echo$row['id']?>" class="Btn Btn-danger">DELETE</a>
                                        <button type="button" class="Btn Btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick="setEditData(<?= $row['itemid']?>, '<?= $row['itemname']?>', '<?= $row['category']?>', <?= $row['quantity']?>)">
                                            EDIT
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }

                            // Total number of records for pagination
                            $count_sql = "SELECT COUNT(*) AS total FROM stocks";
                            $count_result = mysqli_query($conn, $count_sql);
                            $total_rows = mysqli_fetch_assoc($count_result)['total'];
                            $total_pages = ceil($total_rows / $limit);
                        ?>
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="pagination">
                    <a href="stocks.php?page=<?= $page - 1 ?>" class="<?= $page <= 1 ? 'disabled' : '' ?>">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>

                    <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo '<a href="stocks.php?page=' . $i . '" class="' . ($i == $page ? 'active' : '') . '">' . $i . '</a>';
                        }
                    ?>

                    <a href="stocks.php?page=<?= $page + 1 ?>" class="<?= $page >= $total_pages ? 'disabled' : '' ?>">
                         <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="update_stock.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Stock</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="itemid" id="itemid">
                        <label for="itemname">Item Name</label>
                        <input type="text" id="itemname" name="itemname" required class="form-control">
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" required class="form-control">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" required class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="Btn Btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="Btn Btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function setEditData(itemid, itemname, category, quantity) {
            document.getElementById('itemid').value = itemid;
            document.getElementById('itemname').value = itemname;
            document.getElementById('category').value = category;
            document.getElementById('quantity').value = quantity;
        }
    </script>
</body>
</html>
