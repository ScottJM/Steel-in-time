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
            when('/about', {
                templateUrl: '/template/about.html',
                controller: 'ContactCtrl'
            }).
            when('/cart', {
                templateUrl: '/template/cart.html',
                controller: 'CartCtrl'
            }).
            when('/product/:productId/view', {
                templateUrl: '/template/product-single.html',
                controller: 'ProductSingleCtrl'
            }).
            when('/metal/:metalId/view', {
                templateUrl: '/template/metal-single.html',
                controller: 'MetalSingleCtrl'
            }).
            otherwise({
                redirectTo: '/home'
            });
    }]);