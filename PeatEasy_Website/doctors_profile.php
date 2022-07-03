<?php
    session_start();
    if(isset($_SESSION["active_user"]) == false)
        header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctors Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<script src="js/angular.min.js"></script>-->
    <link rel="stylesheet" href="css/doctors_profile.css">
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
var url = "doctors_profile_ajax.php?uidName=" + uidValue;
$.get(url, function(response) {
alert(response);
});
});
//=--=-=-==-==-=-=-===-=-=-

$("#fetch").click(function() {
var user = $("#uid").val();
$.getJSON("doctors_profile_json_getch.php?uid=" + user, function(jsonAryResponse) {
if (jsonAryResponse.length == 0)
alert("Invalid ID");
else {
$("#uid").val(jsonAryResponse[0].uid);
$("#name").val(jsonAryResponse[0].name);
$("#mobile").val(jsonAryResponse[0].mobile);
$("#email").val(jsonAryResponse[0].email);
$("#address").val(jsonAryResponse[0].address);
$("#state").val(jsonAryResponse[0].state);
$("#city").val(jsonAryResponse[0].city);
$("#qualification").val(jsonAryResponse[0].qualification);
$("#exp").val(jsonAryResponse[0].exp);
$("#specialization").val(jsonAryResponse[0].spl);
$("#ppic").prop("src", "uploads/" + jsonAryResponse[0].ppic);
$("#hdnBox1").val(jsonAryResponse[0].ppic);
$("#docs").prop("src", "uploads/" + jsonAryResponse[0].docs);
$("#hdnBox2").val(jsonAryResponse[0].docs);
}
});
});
$("#frm").submit(function(ev) {
if (confirm("Are You Sure?") == false)
ev.preventDefault();
else
location.href = "citizen-dashboard.php";
});
});*/

        function doCheckUser() {
            $(document).ready(function() {
                var uidValue = $("#uid").val();
                var url = "doctors_profile_ajax.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    //alert(response);
                    if (response == "Already Bookeed") {
                        if (confirm("Do you Want to Update Data or not?") == false)
                            location.href = "citizen-dashboard.php";
                        else {
                            var user = $("#uid").val();
                            $.getJSON("doctors_profile_json_getch.php?uid=" + user, function(jsonAryResponse) {
                                if (jsonAryResponse.length == 0) {
                                    $('#update-btn').css("display", "none");
                                    $('#save-btn').css("margin-left", "350px");
                                } else {
                                    //alert(JSON.stringify(jsonAryResponse));
                                    $("#uid").val(jsonAryResponse[0].uid);
                                    $("#name").val(jsonAryResponse[0].name);
                                    $("#mobile").val(jsonAryResponse[0].mobile);
                                    $("#email").val(jsonAryResponse[0].email);
                                    $("#address").val(jsonAryResponse[0].address);
                                    $("#state").val(jsonAryResponse[0].state);
                                    $("#city").val(jsonAryResponse[0].city);
                                    $("#qualification").val(jsonAryResponse[0].qualification);
                                    $("#exp").val(jsonAryResponse[0].exp);
                                    $("#specialization").val(jsonAryResponse[0].spl);
                                    if (jsonAryResponse[0].ppic == "")
                                        $("#ppic").prop("src", "pics/user-pic.png");
                                    else
                                        $("#ppic").prop("src", "uploads/" + jsonAryResponse[0].ppic);
                                    $("#hdnBox1").val(jsonAryResponse[0].ppic);
                                    if (jsonAryResponse[0].certpic == "")
                                        $("#docs").prop("src", "pics/certificate-pic.png" + jsonAryResponse[0].certpic);
                                    else
                                        $("#docs").prop("src", "uploads/" + jsonAryResponse[0].certpic);
                                    $("#hdnBox2").val(jsonAryResponse[0].certpic);
                                    $('#save-btn').css("display", "none");
                                    $('#update-btn').css("margin-left", "200px");
                                }
                            });
                        }
                    } else {

                    }
                });
                $("#frm").submit(function(ev) {
                    if (confirm("Are You Sure?") == false)
                        ev.preventDefault();
                });
            });
        }

    </script>
</head>

<body onload="doCheckUser();">
    <?php
        include_once("basic-page.php")
    ?>
    <div class="container jumbotron">
        <h2>Doctors Profile</h2>
        <form action="doctors_profile_process.php" method="post" id="frm" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="uid">User Id</label>
                    <input type="text" class="form-control col-md-12" name="uid" id="uid" value="<?php echo $_SESSION['active_user']?>" readonly>
                </div>
                <!--<div class="form-group col-md-3">
    <label for="uid"> </label>
    <input type="button" class="btn btn-primary col-md-12" value="Fetch" id="fetch" name="btn" style="margin-top:7px;">
</div>-->
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="name">Name</label>
                    <input type="text" class="form-control col-md-12" name="name" id="name">
                </div>
                <div class="form-group col">
                    <label for="mobile">Mobile No</label>
                    <input type="text" class="form-control col-md-12" name="mobile" id="mobile">
                </div>
                <div class="form-group col">
                    <label for="email">Email Id</label>
                    <input type="email" class="form-control col-md-12" name="email" id="email">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control col-md-12" name="address" id="address">
                </div>
                <div class="form-group col-md-3">
                    <label for="state">State</label>
                    <input type="text" class="form-control col-md-12" name="state" id="state">
                </div>
                <div class="form-group col-md-3">
                    <label for="city">City/Locality</label>
                    <input type="text" class="form-control col-md-12" name="city" id="city">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="qualification">Qualification</label>
                    <input type="text" class="form-control col-md-12" name="qualification" id="qualification">
                </div>
                <div class="form-group col">
                    <label for="exp">Exp.(years)</label>
                    <input type="text" class="form-control col-md-12" name="exp" id="exp">
                </div>
                <div class="form-group col">
                    <label for="specialization">Specialization</label>
                    <input type="text" class="form-control col-md-12" name="specialization" id="specialization">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <input type="hidden" id="hdnBox1" name="hdnBox1">
                    <label for="ppic">Profile Pic</label>
                    <img class="form-control col-md-12" id="ppic" src="pics/user-pic.png" style="width:150px;height:150px;">
                    <input type="file" name="ppic" accept="image/*" onchange="showpreview(this,'ppic');">
                </div>
                <div class="form-group col">
                    <input type="hidden" id="hdnBox2" name="hdnBox2">
                    <label for="docs">Cerificate Proof</label>
                    <img class="form-control col-md-12" id="docs" src="pics/certificate-pic.png" style="width:150px;height:150px;">
                    <input type="file" name="docs" accept="image/*" onchange="showpreview(this,'docs');">
                </div>
            </div>

            <center>
                <div class="form-row mt-md-5">
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary form-control col-md-12" id="save-btn" value="Save" name="btn">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary form-control col-md-12" id="update-btn" value="Update" name="btn">
                    </div>
                </div>
            </center>
        </form>
    </div>
</body>

</html>
