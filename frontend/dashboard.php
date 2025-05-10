<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DermaGrid - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: bold;
            font-size: 20px;
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .user-email {
            margin-right: 15px;
            color: #555;
        }

        .logout-btn {
            padding: 8px 12px;
            background-color: #f2f2f2;
            color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .logout-btn:hover {
            background-color: #e0e0e0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1;
        }

        .welcome-card {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            line-height: 1.6;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .dashboard-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .dashboard-card h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .dashboard-card p {
            margin-bottom: 15px;
        }

        .card-footer {
            display: flex;
            justify-content: flex-end;
        }

        .card-btn {
            padding: 8px 12px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .card-btn:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">DermaGrid</div>
        <div class="user-menu">
            <span class="user-email"><?php echo htmlspecialchars($_SESSION["email"]); ?></span>
            <a href="logout.php" class="logout-btn">Log Out</a>
        </div>
    </header>

    <div class="container">
        <div class="welcome-card">
            <h1>Welcome to DermaGrid Dashboard</h1>
            <p>You have successfully logged in. This is your personal dashboard where you can manage your account and access all features.</p>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h2>Your Profile</h2>
                <p>View and update your personal information and preferences.</p>
                <div class="card-footer">
                    <a href="#" class="card-btn">View Profile</a>
                </div>
            </div>

            <div class="dashboard-card">
                <h2>Recent Activity</h2>
                <p>Check your recent activity and history.</p>
                <div class="card-footer">
                    <a href="#" class="card-btn">View Activity</a>
                </div>
            </div>

            <div class="dashboard-card">
                <h2>Settings</h2>
                <p>Manage your account settings and preferences.</p>
                <div class="card-footer">
                    <a href="#" class="card-btn">Manage Settings</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
