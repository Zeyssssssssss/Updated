<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <title>Responsive Profile</title>
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

        /* Logout button styling */
        .Btn {
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
            margin-top: auto; /* Moves the logout button to the bottom */
        }

        .Btn .sign svg {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }


        /* Main content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            color: #666;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        button {
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background-color: #333;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: red;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%); /* Hide sidebar */
                width: 100%;
                height: auto;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1000;
            }

            .sidebar a {
                text-align: center;
            }

            .main-content {
                margin-left: 0;
                padding: 10px;
            }

            .container {
                padding: 1.5rem;
            }

            .Btn {
                margin: 20px auto;
            }
        }

        /* Button to toggle sidebar on mobile */
        .menu-toggle {
            display: none;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            position: fixed;
            top: 10px;
            left: 10px;
            cursor: pointer;
            z-index: 1001;
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="User Profile.php"><i class="fa-solid fa-cog"></i> User Profile</a>
        <a href="dashboard.php"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
        <a href="inventory.php"><i class="fa-solid fa-file-alt"></i> Borrow</a>
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

    <!-- Toggle button for mobile view -->
    <button class="menu-toggle" onclick="toggleSidebar()">☰ Menu</button>

    <!-- Main content -->
    <div class="main-content">
        <div class="container">
            <h2>User Profile</h2>
            <form>
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Enter your username" required>

                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter your email" required>

                <h2>Change Password</h2>
                <label for="current-password">Current Password</label>
                <input type="password" id="current-password" placeholder="Enter current password" required>

                <label for="new-password">New Password</label>
                <input type="password" id="new-password" placeholder="Enter new password" required>

                <label for="confirm-password">Confirm New Password</label>
                <input type="password" id="confirm-password" placeholder="Confirm new password" required>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const currentTransform = sidebar.style.transform;
            sidebar.style.transform = currentTransform === "translateX(0px)" ? "translateX(-100%)" : "translateX(0px)";
        }
    </script>

</body>
</html>
