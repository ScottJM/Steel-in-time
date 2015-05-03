App.
    controller('AppCtrl', ['$scope', 'Product','Metal','Cut','CartItem','$location',
        function($scope, Product, Metal, Cut, CartItem, $location) {

        $scope.products = Product.query();
        $scope.metals = Metal.query();
        $scope.cuts = [];
        $scope.grades = [];
            $scope.alert = null;

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



        $scope.removeCartItem = function(item) {
            var cartI = CartItem.get({id:item.id}, function() {

                cartI.$delete(function() {
                    $scope.refreshCart();
                });

            });
        };

        $scope.updateItem = function(item) {
            var cartI = CartItem.get({id:item.id}, function() {
                cartI.quantity = item.quantity;
                cartI.$update(function() {
                    $scope.refreshCart();
                });
            });
        };

        $scope.cartTotal = function() {
            var total = 0;
            angular.forEach($scope.cartItems, function(item, key) {
                total += (item.price * item.quantity);
            });
            return total;
        };

        $scope.addToCart = function(product, qty) {
            $scope.addingToBasket = true;
            var item = new CartItem({
                product: product.id,
                qty: qty
            });
            CartItem.save(item, function(r){
                $scope.refreshCart();
                $scope.addingToBasket = false;
                $scope.alert = {
                    text: 'You have added the product to your cart',
                    actionLabel: 'View cart',
                    action: function() {
                        return $scope.viewCart();
                    }
                };
                setTimeout(function(){
                    $scope.resetAlert();
                    $scope.$apply();
                }, 5000)
            });
        };

        $scope.viewCart = function()
        {
            $scope.resetAlert();
            $location.url('/cart');
        };

        $scope.resetAlert = function() {
            $scope.alert = null;

        };

        $scope.addingToBasket = false;

        $scope.refreshCart = function()
        {
            var cartItems = CartItem.query(function(r){
                $scope.cartItems = r;
            });
        };



        $scope.viewProduct = function(product) {
            $location.url('/product/'+product.id+'/view');
        };
        $scope.viewMetal = function(metal) {
            console.log('/metal/'+metal.id+'/view');
            $location.url('/metal/'+metal.id+'/view');
        };
        $scope.viewCut = function(cut) {
            $location.url('/cut/' + cut + '/view');
        };
        $scope.refreshCart();


    }])
    .controller('ProductSearchCtrl', function($scope, $modal, $log, Product, $location) {



    })
    .controller('CartCtrl', function($scope, $modal, $log, Product, $location) {


    })
    .controller('ProductSingleCtrl', function($scope, $modal, $log, Product, $location, $routeParams) {

        var id = $routeParams.productId;
        $scope.product = Product.get({id:id });
        $scope.qty = 1;


    })
    .controller('MetalSingleCtrl', function($scope, $modal, $log, Product, Metal, $location, $routeParams) {

        var id = $routeParams.metalId;
        $scope.metal = Metal.get({id:id });



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
                title: 'Welcome to Steel in Time!',
                text: "This is our brand new website and we're here to help supply you with all your metal needs. We stock a HUGE range of products, so use the drop down search below to get started!"
            }
        ];



    });