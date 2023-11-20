<?php
     include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Search</title>
</head>
<body>
    <h1>Music Search</h1>
    <form action="search.php" method="GET">
        <label for="search">Search:</label>
        <input type="text" id="search1" name="search1" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>

<?php
    include("nav.php");
    include("search.php");
?>
