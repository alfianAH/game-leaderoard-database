<?php
// Logout
if(isset($_POST["logout"])){
    echo "Logout";
    setcookie("user_id", "", time() - 3600);
    setcookie("username", "" . " ", time() - 3600);
    setcookie("email", "", time() - 3600);
    header("Location: landing-page.php");
}

if(isset($_POST["arknights"]) && isset($_POST["level"]) && isset($_POST["score"])){
    echo "arknek";
    echo $_POST["level"];
    echo $_POST["score"];
}

if(isset($_POST["among-us"]) && isset($_POST["level"]) && isset($_POST["score"])){
    echo "among";
    echo $_POST["level"];
    echo $_POST["score"];
}

?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css">
    <script src="landing-page.js"></script>
</head>

<body>
<main>
    <p>Selamat datang. Info:
        <br>
        <?php
        echo "Nama: " . $_COOKIE["username"];
        echo "<br>";
        echo "Email: " . $_COOKIE["email"];
        ?>
    </p>
    <p>
        <form method="post" name="logout">
            <input type="submit" value="logout" name="logout">
        </form>
    </p>

    <label>
        Submit score. Pilih game:
        <select name="nama_game" id="nama_game">
            <option value="arknights">Arknights</option>
            <option value="among-us">Among Us</option>
        </select>
    </label>
    <br>
    <button type="button" onclick="getOption()">Pilih</button>

    <div id="score-form" hidden="true">
        <form method="post" name="score-form"
              onsubmit="return validateInput('score-form', ['level', 'score'])">
            <p>
                <label>
                    Level: <input type="text" name="level">
                </label>
            </p>

            <p>
                <label>
                    Score: <input type="text" name="score">
                </label>
            </p>

            <p>
                <input type="submit" value="Submit" id="submit" name="">
                <input type="reset" value="Cancel" name="cancel">
            </p>
        </form>
    </div>
</main>
</body>

</html>
