App.controller("currencyController", ['$scope', function ($scope) {
    $scope.currency = ['EUR', 'JEN', 'HUF'];
    $scope.$watch('currency.to', function (newValue, oldValue) {
        if (newValue != oldValue) {
            $scope.$emit('selectedCurrencyTo', {currencyTo: newValue});
        }
    });
    $scope.$watch('currency.from', function (newValue, oldValue) {
        if (newValue != oldValue) {
            $scope.$emit('selectedCurrencyFrom', {currencyFrom: newValue});
        }
    });


}]);