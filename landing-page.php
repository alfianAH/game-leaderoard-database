<?php
include "database/database.php";

$database = new Database();

// Sign up
if(isset($_POST["nama_depan"]) && isset($_POST["nama_belakang"]) &&
    isset($_POST["email"]) && isset($_POST["password"])){
//    echo("Halo" . md5($_POST['password']));

    // INSERT INTO user_tbl VALUES('nama_depan', 'nama_belakang', 'email', 'password')
    $database->execute(
            "INSERT INTO user_tbl(nama_depan, nama_belakang, email, password) VALUES('" .
            $_POST['nama_depan'] . "', '" .
            $_POST['nama_belakang'] . "', '" .
            $_POST['email'] . "', '" .
            md5($_POST['password']) .
            "')"
    );
}

?>

<html>
<head>
    <title>Landing Page</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css">
    <script src="landing-page.js"></script>
</head>

<body>
<main>
    <div class="form">
        <p>Welcome</p>
        <button type="button" id="login-btn" onclick="showLogin()">Log in</button>
        <button type="button" id="sign-up-btn" onclick="showSignUp()">Sign up</button>
    </div>

    <div id="signup" hidden="true">
        <form method="post">
            <p>
                <label>
                    Nama depan: <input type="text" name="nama_depan">
                </label>
            </p>
            <p>
                <label>
                    Nama belakang: <input type="text" name="nama_belakang">
                </label>
            </p>
            <p>
                <label>
                    Email: <input type="email" name="email">
                </label>
            </p>
            <p>
                <label>
                    Password: <input type="password" name="password">
                </label>
            </p>
            <p>
                <input type="submit" value="Submit" name="submit">
                <input type="submit" value="Cancel" name="cancel">
            </p>
        </form>
    </div>

    <div id="login" hidden="true">
        <form method="post">
            <p>
                <label>
                    Email: <input type="email" name="email">
                </label>
            </p>
            <p>
                <label>
                    Password: <input type="password" name="password">
                </label>
            </p>
            <p>
                <input type="submit" value="Submit" name="submit">
                <input type="submit" value="Cancel" name="cancel">
            </p>
        </form>
    </div>
</main>
</body>
</html>
