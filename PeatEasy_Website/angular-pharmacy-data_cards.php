<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fetch Pharmacies Page</title>
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
                    //alert(JSON.stringify($scope.fetchedCities));
                }

                function notOkFxn(response) {
                    alert(response.data);
                }
            }

            $scope.selectedCity = 'none';

            $scope.fetchDoctors = function(page) {
                //alert($scope.selectedValue);
                $http.get("angular-search-persons.php?page=" + page + "&city=" + $scope.selectedValue).then(okFxn, notOkFxn);

                function okFxn(response) {
                    $scope.jsonArray = response.data;
                    //alert(JSON.stringify($scope.jsonArray));
                }

                function notOkFxn(response) {
                    alert(response.data);
                }
            }
        });

    </script>
</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchCities('pharmacy', 'city');">
    <?php
        include_once("basic-page.php")
    ?>
    <div class="container jumbotron">
        <h2>Fetch Pharmacys</h2>
        <center>
            <label for="cities">
                <h4>City</h4>
            </label>

            <input list="cities" ng-model="selectedValue">
            <datalist id="cities" ng-model="selectedCity">
                <select id="city" ng-model="selectedCity">
                    <option value="none">
                    <option value={{obj.city}} ng-repeat="obj in fetchedCities">
                </select>
            </datalist>
            <button class="btn btn-primary" ng-click="fetchDoctors('pharmacy');">Fetch All</button>

            <div class="container">
                <div class="row">
                    <div class="col-md-3" ng-repeat="obj in jsonArray">
                        <div class="card">
                            <img class="card-img-top" src="uploads/{{obj.qrpic}}" height="100" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">User id:{{obj.uid}}</h5>
                                <p class="card-text"><b>Firm Name:</b> {{obj.firmname}}</p>
                                <p class="card-text"><b>Mobile:</b> {{obj.mobile}}</p>
                                <p class="card-text"><b>Address:</b> {{obj.address}}</p>
                                <p class="card-text"><b>City:</b> {{obj.city}}</p>
                                <p class="card-text"><b>Licence:</b> {{obj.licence}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</body>

</html>
