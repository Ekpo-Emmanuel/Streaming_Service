<?php require "./includes/header.php" ?>
<?php require "./config/config.php" ?>

<?php 


if(isset($_SESSION['username'])) {
    // header("location: ".$app);
    echo "<script>window.location.href = ".$app."</script>";

}
$nameError = "";
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
    function nameExists($conn, $name) {
        $sql = "SELECT COUNT(*) FROM users WHERE name = :name";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    $name = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    // name validation
    if(empty($name)) {
        $nameError = "Username is required!";
    } elseif (strlen($name) < 2) {
        $nameError = "Username is too short!";
    } else if(nameExists($conn, $name)) {
        $nameError = "username already in use";
    } else{
        $name = trim($name);
    }


    //validate password
    if (empty($pass)) {
        $passError = "Enter password";
    } elseif(strlen($pass) <= 4) {
        $passError = "password should contain at least 5 characters";
    }

    // email validation
    if(empty($email)) {
        $emailError = "Email is required!";
    } elseif (!validateEmail($email)) {
        $emailError = "Enter a valid email";
    } else if(emailExists($conn, $email)) {
        $emailError = "Email already in use";
    }

    //check is theres not error
    if(empty($uname) AND empty($emailError) AND empty($passError)) {
        $insert = $conn->prepare("INSERT INTO users (name, email, mypassword) VALUES (:name, :email, :mypassword)");
        $insert -> execute([
            ":name" => $name,
            ":email" => $email,
            ":mypassword" => password_hash($pass, PASSWORD_DEFAULT),
        ]);
        // header("location: index.php"); 
        echo "<script>window.location.href = 'login.php'</script>";
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
    .registration_end {
        position: fixed;
        background-color: rgba(0,0,0,.7);
        width: 100%;
        height: 100vh;
        z-index: 5;
        top: 0;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        place-content: center;
    }
    .registration_end .content {
        background-color: #fff;
        width: 500px;
        padding: 30px;
        border-radius: 5px;
    }
    .registration_end .content svg {
        display: block;
        margin: auto;
        height: 100px;
        background-color: lightgreen;
        border-radius: 50px;
        color: #fff;
        padding: 5px;
    }
    .registration_end .content p {
        font-size: 30px;
        font-weight: bold;
        display: block;
        margin-top: 30px;
        text-align: center;
    }
</style>
        <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Signup</h3>
                        <form action="signup.php" id="signupForm" method="POST">
                            <div class="input__item">
                                <input type="text" placeholder="Email address" name="email" value="<?php 
                                    if (isset($_POST["email"])) {
                                        echo $_POST["email"];
                                    }; 
                            ?>">
                                <span class="icon_mail"></span>
                                <small class="val_error"><?php echo $emailError; ?></small>
                            </div>
                            <div class="input__item" id="letters_only">
                                <input type="text" placeholder="Username" name="uname" value="<?php 
                                    if (isset($_POST["uname"])) {
                                        echo $_POST["uname"];
                                    }; 
                            ?>">
                                <span class="icon_profile"></span> 
                                <small class="val_error"><?php echo $nameError; ?></small>
                            </div>
                            <div class="input__item" id="letters_only">
                                <input type="text" placeholder="Password" name="pass" value="<?php 
                                    if (isset($_POST["pass"])) {
                                        echo $_POST["pass"];
                                    }; 
                            ?>">
                                <span class="icon_lock"></span>
                                <small class="val_error"><?php echo $passError; ?></small>
                            </div>
                            <button type="submit" class="site-btn" name="submit" id="submit">Signup</button>
                        </form>
                        <!-- <a href="#" class="forget_pass">Forgot Your Password?</a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Already have an Account</h3>
                        <a href="<?php echo $app ?>/login.php" class="primary-btn">Login</a>
                    </div>
                </div>
            </div>
          
        </div>
    </section>
    <!-- Login Section End -->


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->
	<script src="<?php echo $app?>/js/validin.js"></script>

<?php require "./includes/footer.php" ?>
