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
            //when('/servers/:serverId/livelog', {
            //    templateUrl: '/template/livelog.html',
            //    controller: 'ServerLiveLogCtrl'
            //}).
            otherwise({
                redirectTo: '/home'
            });
    }]);