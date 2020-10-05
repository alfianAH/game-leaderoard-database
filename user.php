<?php
?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css">
</head>

<body>
<p>Selamat datang. Info:
    <br>
    <?php
    echo $_COOKIE["user_id"];
    echo $_COOKIE["username"];
    echo $_COOKIE["email"];
    ?>
</p>
</body>

</html>
