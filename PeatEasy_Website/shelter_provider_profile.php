<?php
    session_start();
    if(isset($_SESSION["active_user"]) == false)
        header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shelter Providers Profile page</title>
    <script src="js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/shelter_provider.js"></script>
    <script>
        function showpreview(file, Preview) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + Preview).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        /*$(document).ready(function() {
$("#uid").blur(function() {
var uidValue = $("#uid").val();
var url = "shelter_provider_profile_ajax.php?uidName=" + uidValue;
$.get(url, function(response) {
alert(response);
});
});
});*/

        function doCheckUser() {
            $(document).ready(function() {
                var uidValue = $("#uid").val();
                var url = "shelter_provider_profile_ajax.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    if (response == "Already Bookeed") {
                        location.href = "citizen-dashboard.php";
                    }
                });
                $("#frm").submit(function(ev) {
                    if (confirm("R U Sure?") == false)
                        ev.preventDefault();
                    else
                        location.href = "citizen-dashboard.php";
                });
            });
        }

    </script>
</head>

<body onload="doCheckUser();">
    <?php
        include_once("basic-page.php")
    ?>
    <div class="container jumbotron" style="margin-top:30px;">
        <h2>Shelter Provider</h2>
        <form action="shelter_provider_profile_process.php" method="post" id="frm" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col">
                    <label for="uid">User Id</label>
                    <input type="text" class="form-control col-md-12" name="uid" id="uid" value="<?php echo $_SESSION['active_user']?>" readonly>
                </div>
                <div class="form-group col">
                    <label for="cont_prsn">Contact Person</label>
                    <input type="text" class="form-control col-md-12" name="cont_prsn" id="cont_prsn">
                </div>
                <div class="form-group col">
                    <label for="cont_no">Contact No.</label>
                    <input type="text" class="form-control col-md-12" name="cont_no" id="cont_no">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control col-md-12" name="address" id="address">
                </div>
                <div class="form-group col-md-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control col-md-12" name="city" id="city">
                </div>
                <div class="form-group col-md-3">
                    <label for="max_days">Max Days</label>
                    <input type="text" class="form-control col-md-12" name="max_days" id="max_days">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="slct_pets">Select Pets</label>
                    <input type="text" class="form-control col-md-12" id="slct_pets">
                </div>
                <div class="form-group col">
                    <label for="slctd_pets">Selected pets</label>
                    <input type="text" class="form-control col-md-12" name="slctd_pets" id="slctd_pets">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="other_info">Other Imformation</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <textarea name="other_info" id="other_info" cols="100" rows="5"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="pic1">Pic-1</label>
                    <img class="form-control col-md-12" id="pic1" src="pics/pets.png" style="width:150px;height:150px;">
                    <input type="file" name="pic1" accept="image/*" onchange="showpreview(this,'pic1');">
                </div>
                <div class="form-group col">
                    <label for="pic2">Pic-2</label>
                    <img class="form-control col-md-12" id="pic2" src="pics/animal-shelter.png" style="width:150px;height:150px;">
                    <input type="file" name="pic2" accept="image/*" onchange="showpreview(this,'pic2');">
                </div>
                <div class="form-group col">
                    <label for="pic3">Pic-3</label>
                    <img class="form-control col-md-12" id="pic3" src="pics/animals-with-humans.png" style="width:150px;height:150px;">
                    <input type="file" name="pic3" accept="image/*" onchange="showpreview(this,'pic3');">
                </div>
            </div>

            <center>
                <div class="form-row">
                    <div class="form-group col mt-md-5">
                        <input type="submit" class="btn btn-primary form-control col-md-2" value="Upload" name="btn">
                    </div>
                </div>
            </center>
        </form>
    </div>
</body>

</html>
