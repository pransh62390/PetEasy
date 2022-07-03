<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Citizens Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <link rel="stylesheet" href="css/citizen-dashboard.css">
    <script>
        $(document).ready(function() {
            $("#uid").blur(function() {
                var uidValue = $("uid").val();
                var url = "posts_ajax.php?uidName=" + uidValue + "&btnName=blur";
                $.get(url, function(response) {
                    alert(response);
                });
            });

            $("#addpost").click(function() {
                var uid = $("#uid").val();
                var contprsn = $("#contact-person").val();
                var contno = $("#contact-no").val();
                var address = $("#address").val();
                var pets = $("#pets").val();
                var info = $("#info").val();

                var url = "posts_ajax.php?uidName=" + uid + "&contprsnName=" + contprsn + "&contnoName=" + contno + "&addressName=" + address + "&petsName=" + pets + "&infoName=" + info + "&btnName=click";
                $.get(url, function(response) {
                    alert(response);
                });
            });
        });

    </script>
</head>

<body ng-app="">
    <?php
        include_once("basic-page.php")
    ?>
    <div class="container jumbotron">
        <h2>Citizen DashBoard</h2>
        <div class="container father mt-md-5">
            <div class="card child-cards">
                <img src="pics/doctor.png" class="card-img-top" alt="">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">
                            <b>Doctors</b>
                        </h5>
                        <p class="card-text">If you want to search <b>Doctor</b> near you click on the button below.</p>
                        <a href="angular-doctors-data_cards.php"><button type="button" class="btn btn-primary">Find Doctors</button></a>
                    </center>
                </div>
            </div>

            <div class="card child-cards">
                <img src="pics/pharmacy.png" class="card-img-top" alt="">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">
                            <b>Pharmacy</b>
                        </h5>
                        <p class="card-text">If you want to search <b>Pharmacy</b> near you click on the button below.</p>
                        <a href="angular-pharmacy-data_cards.php"><button type="button" class="btn btn-primary">Search Pharmacy</button></a>
                    </center>
                </div>
            </div>

            <div class="card child-cards">
                <img src="pics/pet-seller.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">
                            <b>Sell Pets</b>
                        </h5>
                        <p class="card-text mt-sm-3">If you want to <b>Sell Pets</b> click on the button below.</p>
                        <button type="button" class="btn btn-primary mt-sm-3" data-toggle="modal" data-target="#sellPets">Sell Pets</button>
                    </center>
                </div>
            </div>

            <div class="card child-cards">
                <img src="pics/shelter-provider.png" class="card-img-top" alt="">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">
                            <b>Shelter Provider</b>
                        </h5>
                        <p class="card-text">If you want to search <b>Shelter Provider</b> near you click on the button below.</p>
                        <a href="angular-shelter-data_cards.php"><button type="button" class="btn btn-primary">Shelter Provider</button></a>
                    </center>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="sellPets" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="row">
                                <div class="formgroup col">
                                    <label for="name">Uid</label>
                                    <input type="text" class="form-control col-md-12" id="uid">
                                </div>
                            </div>
                            <div class="row">
                                <div class="formgroup col">
                                    <label for="name">Contact Person</label>
                                    <input type="text" class="form-control col-md-12" id="contact-person">
                                </div>
                                <div class="formgroup col">
                                    <label for="name">Contact No</label>
                                    <input type="text" class="form-control col-md-12" id="contact-no">
                                </div>
                            </div>
                            <div class="row">
                                <div class="formgroup col">
                                    <label for="name">Address</label>
                                    <input type="text" class="form-control col-md-12" id="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="formgroup col">
                                    <label for="name">Pet Want to Sell</label>
                                    <input type="text" class="form-control col-md-12" id="pets">
                                </div>
                            </div>
                            <div class="row">
                                <div class="formgroup col">
                                    <label for="name">Info</label>
                                    <input type="text" class="form-control col-md-12" id="info">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="addpost">Add Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
