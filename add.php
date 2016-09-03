<?php
error_reporting(E_ALL);
    if (!isset($_POST['submit'])) {
?>
<div class="modal fade" id="register-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Contact</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="post" id="addContact">
            <div class="form-group">
                <label for="add-form-comp">Company</label>
                <input type="text" class="form-control" id="add-form-comp" placeholder="Company" name="company">
            </div>
            <div class="form-group">
                <label for="add-form-first-name">Name</label><select class="form-control" name="name_title">
                    <option>Mr.</option>
                    <option>Mrs.</option>
                    <option>Ms.</option>
                    <option>Dr.</option>
                    <option>Prof. Dr.</option>
                </select>
                <br>
                <input type="text" class="form-control" id="add-form-first-name" placeholder="First" name="first_name"><br>
                <input type="text" class="form-control" id="add-form-last-name" placeholder="Last" name="last_name">
            </div>
            <div class="form-group">
               <label for="add-form-id">ID</label>
                <input type="text" class="form-control" id="add-form-first-name" placeholder="Adder" name="adder_id"><br>
                <input type="text" class="form-control" id="add-form-last-name" placeholder="Addee" name="addee_id">
            </div>
            <div class="form-group">
                <label for="add-form-addr">Address</label>
                <input type="text" class="form-control" id="add-form-addr" placeholder="Address Line" name="address"><br>
                <input type="text" class="form-control" id="add-form-postal" placeholder="Zip Code" name="zip_code"><br>
                <input type="text" class="form-control" id="add-form-addr" placeholder="City" name="city"><br>
                <input type="text" class="form-control" id="add-form-addr" placeholder="Country" name="country">
            </div>
            <div class="form-group">
                <label for="add-form-user">E-Mail</label>
                <input type="email" class="form-control" id="add-form-user" name="mail_addr">
            </div>  
            <button type="submit" class="btn btn-success pull-left" name="submit">Add</button>
            <button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancel
            </button>
        </form>
        <br>
      </div>
    </div>
  </div>
</div>

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

