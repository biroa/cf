/**
 * Convert the stored default yyyy-mm-dd H:i:s date to the
 * expected format
 */
App.filter('dateMod', function () {

    var monthNames = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec"
    ];

    return function (input) {
        var date = new Date(input);
        var tbc = 1;
        var newYear = date.getFullYear().toString().substr(2, 2);
        var monthIndex = date.getMonth() + tbc;
        var newMonth = parseInt(date.getMonth() + tbc) < 10 ? ("0" + (date.getMonth() + tbc)).slice(-2) : (date.getMonth() + tbc);
        var newDay = ("0" + (date.getDate())).slice(-2);
        var newHours = ("0" + (date.getHours())).slice(-2);
        var newMinutes = ("0" + (date.getMinutes())).slice(-2);
        var newSeconds = ("0" + (date.getSeconds())).slice(-2);
        return newDay + '-' + monthNames[monthIndex].toUpperCase() + '-' + newYear + ' ' + newHours + ':' + newMinutes + ':' + newSeconds;
    }
});

App.controller("conversionMessage",
    [
        '$scope',
        '$filter',
        '$timeout',
        'CurrencyMessages',
        function ($scope, $filter, $timeout, CurrencyMessages) {
            $scope.messageData = {};

            $scope.currencyMessage = new CurrencyMessages();
            /**
             * Get conversion message data using
             * CurrencyMessages model
             * @param $scope
             */
            $scope.getData = function($scope){
                $scope.messages = $scope.currencyMessage.$query();
                $scope.messages.then(function (response) {
                    $scope.messageData = response.SUCCESS;
                });
            };

            $scope.getData($scope);

            /**
             * save new message into the database
             */
            $scope.saveNewConversionMsg = function () {
                $scope.cm = new CurrencyMessages();
                $scope.cm.timePlaced = $filter('dateMod')(new Date());
                $scope.cm.userId = userID;
                $scope.cm.currencyFrom = $scope.currencyMessage.currencyFrom;
                $scope.cm.currencyTo = $scope.currencyMessage.currencyTo;
                $scope.cm.rate = $scope.currencyMessage.rate;
                $scope.cm.amountBuy = $scope.currencyMessage.amountBuy;
                $scope.cm.amountSell = $scope.currencyMessage.amountSell;
                $scope.cm.$save(function () {
                    //We retrieve newly inserted data 2 seconds after a successful save
                    setTimeout(function () {
                        $scope.$apply(function () {
                            $scope.getData($scope);
                        });
                    }, 2000);

                }, function (error) {
                    console.log($scope.cm);
                    //User save error
                    console.log(error);
                    $scope.errorBag = error.data.ERROR;
                });
            }


        }]);
