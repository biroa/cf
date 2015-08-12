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