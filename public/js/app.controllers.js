App.
    controller('AppCtrl', ['$scope', 'Product','Metal','Cut','$location',
        function($scope, Product, Metal, Cut, $location) {

        $scope.products = Product.query();
        $scope.metals = Metal.query();
        $scope.cuts = [];
        $scope.grades = [];

        $scope.selected = {
            metal: null,
            cut: null,
            grade: null,
            size: null
        };
        $scope.select = function(key, value) {
            $scope.selected[key] = value;

            if(key == 'metal') {
                $scope.grades = Product.grades({
                    metal: value.id
                });
            }
            if(key == 'grade') {
                $scope.cuts = Cut.query({
                    metal: $scope.selected.metal.id,
                    grade: value
                });
            }
            if(key == 'cut') {
                $scope.products = Product.query({
                    metal: $scope.selected.metal.id,
                    grade: $scope.selected.grade,
                    cut: $scope.selected.cut.id
                });
            }

        };
        $scope.viewProduct = function(product) {
            $location.url('/product/'+product.id+'/view');
        };
        $scope.viewMetal = function(metal) {
            $location.url('/metal/'+metal.id+'/view');
        };
        $scope.viewCut = function(cut) {
            $location.url('/cut/'+cut+'/view');
        }

    }])
    .controller('ProductSearchCtrl', function($scope, $modal, $log, Product, $location) {



    })
    .controller('ProductSingleCtrl', function($scope, $modal, $log, Product, $location, $routeParams) {

        var id = $routeParams.productId;
        $scope.product = Product.get({id:id });

    })
    .controller('ContactCtrl', function($scope, $modal, $log, Product, $location) {



    })
    .controller('HomeCtrl', function($scope, $modal, $log, Product, $location) {

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