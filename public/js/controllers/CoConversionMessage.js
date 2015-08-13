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
        var tbc  = 1;
        var newYear = date.getFullYear().toString().substr(2, 2);
        var monthIndex = date.getMonth() + tbc;
        var newMonth = parseInt(date.getMonth() + tbc) < 10 ? ("0" + (date.getMonth() + tbc)).slice(-2) : (date.getMonth() + tbc);
        var newDay = ("0" + (date.getDate())).slice(-2);
        var newHours = ("0" + (date.getHours())).slice(-2);
        var newMinutes = ("0" + (date.getMinutes())).slice(-2);
        var newSeconds = ("0" + (date.getSeconds())).slice(-2);
        return newDay+'-'+monthNames[monthIndex].toUpperCase()+'-'+newYear+' '+newHours+':'+newMinutes+':'+newSeconds;
    }
});

App.controller("conversionMessage",
    [
        '$scope',
        'CurrencyMessages',
        function ($scope, CurrencyMessages) {
            $scope.messageData = {};

            $scope.currencyMessage = new CurrencyMessages();
            $scope.messages = $scope.currencyMessage.$query();
            $scope.messages.then(function (response) {
                $scope.messageData = response.SUCCESS;
                console.log($scope.messageData);
            });

            $scope.doClick = function () {
                $scope.currencyMessage.$save($scope.currency, function () {
                    // on success we get the user ID based on email address


                }, function (error) {
                    //User save error
                    console.log(error);
                    $scope.errorBag = error.data.ERROR;
                    for (i in $scope.errorBag) {
                        console.log(typeof $scope.errorBag[i][0]);
                    }
                });
            }


        }]);
