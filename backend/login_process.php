<?php
// Initialize the session
session_start();
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){        
        $email_err = "Please enter your email.";        
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){        
        $password_err = "Please enter your password.";        
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        // This is where you would connect to your database
        // For example:
        /*
        $servername = "localhost";
        $username = "username";
        $password_db = "password";
        $dbname = "dermagrid";

        // Create connection
        $conn = new mysqli($servername, $username, $password_db, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare SQL statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if email exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $email, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // Email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
        
        // Close connection
        $conn->close();
        */
        
        // For demonstration purposes only (REMOVE IN PRODUCTION)
        // This is a simple check without a database
        // In a real application, you would verify against database records
        if($email === "admin@example.com" && $password === "password123"){
            // Password is correct, so start a new session
            session_start();
            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = 1;
            $_SESSION["email"] = $email;                            
            
            // Remember me functionality
            if(isset($_POST["remember"]) && $_POST["remember"] === "on"){
                // Set cookies for 30 days
                setcookie("email", $email, time() + (86400 * 30), "/");
                // Note: Storing passwords in cookies is not secure
                // This is just for demonstration
                // In production, use a token system instead
            }
            
            // Redirect user to welcome page
            header("location: ../frontend/dashboard.php");
            exit;
        } else{
            // Email/password combo is invalid
            $login_err = "Invalid email or password.";
        }
    }
    
    // Return errors as JSON if this is an AJAX request
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $response = array(
            'success' => false,
            'email_err' => $email_err,
            'password_err' => $password_err,
            'login_err' => $login_err
        );
        
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    
    // If not AJAX, redirect back to login page with errors
    $_SESSION['email_err'] = $email_err;
    $_SESSION['password_err'] = $password_err;
    $_SESSION['login_err'] = $login_err;
    $_SESSION['email'] = $email; // To refill the form
    
    header("location: ../frontend/login.php");
    exit;
}
?>
