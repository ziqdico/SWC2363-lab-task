<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <?php include("header.php"); ?>

    <form action="recordfound_doktor.php" method="post">

        <h1>Search Record Doktor</h1>
        <p><label class="label" for="ID"> ID: </label>
            <input id="ID" type="text" name="ID" size="30" maxlength="30"
                value="<?php if (isset($_POST['ID'])) echo $_POST['ID']; ?>" />
        </p>

        <p><input id="submit" type="submit" value="search" /></p>
    </form>
</body>

</html>