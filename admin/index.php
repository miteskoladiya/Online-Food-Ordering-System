<!DOCTYPE html>
                <html lang="en">
                <?php
                include("../connection/connect.php");
                error_reporting(1); // Change to 1 to see errors
                session_start();

                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (!empty($_POST["submit"])) {
                        // Changed query to not hash password in SELECT
                        $loginquery = "SELECT * FROM admin WHERE username='$username'";
                        $result = mysqli_query($db, $loginquery);
                        $row = mysqli_fetch_array($result);

                        if (is_array($row)) {
                            // Verify password using MD5 (since that's what's stored in DB)
                            if ($row['password'] === md5($password)) {
                                $_SESSION["adm_id"] = $row['adm_id'];
                                header("refresh:1;url=dashboard.php");
                            } else {
                                echo "<script>alert('Invalid Password!');</script>";
                            }
                        } else {
                            echo "<script>alert('Invalid Username!');</script>";
                        }
                    }
                }
                ?>

                <head>
                    <meta charset="UTF-8">
                    <title>Admin Login</title>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

                    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
                    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
                    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

                    <link rel="stylesheet" href="css/login.css">


                </head>

                <body>

                    <div class="container">
                        <div class="info">
                            <h1>Admin Panel </h1>
                        </div>
                    </div>
                    <div class="form">
                        <div class="thumbnail"><img src="images/manager.png" /></div>
                        <span style="color:red;"><?php echo $message; ?></span>
                        <span style="color:green;"><?php echo $success; ?></span>
                        <form class="login-form" action="index.php" method="post">
                            <input type="text" placeholder="Username" name="username" />
                            <input type="password" placeholder="Password" name="password" />
                            <input type="submit" name="submit" value="Login" />

                        </form>


                    </div>
                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                    <script src='js/index.js'></script>
                </body>

                </html>