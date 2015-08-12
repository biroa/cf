/**
 * Resource Factory for currencies
 */
Services.factory('Currency', ['$resource', function ($resource) {
    return $resource('/api/currency/:id', {id: '@id'}, {
        query: {method: 'GET', isArray: false},
        get: {method: 'GET', params: {id: '@id'}, isArray: false},
        save: {method: 'POST', isArray: false},
        update: {method: 'PUT'}
    });
}]);
