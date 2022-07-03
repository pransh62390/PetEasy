<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fetch Doctors Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        var module = angular.module("myModule", []);
        module.controller("myController", function($scope, $http) {
            $scope.jsonArray = [];
            $scope.fetchJsonData = function(page) {
                loadJson(page);
            }

            function loadJson(page) {
                $http.get("angular-fetch-all-users.php?page=" + page).then(okFxn, notOkFxn);

                function okFxn(response) {
                    $scope.jsonArray = response.data;
                }

                function notOkFxn(response) {
                    alert(response.data);
                }
            }

            $scope.selObj;
            $scope.showDetails = function(index) {
                $scope.selObj = $scope.jsonArray[index];
            }

            $scope.fetchedCities;
            $scope.doFetchCities = function(page, tobefetched) {
                $http.get("angular-fetch-cities.php?page=" + page + "&tobefetched=" + tobefetched).then(okFxn, notOkFxn);

                function okFxn(response) {
                    $scope.fetchedCities = response.data;
                }

                function notOkFxn(response) {
                    alert(response.data);
                }
            }

            $scope.selectedCity = 'none';

            $scope.fetchDoctors = function(page) {
                $http.get("angular-search-persons.php?page=" + page + "&city=" + $scope.selectedValue).then(okFxn, notOkFxn);

                function okFxn(response) {
                    $scope.jsonArray = response.data;
                }

                function notOkFxn(response) {
                    alert(response.data);
                }
            }
            /*
            <i class="fa fa-heart-o fa-1x" class="favourite" aria-hidden="true"></i>
            */
        });

        $(document).ready(function() {
            $('.favourite').click(function() {
                $.('.icon').eq(this).addClass('fa-heart')
                $.('.icon').eq(this).removeClass('fa-heart-o')
            });

            $('.favourite').click(function() {
                $.('.icon').eq(this).addClass('fa-heart-o')
                $.('.icon').eq(this).removeClass('fa-heart')
            });
        });

    </script>
</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchCities('doctors', 'city');">
    <?php
        include_once("basic-page.php")
    ?>
    <div class="container jumbotron">
        <h2>Fetch Doctors</h2>
        <center>
            <label for="cities">
                <h4>City</h4>
            </label>

            <input list="cities" ng-model="selectedValue">
            <datalist id="cities" ng-model="selectedCity">
                <select id="city">
                    <option value="none">
                    <option value={{obj.city}} ng-repeat="obj in fetchedCities">
                </select>
            </datalist>
            <button class="btn btn-primary" ng-click="fetchDoctors('doctors');">Fetch All</button>

            <div class="container">
                <div class="row">
                    <div class="col-md-4" ng-repeat="obj in jsonArray">
                        <div class="card my-card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="card-img-top my-card-pic" src="uploads/{{obj.ppic}}" height="100" alt="Card image cap">
                                    <!--<i class="fa fa-heart fa-lg" aria-hidden="true"></i>-->
                                </div>
                                <div class="col favourite">
                                    <i class="fa fa-heart-o fa-lg mt-5 ml-md-5 icon" aria-hidden="true"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>User id:</b> {{obj.uid}}</h5>
                                    <p class="card-text"><b>Name:</b> {{obj.name}}</p>
                                    <p class="card-text"><b>Mobile:</b> {{obj.mobile}}</p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#details" ng-click="showDetails($index);">Details</button>
                                    <div class="modal fade" id="details" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="uploads/{{selObj.ppic}}" width="100" height="100" alt="">
                                                        </div>
                                                        <div class="col">
                                                            <img src="uploads/{{selObj.certpic}}" width="100" height="100" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"><b>Email</b></div>
                                                        <div class="col">{{selObj.email}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"><b>Address</b></div>
                                                        <div class="col">{{selObj.address}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"><b>State</b></div>
                                                        <div class="col">{{selObj.state}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"><b>City</b></div>
                                                        <div class="col">{{selObj.city}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"><b>Qualification</b></div>
                                                        <div class="col">{{selObj.qualification}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"><b>Experience</b></div>
                                                        <div class="col">{{selObj.exp}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"><b>Specialization</b></div>
                                                        <div class="col">{{selObj.spl}}</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</body>

</html>
