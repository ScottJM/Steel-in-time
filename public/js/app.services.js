
angular.module('SIT.services', [])
    .factory('Product', function($resource) {
        return $resource('/store/product/:id', { id: '@id' }, {
            update: {
                method: 'PUT' // this method issues a PUT request
            },
            search: {
                method: 'POST',
                url: '/store/product/search/:value',
                responseType: 'json',
                isArray:true
            },
            grades: {
                method: 'GET',
                url: '/store/product/grades',
                responseType: 'json',
            }
        });
    })
    .factory('Metal', function($resource) {
        return $resource('/store/metal/:id', { id: '@id' }, {
            update: {
                method: 'PUT' // this method issues a PUT request
            },
            search: {
                method: 'POST',
                url: '/store/metal/search/:value',
                responseType: 'json',
                isArray:true
            }
        });
    })
    .factory('Cut', function($resource) {
        return $resource('/store/cut/:id', { id: '@id' }, {
            update: {
                method: 'PUT' // this method issues a PUT request
            },
            search: {
                method: 'POST',
                url: '/store/cut/search/:value',
                responseType: 'json',
                isArray:true
            }
        });
    });