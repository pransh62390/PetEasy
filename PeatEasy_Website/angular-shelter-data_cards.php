<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fetch Shelter Providers page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        var app = angular.module("myModule", []);
        app.controller("myController", function($scope, $http) {
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
            $scope.fetchedPets;
            $scope.doFetchCities = function(page, tobefetched) {
                $http.get("angular-fetch-cities.php?page=" + page + "&tobefetched=" + tobefetched).then(okFxn, notOkFxn);

                function okFxn(response) {
                    if (tobefetched == 'city')
                        $scope.fetchedCities = response.data;
                    else
                    if (tobefetched == 'selpets') {
                        $scope.fetchedPets = response.data;
                        document.querySelector('#newcombo').style.display = 'none';
                        //alert(JSON.stringify($scope.fetchedPets));
                    }
                }

                function notOkFxn(response) {
                    alert(response.data);
                }
            }

            $scope.selectedCity = 'none';
            $scope.selectedPet = 'none';

            $scope.fetchDoctors = function(page) {
                $http.get("angular-search-persons.php?page=" + page + "&city=" + $scope.selectedCityValue + "&pet=" + $scope.selectedPetValue).then(okFxn, notOkFxn);

                function okFxn(response) {
                    $scope.jsonArray = response.data;
                    //alert(JSON.stringify($scope.jsonArray));
                }

                function notOkFxn(response) {
                    alert(response.data);
                }
            }
        });

        app.filter('customSplitString', function() {
            return function(input) {
                var arr = input.split(',');
                return arr;
            };
        });

        $(document).ready(function() {
            $("#abc").blur(function() {
                var arr = [];
                var options = $('.options');
                for (var i = 0; i < options.length; i++) {
                    var x = options.eq(i);
                    arr.push(x.val());
                }

                function doAddNew(item) {
                    var itemss = $("#newpets");
                    var opt = document.createElement("option");
                    opt.text = item;
                    opt.value = item;
                    itemss.append(opt);
                }

                var newarr = [...new Set(arr)];
                $('#oldcombo').css("display", "none");
                $('#newcombo').css("display", "block");
                for (var i = 0; i < newarr.length; i++) {
                    doAddNew(newarr[i]);
                }

            });

        });

    </script>
</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchCities('shelter', 'city');">
    <?php
        include_once("basic-page.php")
    ?>
    <div class="container jumbotron">
        <h2>Fetch Shelter Provider</h2>
        <center>
            <label for="cities">
                <h4>City</h4>
            </label>

            <input id="abc" list="cities" ng-model="selectedCityValue" ng-init="doFetchCities('shelter', 'selpets');">
            <datalist id="cities" ng-model="selectedCity">
                <select id="city">
                    <option value="none">
                    <option value={{obj.city}} ng-repeat="obj in fetchedCities">
                </select>
            </datalist>

            <div id="oldcombo">
                <label for="allpets">
                    <h4>Select Pet</h4>
                </label>

                <input id="allpets" list="pets" ng-model="selectedPetValue">
                <datalist id="pets" ng-model="selectedPet">
                    <select id="pet" ng-repeat="pet in fetchedPets">
                        <option class="options" value="none">
                            <!--<option value={{obj.selpets}} ng-repeat="pet in fetchedPets">-->
                        <option class="options" value={{elem}} ng-repeat="elem in (pet.selpets | customSplitString)">
                    </select>
                </datalist>
            </div>

            <div id="newcombo">
                <label for="allnewpets">
                    <h4>Select Pet</h4>
                </label>

                <input id="allnewpets" list="newpets" ng-model="selectedPetValue">
                <datalist id="newpets">
                </datalist>
            </div>

            <button class="btn btn-primary" ng-click="fetchDoctors('shelter');">Fetch All</button>

            <div class="container">
                <div class="row">
                    <div class="col-md-3" ng-repeat="obj in jsonArray">
                        <div class="card">
                            <img class="card-img-top" src="uploads/{{obj.pic1}}" height="100" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><b>User id:</b> {{obj.uid}}</h5>
                                <p class="card-text"><b>Person Name:</b> {{obj.pname}}</p>
                                <p class="card-text"><b>Contact:</b> {{obj.contact}}</p>
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
                                                        <img src="uploads/{{selObj.pic2}}" width="100" height="100" alt="">
                                                    </div>
                                                    <div class="col">
                                                        <img src="uploads/{{selObj.pic3}}" width="100" height="100" alt="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col"><b>City</b></div>
                                                    <div class="col">{{selObj.city}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col"><b>Address</b></div>
                                                    <div class="col">{{selObj.address}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col"><b>Max Days</b></div>
                                                    <div class="col">{{selObj.max_days}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col"><b>Selected Pets</b></div>
                                                    <div class="col">{{selObj.selpets}}</div>
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
        </center>
    </div>
</body>

</html>
