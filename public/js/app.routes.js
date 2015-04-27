App.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/home', {
                templateUrl: '/template/home.html',
                controller: 'HomeCtrl'
            }).
            when('/contact', {
                templateUrl: '/template/contact.html',
                controller: 'ContactCtrl'
            }).
            when('/product/:productId/view', {
                templateUrl: '/template/product-single.html',
                controller: 'ProductSingleCtrl'
            }).
            otherwise({
                redirectTo: '/home'
            });
    }]);