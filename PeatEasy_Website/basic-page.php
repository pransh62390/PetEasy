<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/basic-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
            $("#signup_uid").blur(function() {
                var uidValue = $("#signup_uid").val();
                var url = "signup_ajax.php?uidName=" + uidValue + "&btnName=blur";
                $.get(url, function(response) {
                    alert(response);
                });
            });

            $("#signup").click(function() {
                var uid = $("#signup_uid").val();
                var email = $("#semail").val();
                var password = $("#signup_password").val();
                var mobile = $("#smobile").val();
                var type = $("#type").val();

                var url = "signup_ajax.php?uidName=" + uid + "&emailName=" + email + "&pwdName=" + password + "&mobileName=" + mobile + "&typeName=" + type + "&btnName=click";
                $.get(url, function(response) {
                    alert(response);
                });
            });

            $(document).ready(function() {
                $("#login").click(function() {
                    var uid = $("#login_uid").val();
                    var password = $("#login_password").val();

                    var url = "login_ajax.php?uidName=" + uid + "&pwdName=" + password;
                    $.get(url, function(response) {
                        if (response == "doctor")
                            location.href = "doctors_profile.php";
                        else
                        if (response == "shelter")
                            location.href = "shelter_provider_profile.php";
                        else
                        if (response == "pharmacy")
                            location.href = "pharmacy_profile.php";
                        else
                        if (response == "citizen")
                            location.href = "citizen-dashboard.php";
                        else
                            alert(response);
                    });
                });

                $("#forgot").click(function() {
                    var uid = $('#fuid').val();
                    var url = "login_ajax.php?uidName=" + uid + "&pwdName=none" + "&msgName=forgot_password";
                    $.get(url, function(response) {
                        alert(response);
                    });
                });
            });

            $(".eye").mousedown(function() {
                $(".pwd").prop("type", "text");
            });

            $(".eye").mouseup(function() {
                $(".pwd").prop("type", "password");
            });
        });

    </script>
</head>

<body>
    <!--nav bar-->
    <div class="container">
        <div class="fixed-top">
            <nav class="navbar navbar-expand-md" id="nav-bar">
                <a class="navbar-brand" href="index.php"><img src="pics/logo.jpg" id="logo"></a>
                <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <?php
                            if(count($_SESSION) == 0)
                                echo "<input type='button' data-toggle='modal' value='Signup' data-target='#signup_modal' class='btn-modals'>";
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if(count($_SESSION) == 0)
                                echo '<input type="button" data-toggle="modal" value="Login" data-target="#login_modal" class="btn-modals">';
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if(count($_SESSION) != 0)
                                echo '<a href="logout.php" class="links">LogOut</a>';
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!--signup form-->

    <div class="container">
        <div class="modal fade" id="signup_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content mdl-bg">
                    <div class="modal-body">
                        <form action="" id="signupfrm">
                            <div class="signup_form modal-header">
                                <h2 class="modal-title" style="margin:auto" id="exampleModalLabel">Signup</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="form-group signup_form col-md-11">
                                <label for="signup_uid">User Name</label>
                                <input type="text" class="form-control" id="signup_uid">
                            </div>
                            <div class="form-group signup_form col-md-11">
                                <label for="semail">Email address</label>
                                <input type="email" class="form-control" id="semail">
                            </div>
                            <div class="form-row signup_form">
                                <div class="form-group col-md-11">
                                    <label for="signup_password">Password</label>
                                    <input type="password" class="form-control pwd" id="signup_password">
                                </div>
                                <div class="form-group col-md-1">
                                    <p></p>
                                    <i id="eye" class="fa fa-eye eye eye-btn" aria-hidden="true" style="cursor:pointer;"></i>
                                </div>
                            </div>
                            <div class="form-group signup_form col-md-11">
                                <label for="smobile">Mobile</label>
                                <input type="text" class="form-control" id="smobile">
                            </div>
                            <div class="form-group signup_form">
                                <label for="type">Chose Type</label>
                                <select name="type" id="type">
                                    <option value="none">Select</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="pharmacy">Pharmacy</option>
                                    <option value="shelter">Shelter</option>
                                    <option value="citizen">Citizen</option>
                                </select>
                            </div>
                            <div class="signup_form modal-footer">
                                <input type="button" class="btn btn-primary" style="margin:auto" id="signup" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--login form-->

    <div class="container">
        <div class="modal fade" id="login_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content mdl-bg">
                    <div class="modal-body">
                        <form action="">
                            <div class="modal-header signup_form">
                                <h2 class="modal-title" style="margin:auto" id="exampleModalLabel">Login</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="form-group signup_form col-md-11">
                                <label for="login_uid">User Name/Email</label>
                                <input type="text" class="form-control" id="login_uid">
                            </div>
                            <div class="form-group">
                                <div class="form-row signup_form">
                                    <div class="form-group col-md-11">
                                        <label for="login_password">Password</label>
                                        <input type="password" class="form-control pwd" id="login_password">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <p> </p>
                                        <i id="eye" class="fa fa-eye eye eye-btn" aria-hidden="true" style="cursor:pointer;"></i>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <input type='button' data-toggle='modal' value='Forgot Password' data-target='#forgot_password' style="color:red;text-decoration:underline;font-size:10px;" class='btn-modals ml-4'>
                                </div>
                            </div>
                            <div class="modal-footer signup_form">
                                <input type="button" class="btn btn-primary" style="margin:auto" id="login" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="forgot_password" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="fuid">Enter Uid</label>
                                <input type="text" id="fuid" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type='button' class="btn btn-primary" id="forgot" value='Sms Password'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
