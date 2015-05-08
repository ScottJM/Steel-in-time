
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
                isArray:true
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
    })
    .factory('CartItem', function($resource) {
        return $resource('/store/cart/:id', { id: '@id' }, {
            update: {
                method: 'PUT' // this method issues a PUT request
            },
            search: {
                method: 'POST',
                url: '/store/cart/search/:value',
                responseType: 'json',
                isArray:true
            }
        });
    })
    .factory('Coupon', function($resource) {
        return $resource('/store/coupon/:id', { id: '@id' }, {
            update: {
                method: 'PUT' // this method issues a PUT request
            }
        });
    });