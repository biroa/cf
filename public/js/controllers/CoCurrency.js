App.controller("currencyController", [
    '$scope',
    'Currency',
    function ($scope, Currency) {

        $scope.currencies = new Currency();
        //$scope.currency = ['EUR', 'JEN', 'HUF'];
        $scope.currency = [];
        $scope.getData = function ($scope) {
            $scope.currencyResp = $scope.currencies.$query();
            $scope.currencyResp.then(function (response) {
                $scope.currencyData = response.SUCCESS;
                for (i in $scope.currencyData) {
                    $scope.currency.push($scope.currencyData[i].currency_code);
                }
                //console.log($scope.currency);
            });
        };

        if ($scope.currency.length == 0) {
            $scope.getData($scope);
        }


    }]);