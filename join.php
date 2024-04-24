<?php
// session_start();
include ("header.php");
// include("connection.php");
require ("connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIMA Media - Latest Newsin Hindi</title>
    <link rel="stylesheet" href="id.css">
    <link rel="stylesheet" href="cutom.css">
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>


<body>


    <div class="dj">
        <img src="aimamediafoundation.png" alt="" id="img">
    </div>

    <form action="" method="post" class="dj" enctype="multipart/form-data">
        <table id="w50">



            <tr>
                <td class="center">
                    <u>MEMBERSHIP FORM</u>
                    <p id="pt10">(Typing In English Alphabet Only)</p>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="mobile"><b>Mobile*</b></label>

                </td>
            </tr>

            <tr>
                <td><input type="number" id="mobile" name="ph" placeholder="Plesae enter yourphone number" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="name"><b>Full Name*</b></label>

                </td>
            </tr>

            <tr>
                <td><input type="text" id="name" name="username" placeholder="Plesae enter your full name" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="fname"><b>Password*</b></label>

                </td>
            </tr>
            <tr>
                <td><input type="password" id="name" name="password" placeholder="Plesae enter your password" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="fname"><b>Fathers Name*</b></label>

                </td>
            </tr>

            <tr>
                <td><input type="text" id="fname" name="fname" placeholder="Plesae enter your father name" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="occu"><b>Occupation*</b></label>

                </td>
            </tr>

            <tr>
                <td><input type="text" id="occu" name="occupation" placeholder="Plesae enter occupation" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="add"><b>Address*</b></label>

                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" id="add" name="address" placeholder="Plesae enter your address" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="state"><b>State*</b></label>

                </td>
            </tr>

            <tr>
                <td><select name="state" id="state" onchange="getstate()">
                        <?php
                            $stateAbbrivations = [
                                '--select--' => "--select--",
                                'Andhra Pradesh' =>"Andhra Pradesh",
                                'Arunachal Pradesh' =>"Arunachal Pradesh",
                                // "Assam",
                                // "Bihar",
                                // "Chhattisgarh",
                                // "Goa",
                                // "Gujarat",
                                // "Haryana",
                                // "Himachal Pradesh",
                                // "Jammu and Kashmir",
                                // "Jharkhand",
                                // "Karnataka",
                                // "Kerala",
                                // "Madhya Pradesh",
                                // "Maharashtra",
                                // "Manipur",
                                // "Meghalaya",
                                // "Mizoram",
                                // "Nagaland",
                                // "Odisha",
                                // "Punjab",
                                // "Rajasthan",
                                // "Sikkim",
                                // "Tamil Nadu",
                                // "Telangana",
                                // "Tripura",
                                // "Uttarakhand",
                                // "Uttar Pradesh",
                                // "West Bengal",
                                // "Andaman and Nicobar Islands",
                                // "Chandigarh",
                                // "Dadra and Nagar Haveli",
                                // "Daman and Diu",
                                // "Delhi",
                                // "Lakshadweep",
                                // "Puducherry"
                            ];
                            foreach ($stateAbbrivations as $stateboxval) {
                                echo "<option>$stateboxval</option>";
                            }
                        ?>
                    </select>
                    <!-- <input type="text" id="state" name="state" placeholder="Plesae select" required> -->

                </td>
                <script>
                    function getstate(){
                        var stateval=document.getElementById('state').value;
                        alert(stateval);
                        // data is going on stateval.php form here
                        $.post("stateval.php",{
                            action:"statevalget",
                            statename:stateval
                        },function (data) {
                            // alert(data);
                            $("#cityval").html(data);
                        })
                    }
                </script>
            </tr>
            <tr>
                <td><label for="">city</label></td>
                
            </tr>

            <tr>
            <td>
                    <select name="city" id="cityval">
                        <option value="">--select--</option>
                    </select>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="town"><b>Town*</b></label>

                </td>
            </tr>

            <tr>
                <td><input type="text" id="town" name="town" placeholder="Plesae enter your town" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="email"><b>Email*</b></label>

                </td>
            </tr>

            <tr>
                <td><input type="email" id="email" name="email" placeholder="Plesae enter your email" required>
                </td>

            </tr>
            <tr>
                <td>
                    <label for="Profile Photo"><b>Profile Photo*</b></label>

                </td>
            </tr>
            <tr>
                <td class="dj">
                    <input type="file" name="image" id="Profile Photo">
                </td>
            </tr>
            <tr>
                <td class="dj">
                    <input type="submit" id="nextbtn" name="nextbtn" value="Next" class="nextbtn">
                </td>
            </tr>

            </div>
        </table>

    </form>


    <?php
    include ("footer.php");

    if (isset ($_POST['nextbtn'])) {
        $mobile = $_POST['ph'];
        $name = $_POST['username'];
        $password = $_POST['password'];
        $father = $_POST['fname'];
        $occupation = $_POST['occupation'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $town = $_POST['town'];
        $email = $_POST['email'];
        $image = $_FILES['image']['name'];
        $pathname = $_FILES['image']['tmp_name'];
        echo $image . "This is image name" . $pathname;
        $addressim = '../Aima Media/profileimage/' . $image;
        if ($image) {
            move_uploaded_file($pathname, $addressim);
            echo "image upload";
        } else {
            echo "errorr";
        }
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        $data = $conn->query("INSERT INTO `userdata`( `mobile`, `name`,`password`, `fathername`, `occupation`, `address`, `state`, `city`, `town`, `email`,`profilephoto`) VALUES
 ('$mobile','$name','$password','$father','$occupation','$address','$state','$city','$town','$email','$image')");

        if ($data == true) {
            echo "new record created";
            // $_SESSION['mobile'] = $mobile;
        } else {
            echo "bad";
        }
    }

    ?>
</body>

</html>