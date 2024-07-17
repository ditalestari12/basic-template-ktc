<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "cafe"; 


    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }   


    $username = $_POST['username'];
    $password = $_POST['password'];

 
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    
    $sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        
        $email = $row['email'];

     
        header("Location: index.php?email=" . urlencode($email)); 
        exit();
    } else {
        $error = "Username atau password salah.";
    }

   
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
            <div class="col-md-6 side-image">
                    <div class="text" style="color: #3cb371;">
                        <p><b>Welcome to 작은 카페 (Little Cafe)<i>~ by Cha Joowan's Wife</b></i></p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <header>Login</header>
                            <div class="input-field">
                                <label for="username">Username</label>
                                <input type="text" class="input" id="username" name="username" required autocomplete="off">
                            </div>
                            <div class="input-field">
                                <label for="password">Password</label>
                                <input type="password" class="input" id="password" name="password" required>
                            </div>

                            <?php if(isset($error)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php } ?>

                            <div class="input-field">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="signin">
                                <span>Don't have an account? <a href="register.php">Register Here</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
