<?php
error_reporting(E_ALL);
    if (!isset($_POST['submit'])) {
?>

<html>
    <head>
        <title>Form test</title>
    </head>
    <body>
        <form action="" method="post">
            Adder cellphone number: <br>
            <input type="text" name="adder_id"><br><br>
            Cellphone number: <br>
            <input type="text" name="addee_id"><br>
            First name: <br>
            <input type="text" name="first_name"><br>
            Last name: <br>
            <input type="text" name="last_name"><br>
            Mail address: <br>
            <input type="text" name="mail_addr"><br>
            Address: <br>
            <input type="text" name="address"><br>
            City: <br>
            <input type="text" name="city"><br>
            Zip code: <br>
            <input type="text" name="zip_code"><br>
            Country: <br>
            <input type="text" name="country">
            <input type="submit" name="submit">
        </form>
    </body>
</html>
<?php } else {
        $servername = "localhost";
        $username = "root";
        $password = "yCXYSdd8hpYpEzNjHRdq^@Tr8ZPscchS";

        if (isset($_POST['adder_id']) && isset($_POST['addee_id']))
        {
            $adder_id = $_POST['adder_id'];
            $addee_id = $_POST['addee_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $mail_addr = $_POST['mail_addr'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zip_code = $_POST['zip_code'];
            $country = $_POST['country'];

            $conn = new mysqli($servername, $username, $password);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            echo "Connection retrieval succeeded!";

            $conn->select_db("contactify");

            /* return name of current default database */
            if ($result = $conn->query("SELECT DATABASE()")) {
                $row = $result->fetch_row();
                printf("Default database is %s.\n", $row[0]);
                $result->close();
            }

            // Add sth. to db
            $push = "INSERT INTO users(email, first_name, last_name, name_title, address,
zip_code, city, country, company) VALUES ('$mail_addr', '$first_name', '$last_name', 'Dr.', '$address', '$zip_code',
'$city', '$country', 'Siemens');";


            echo $push;

            $db_erg = mysqli_query($conn, $push)
            or die("Anfrage fehlgeschlagen: " . mysqli_error());
            $conn->close();
            echo "Connection closed";

        }
        else
        {
            echo "You need to specify two cellphone numbers!";
        }

    } ?>

