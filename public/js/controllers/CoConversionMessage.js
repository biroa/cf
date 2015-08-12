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

Controllers.filter('dateMod', function () {

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
        var tbc  = 1;
        var newYear = input.getFullYear().substr(2, 2);
        var newMonth = parseInt(input.getMonth() + tbc) < 10 ? ("0" + (input.getMonth() + tbc)).slice(-2) : (input.getMonth() + tbc);
        var newDay = ("0" + (input.getDate())).slice(-2);
        var newHours = ("0" + (input.getHours())).slice(-2);
        var newMinutes = ("0" + (input.getMinutes())).slice(-2);
        var newSeconds = ("0" + (input.getSeconds())).slice(-2);
        $scope.formattedDate =  newDay+'-'+monthNames[newMonth]+'-'+newYear+''+newHours+':'+newMinutes+':'+input;
        console.log( $scope.formattedDate);
        return  $scope.formattedDate;
    }
});