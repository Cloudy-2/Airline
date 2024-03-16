<?php include('loginRequest.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Skyline - Login</title>
<link rel="icon" href="./assets/images/favicon.jpg">
<link rel="stylesheet" href="login.css">
</head> 
<body>
    <header>
        <h1>Skyline Airways</h1>
        <p>Your Trusted Travel Companion</p><br>
    </header>
    <main>
        <div class="login-container">
            <h2 style="text-align: left;">Login</h2>
            <form id="loginForm"  method="POST">
                <input type="text" id="Email" name="Email" placeholder="Email" required autocomplete="email"><br>
                <div style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="checkbox" id="show-password">
                    <label for="show-password">Show Password</label>
                </div><br>
                <input type="submit" name="logindata" value="Login">
                <?php if(!empty($errors)): ?>
                    <p id="errorMessage" style="text-align: center; margin-top: 10px; color: red;"><?php echo implode("<br>", $errors); ?></p>
                <?php endif; ?>
                <p style="text-align: center;"><a href="registration.php">No account? Register here</a>.</p>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
    </footer>
    <script>
        document.getElementById("Email").addEventListener("input", clearErrorMessage);
        document.getElementById("password").addEventListener("input", clearErrorMessage);

        function clearErrorMessage() {
            var errorMessage = document.getElementById("errorMessage");
            if (errorMessage) { 
                errorMessage.textContent = ""; 
            }
        }
     
        document.getElementById("show-password").addEventListener("change", function() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    </script>
</body>
</html>
