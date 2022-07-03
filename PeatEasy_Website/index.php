<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
        include_once("basic-page.php");
    ?>
    <!--body of index page-->

    <div class="container jumbotron">
        <h2>Pets On Your Way</h2>

        <!--carousel-->
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pics/carousel-doctors.jpg" class="d-block w-100 hgt-75" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="pics/carousel-pharmacy.jpg" class="d-block w-100 hgt-75" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="pics/carousel-pets.jpg" class="d-block w-100 hgt-75" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container jumbotron">
        <center>
            <h2>Our Services</h2>
        </center>

        <div class="container father-srv mt-md-5">
            <div class="card child-cards-srv">
                <img src="pics/doctor.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Doctor, a call away</h5>
                        <p class="card-text">With 'PETS ON YOUR WAY', well qualified Veterinary doctors are now just a call away. So just Log in to our website and find City's best and experienced doctors.</p>
                    </center>
                </div>
            </div>

            <div class="card child-cards-srv">
                <img src="pics/pharmacy.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Pharmacy at your door step</h5>
                        <p class="card-text">We provide you with the nearest pharmacies information, whenever and whereever you need it. Now order vaccines and food supplies for your pets anytime.</p>
                    </center>
                </div>
            </div>

            <div class="card child-cards-srv">
                <img src="pics/pet-seller.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">MarketPlace for Pets</h5>
                        <p class="card-text">A stop destination for selling and buying pets online. Just list your Pets with us and you can reach potential buyers with our platform.</p>
                    </center>
                </div>
            </div>

            <div class="card child-cards-srv">
                <img src="pics/shelter-provider.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">A home away from home for your pets</h5>
                        <p class="card-text">List yourself as a shelter provider or come here and reach here for a another home for your pets While you are travelling and cannot take your pets with you. We have it all here.</p>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div class="container jumbotron">
        <center>
            <h2>Meet The Developers</h2>
        </center>

        <div class="container father-dev mt-md-5 row">
            <div class="col">
                <center>
                    <h4>Developed By</h4>

                    <div class="card child-cards-dev mt-sm-5">
                        <img src="pics/pransh_gupta.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Hi! I am <b>Pransh Gupta</b>, and I am currently studying in 2nd Year <b>CSE</b> at CGC, Landran. Please Contact <b>(+91 62390-38253)</b> gor further queries.</p>
                        </div>
                    </div>
                </center>
            </div>

            <div class="col">
                <center>
                    <h4>Under The Guidance Of</h4>

                    <div class="card child-cards-dev mt-sm-5">
                        <img src="pics/rajesh_k_bansal.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">This website has been developed under the guidance of <b>Mr. Rajesh K.Bansal</b>, 19 years of Experience in Teaching and CEO at <b>Banglore Co. Edu</b>, Bathinda.</p>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>

    <div class="container jumbotron">
        <h2>Contact Us</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.880733791611!2d74.95013941384303!3d30.21195128182163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1602499623767!5m2!1sen!2sin" width="300" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <center>
            <p class="mt-md-4"><b>copyright@peteasy</b></p>
        </center>
    </div>
</body>

</html>
