App.controller("conversionMessage",
    [
        '$scope',
        'CurrencyMessages',
    function ($scope, CurrencyMessages) {

        $scope.currency.doClick = function(){
            CurrencyMessages.save($scope.currency);
        }


}]);