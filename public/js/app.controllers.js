App.
    controller('AppCtrl', ['$scope', 'Server',
        function($scope, Server) {



    }])
    .controller('ProductSearchCtrl', function($scope, $modal, $log, Server, $location) {



    })
    .controller('ContactCtrl', function($scope, $modal, $log, Server, $location) {



    })
    .controller('HomeCtrl', function($scope, $modal, $log, Server, $location) {

        $scope.myInterval = 5000;

        $scope.slides = [
            {
                image: '/img/default.png',
                title: 'Stainless Steel Flatbar',
                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque dapibus arcu, sed finibus quam cursus at.'
            },
            {
                image: '/img/default.png',
                title: 'Stainless Steel Flatbar',
                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque dapibus arcu, sed finibus quam cursus at.'
            }
        ];



    });