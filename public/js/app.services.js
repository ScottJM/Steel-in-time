
angular.module('SIT.services', [])
    .factory('Server', function($resource) {
        return $resource('/api/v1/server/:id', { id: '@id' }, {
            update: {
                method: 'PUT' // this method issues a PUT request
            },
            validate: {
                method: 'POST',
                url: '/api/v1/server/validate/:field/:value',
                responseType: 'json'
            }
            ,
            cvar: {
                method: 'GET',
                url: '/api/v1/server/:id/cvar/:field',
                responseType: 'json'
            },
            listener: {
                method: 'POST',
                url: '/api/v1/server/:id/listener',
                responseType: 'json'
            }
        });
});