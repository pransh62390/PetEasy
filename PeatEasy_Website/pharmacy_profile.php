<?php
    session_start();
    if(isset($_SESSION["active_user"]) == false)
        header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pharmacy Profile Page</title>
    <script src="js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
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

        /*$("#uid").blur(function() {
$(document).ready(function() {
var uidValue = $("#uid").val();
var url = "pharmacy_profile_ajax.php?uidName=" + uidValue;
$.get(url, function(response) {
alert(response);
});
});*/
        //=--=-=-==-==-=-=-===-=-=-
        /*$("#search").click(function() {
var user = $("#uid").val();
$.getJSON("pharmacy_profile_json_getch.php?uid=" + user, function(jsonAryResponse) {
if (jsonAryResponse.length == 0)
alert("Invalid ID");
else {
$("#uid").val(jsonAryResponse[0].uid);
$("#firm_name").val(jsonAryResponse[0].firmname);
$("#mobile").val(jsonAryResponse[0].mobile);
$("#address").val(jsonAryResponse[0].address);
$("#city").val(jsonAryResponse[0].city);
$("#licence").val(jsonAryResponse[0].licence);
$("#qrcode").prop("src", "uploads/" + jsonAryResponse[0].qrpic);
$("#hdnBox").val(jsonAryResponse[0].qrpic);
}
});
});

            $("#frm").submit(function(ev) {
                if (confirm("R U Sure?") == false)
                    ev.preventDefault();
                else
                    location.href = "citizen-dashboard.php";
            });
        });*/

        function doCheckUser() {
            $(document).ready(function() {
                var uidValue = $("#uid").val();
                var url = "pharmacy_profile_ajax.php?uidName=" + uidValue;
                $.get(url, function(response) {
                    if (response == "Already Bookeed") {
                        if (confirm("Do you Want to Update Data or not?") == false)
                            location.href = "citizen-dashboard.php";
                        else {
                            var user = $("#uid").val();
                            $.getJSON("pharmacy_profile_json_getch.php?uid=" + user, function(jsonAryResponse) {
                                if (jsonAryResponse.length == 0)
                                    alert("Invalid ID");
                                else {
                                    $("#uid").val(jsonAryResponse[0].uid);
                                    $("#firm_name").val(jsonAryResponse[0].firmname);
                                    $("#mobile").val(jsonAryResponse[0].mobile);
                                    $("#address").val(jsonAryResponse[0].address);
                                    $("#city").val(jsonAryResponse[0].city);
                                    $("#licence").val(jsonAryResponse[0].licence);
                                    if (jsonAryResponse[0].qrpic == "")
                                        $("#qrcode").prop("src", "pics/qr-code.png");
                                    else
                                        $("#qrcode").prop("src", "uploads/" + jsonAryResponse[0].qrpic);
                                    $("#hdnBox").val(jsonAryResponse[0].qrpic);
                                }
                            });
                            $('#send-btn').css("display", "none");
                            $('#update-btn').css("margin-left", "200px");
                        }
                    } else {
                        $('#update-btn').css("display", "none");
                        $('#send-btn').css("margin-left", "350px");
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
    <div class="container jumbotron">
        <h2>Pharmacy Profile</h2>
        <form action="pharmacy_profile_process.php" method="post" id="frm" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-lg-8">
                    <label for="uid">User Id</label>
                    <input type="text" class="form-control col-lg-12" name="uid" id="uid" value="<?php echo $_SESSION['active_user']?>" readonly>
                </div>
                <!--<div class="form-group col-lg-3">
    <label for="uid"> </label>
    <input type="button" class="btn btn-primary form-control col-lg-12" value="Search" id="search" name="btn" style="margin-top:7px;">
</div>-->
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="firm_name">Firm Name</label>
                    <input type="text" class="form-control col-lg-12" name="firm_name" id="firm_name">
                </div>
                <div class="form-group col">
                    <label for="mobile">Mobile No</label>
                    <input type="text" class="form-control col-lg-12" name="mobile" id="mobile">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="shop_address">Shop Address</label>
                    <input type="text" class="form-control col-lg-12" name="shop_address" id="shop_address">
                </div>
                <div class="form-group col">
                    <label for="city">City/Locality</label>
                    <input type="text" class="form-control col-lg-12" name="city" id="city">
                </div>
            </div>

            <div class="form-group form-row">
                <label for="licence">Licence No</label>
                <input type="text" class="form-control col-lg-12" name="licence" id="licence">
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="qrcode">Upload Qr Code</label>
                    <input type="file" name="qrcode" accept="image/*" onchange="showpreview(this,'qrcode');">
                </div>
                <div class="form-group col">
                    <input type="hidden" id="hdnBox" name="hdnBox">
                    <img class="form-control col-lg-12" id="qrcode" src="pics/qr-code.png" style="width:150px;height:150px;">
                </div>
            </div>

            <center>
                <div class="form-row mt-md-5">
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary form-control col-lg-12" id="send-btn" value="Send" name="btn">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary form-control col-lg-12" id="update-btn" value="Update" name="btn">
                    </div>
                </div>
            </center>
        </form>
    </div>
</body>

</html>
