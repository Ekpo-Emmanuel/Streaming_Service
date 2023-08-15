<?php require "./includes/header.php" ?>
<?php 

$nameError = "";
$emailError = "";
$passError = "";


if(isset($_POST["submit"])) {
    function validateEmail($email) {
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';    
        return preg_match($pattern, $email);
    }
    $name = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    // name validation
    if(empty($name)) {
        $nameError = "Username is required!";
    } elseif (strlen($name) < 2) {
        $nameError = "Username is too short!";
    } elseif (str_word_count($name) > 1) {
        $nameError = "Enter 1 name";
    } else{
        $name = trim($name);
    }

    // email validation
    if(empty($email)) {
        $emailError = "Email is required!";
    } elseif (!validateEmail($email)) {
        $emailError = "Enter a valid email";
    }

    //validate password
    if (empty($pass)) {
        $passError = "Enter password";
    } elseif(strlen($pass) <= 4) {
        $passError = "password should contain at least 5 characters";
    }

    //check is theres not error
    if(empty($uname) AND empty($emailError) AND empty($passError)) {
        // $insert = $conn->prepare("INSERT INTO addblog (firstname, lastname, title, category, description) VALUES (:firstname, :lastname, :title, :category, :description)");
        // $insert -> execute([

        // ]);
        echo "<script>alert('complete')</script>";
        // header("location: index.php"); 
    }
     else {
        echo "<script>alert('not complete')</script>";
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

    <!-- Signup Section Begin -->
    <!-- <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login__form">
                        <h3>Sign Up</h3>
                        <form action="#">
                            <div class="input__item ">
                                <input class="col-md-12" type="text" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Your Name">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Signup </button>
                        </form>
                        <h5>Already have an account? <a href="<?php echo $app ?>/login.php">Log In!</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Signup Section End -->

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
                            <button type="submit" class="site-btn" name="submit">Signup</button>
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
