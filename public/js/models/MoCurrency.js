/**
 * Resource Factory for currencies
 */
Services.factory('Currency', ['$resource', function ($resource) {
    return $resource('/api/currencies/:id', {id: '@id'}, {
        query: {method: 'GET', isArray: false}
    });
}]);
