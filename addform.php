<?php
include 'db.php'; // Include your database connection file
    if(isset($_POST['save'])){
        $Itemname = htmlspecialchars($_POST['item_name']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $Status = htmlspecialchars($_POST['status']);
        $employeeid = htmlspecialchars($_POST['employee_id']);
        $Date = htmlspecialchars($_POST['returned_date']);

        $sql = "INSERT INTO additem (`item`, `quantity`, `status`, `employee id`, `date`)VALUES('$Itemname', '$quantity', '$Status', '$employeeid', '$Date')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "Successfully Added";
            header("location: tracker.php");
        }
        else{
            echo "Failed to Add";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Record Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #DADADA;
        }
        /* Sidebar styling */
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

        .sidebar a, .Btn {
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

        /* Hover effect */
        .sidebar a:hover, .Btn:hover {
            background-color: #555;
            transform: scale(1.05);
            color: #f0f0f0;
        }


        /* Main content */
        .main-content {
            margin-left: 260px; /* Same as sidebar width + padding */
            padding: 20px;
            flex-grow: 1;
        }
        .container {
            margin-top: ;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .submit-btn {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #4cae4c; /* Change background color on hover */
        }

        .message {
            margin-top: 20px;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="User Profile.php"><i class="fa-solid fa-cog"></i> User Profile</a>
        <a href="dashboard.php"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
        <a href="inventory.php"><i class="fa-solid fa-file-alt"></i> Borrow </a>
        <a href="stocks.php"><i class="fa-solid fa-boxes"></i> Stocks</a>    
        <a href="tracker.php"><i class="fa-solid fa-map-marker-alt"></i> Transaction Details</a>
        <a href="return.php"><i class="fa-solid fa-undo-alt"></i> Return Record</a>
        <a href="login.php"><i class="fa fa-sign-out-alt"></i> Logout</a>

<!-- <button class="Btn">
     <div class="sign">
         <svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg>
     </div>
     <div class="text">Logout</div>
 </button>-->
    </div>
    
    <!-- Main content -->
    <div class="main-content">
        <div class="container">
            <h1>New Record</h1>
            <form  method="POST">
            <div class="lol">
            <label for="status">Item Name:</label>
                <select id="status" name="item_name" required>
                    <option value="Item Returned">Items</option>
                    <option value="Excavators">Excavators</option>
                    <option value="Backhoe">Backhoe</option>
                    <option value="Bulldozers">Bulldozers</option>
                    <option value="Wheel Tractor Scraper">Wheel Tractor Scraper</option>
                    <option value="Dump Trucks"> Dump Trucks</option>
                    <option value="Telehandlers">Telehandlers</option>
                </select>
                </div>

                <div class="lil">
                <label for="Quantity">Quantity</label>
                <input type="text" id="search" placeholder="Quantity" name="quantity" onkeyup="filterTable()">
                </div>
                
                <div class="lal">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Item Returned">Item Returned</option>
                    <option value="Pending">Pending</option>
                    <option value="Lost">Lost</option>
                </select>
                </div>

                <div class="lul">
                <label for="Employee ID">Employee ID</label>
                <input type="text" id="search" placeholder="Employee ID" name = "employee_id"onkeyup="filterTable()">
                </div>
           
                <div class="lel">
                <label for="returned_date">Returned Date:</label>
                <input type="date" id="returned_date" name="returned_date" required>
                </div>

                <button type="submit" class="submit-btn" name="save">Submit</button>
                </div>
            </form>

            <style>
                .lol{
                   width: 600px;
                }

                .lil{
                    width: 580px;
                }

                .lul{
                    width: 580px;
                }

                .lel{
                    width: 580px;
                }
            </style>
        </div>
    </div>
</body>
</html>
