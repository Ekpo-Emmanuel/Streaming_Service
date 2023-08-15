<?php require "./includes/header.php" ?>
<?php require "./config/config.php" ?>

<?php 

$emailError = "";
$passError = "";

if(isset($_POST["submit"])) {
    function validateEmail($email) {
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';    
        return preg_match($pattern, $email);
    }
    function emailExists($conn, $email) {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    // email validation
    if(empty($email)) {
        $emailError = "Email is required!";
    } elseif (!validateEmail($email)) {
        $emailError = "Enter a valid email";
    } else if(!emailExists($conn, $email)) {
        $emailError = "User does not exist";
    }

    // pass validation
    if(empty($pass)) {
        $passError = "Password is required!";
    }


    //check is theres not error
    if(empty($emailError) AND empty($passError)) {
        // $insert = $conn->prepare("INSERT INTO addblog (firstname, lastname, title, category, description) VALUES (:firstname, :lastname, :title, :category, :description)");
        // $insert -> execute([

        // ]);
        // header("location: index.php"); 
    }
}


?>
<style>
    .val_error {
        display: block;
        color: red;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 12px;
        margin-top: 5px;
    }
</style>
    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form action="login.php" method="POST">
                            <div class="input__item">
                                <input type="text" placeholder="Email address" name="email" value="<?php 
                                    if (isset($_POST["email"])) {
                                        echo $_POST["email"];
                                    }; 
                            ?>">
                                <span class="icon_mail"></span>
                                <small class="val_error"><?php echo $emailError; ?></small>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Password" name="pass" value="<?php 
                                    if (isset($_POST["pass"])) {
                                        echo $_POST["pass"];
                                    }; 
                            ?>">
                                <span class="icon_lock"></span>
                                <small class="val_error"><?php echo $passError; ?></small>
                            </div>
                            <button type="submit" class="site-btn"  name="submit">Login Now</button>
                        </form>
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>
                        <a href="<?php echo $app ?>/signup.php" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
          
        </div>
    </section>
    <!-- Login Section End -->
<?php require "./includes/footer.php" ?>
