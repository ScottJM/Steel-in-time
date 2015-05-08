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
            when('/checkout', {
                templateUrl: '/template/checkout.html',
                controller: 'CheckoutCtrl'
            }).
            when('/product/:productId/view', {
                templateUrl: '/template/product-single.html',
                controller: 'ProductSingleCtrl'
            }).
            when('/metal/:metalId/view', {
                templateUrl: '/template/metal-single.html',
                controller: 'MetalSingleCtrl'
            }).
            when('/cut/:cutId/view', {
                templateUrl: '/template/metal-single.html',
                controller: 'CutSingleCtrl'
            }).
            otherwise({
                redirectTo: '/home'
            });
    }]);