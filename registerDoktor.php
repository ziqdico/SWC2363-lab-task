<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Klinik Ajwa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <?php
    // call file to connect to server
    include("header.php");
    ?>

    <?php
    // This query inserts a record in the clinic table
    // Has form been submitted?
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = array(); // Initialize an error array

        // Check for a Firstname
        if (empty($_POST['FirstName'])) {
            $error[] = 'You forgot to enter your first Name.';
        } else {
            $fn = mysqli_real_escape_string($connect, trim($_POST['FirstName']));
        }

        // Check for a LastName
        if (empty($_POST['LastName'])) {
            $error[] = 'You forgot to enter your last name.';
        } else {
            $l = mysqli_real_escape_string($connect, trim($_POST['LastName']));
        }

        // Check for a Specialization
        if (empty($_POST['Specialization'])) {
            $error[] = 'You forgot to enter your specialization.';
        } else {
            $s = mysqli_real_escape_string($connect, trim($_POST['Specialization']));
        }

        // Check for a Password
        if (empty($_POST['Password'])) {
            $error[] = 'You forgot to enter your password.';
        } else {
            $p = mysqli_real_escape_string($connect, trim($_POST['Password']));
        }

        // Register the user in the database
        // Make the query
        if (empty($error)) { // Proceed only if there are no errors
            $q = "INSERT INTO doktor (ID, FirstName, LastName, Specialization, Password)
                  VALUES ('', '$fn', '$l', '$s', '$p')";

            // Run the query
            $result = mysqli_query($connect, $q);

            // If it runs
            if ($result) {
                echo '<h1>Thank you!</h1>';
                exit();
            } else { // If it did not run
                // Error message
                echo '<h1>System error</h1>';
                // Debugging message
                echo '<p>' . mysqli_error($connect) . '<br><br>Query: ' . $q . '</p>';
            }

            // Close the database connection
            mysqli_close($connect);
            exit();
        }
    }
    ?>

    <h2>Register Doktor</h2>
    <p>* required field</p>
    <form action="registerDoktor.php" method="post">

        <p><label class="label" for="FirstName"> First Name : *</label>
            <input id="FirstName" type="text" name="FirstName" size="30" maxlength="150" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" />
        </p>

        <p><label class="label" for="LastName"> Last Name : *</label>
            <input id="LastName" type="text" name="LastName" size="30" maxlength="60" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>" />
        </p>

        <p><label class="label" for="Specialization"> Specialization : *</label>
            <input id="Specialization" type="text" name="Specialization" size="12" maxlength="12" value="<?php if (isset($_POST['Specialization'])) echo $_POST['Specialization']; ?>" />
        </p>

        <p><label class="label" for="Password"> Password : *</label>
            <input id="Password" type="password" name="Password" size="12" maxlength="12" value="<?php if (isset($_POST['Password'])) echo $_POST['Password']; ?>" />
        </p>

        <p><input id="submit" type="submit" name="submit" value="Register" /> &nbsp;&nbsp;
            <input id="reset" type="reset" name="reset" value="Clear All" />
        </p>

    </form>

    <p>
        <br />
        <br />
        <br />
    </p>
</body>

</html>