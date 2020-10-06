<?php
include "database/database.php";

$database = new Database();

// Sign up
if(isset($_POST["signup"]) && isset($_POST["nama_depan"]) && isset($_POST["nama_belakang"]) &&
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

// Login
if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"])){
    // Check email
    if($database->get(
            "SELECT * FROM user_tbl WHERE email = '" .
            $_POST["email"] . "'"
    )){
        // Check password
        if($database->get(
            "SELECT * FROM user_tbl WHERE password = '" .
            md5($_POST["password"]) . "'"
        )){
            echo "Masuk";
            $query = $database->get("SELECT * FROM user_tbl WHERE email = '" . $_POST["email"] . "'");
            while ($row = mysqli_fetch_assoc($query)){
                // 86400 is 1 day
                setcookie("user_id", $row["user_id"], time() + 86400 * 15);
                setcookie("username", $row["nama_depan"] . " " . $row["nama_belakang"], time() + 86400 * 15);
                setcookie("email", $row["email"], time() + 86400 * 15);
                header("Location: user.php");
            }
        } else{
            echo "Password salah";
        }
    } else {
        echo "Email salah";
    }
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
        <button type="button" id="login-btn" onclick="showLoginSignUp('login', 'signup')">Log in</button>
        <button type="button" id="sign-up-btn" onclick="showLoginSignUp('signup', 'login')">Sign up</button>
    </div>

    <div id="signup" hidden="true">
        <form method="post" name="signup"
              onsubmit="return validateInput('signup', ['nama_depan', 'nama_belakang', 'email', 'password'])"
              required>
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
                <input type="submit" value="Submit" name="signup">
                <input type="reset" value="Cancel" name="cancel">
            </p>
        </form>
    </div>

    <div id="login" hidden="true">
        <form method="post" name="login"
              onsubmit="return validateInput('login', ['email', 'password'])" required>
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
                <input type="submit" value="Submit" name="login">
                <input type="reset" value="Cancel" name="cancel">
            </p>
        </form>
    </div>
</main>
</body>
</html>
