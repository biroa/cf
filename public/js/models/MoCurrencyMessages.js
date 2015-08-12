/**
 * Resource Factory for currency messages
 */
Services.factory('CurrencyMessages', ['$resource', function ($resource) {
    return $resource('/api/messages/:id', {id: '@id'}, {
        query: {method: 'GET', isArray: false},
        get: {method: 'GET', params: {id: '@id'}, isArray: false},
        save: {method: 'POST', isArray: false},
        update: {method: 'PUT'}
    });
}]);
