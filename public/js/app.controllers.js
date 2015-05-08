App.
    controller('AppCtrl', ['$scope', 'Product','Metal','Cut','CartItem','$location','$http','Coupon',
        function($scope, Product, Metal, Cut, CartItem, $location,$http,Coupon) {

        $scope.products = Product.query();
        $scope.metals = Metal.query();
        $scope.cuts = [];
        $scope.user = null;
        $scope.grades = [];
            $scope.alert = null;
            $scope.coupon = null;
            $scope.couponName = null;

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

        $scope.getCurrentUser = function() {
            $http({
                method  : 'GET',
                url     : '/store/get-current-user'
            })
                .success(function(data) {
                    if(data.user) {
                        $scope.user = data.user;
                    }

                });
        };

        $scope.getCurrentUser();


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

            $location.url('/metal/'+metal.id+'/view');
        };
        $scope.viewCut = function(cut) {
            $location.url('/cut/' + cut + '/view');
        };
        $scope.refreshCart();



            $scope.discountTotal = function() {
                var total = $scope.cartTotal();
                if($scope.coupon) {
                    if($scope.coupon.amount_off > 0) {
                        return $scope.coupon.amount_off;
                    } else if($scope.coupon.percent_off > 0) {
                        return total / $scope.coupon.percent_off;
                    }
                }
                return 0;
            };

            $scope.deliveryTotal = function(){
                return 19.99;
            };

            $scope.grandTotal = function(){
                var total = $scope.cartTotal();
                var disc = $scope.discountTotal();
                var delivery = $scope.deliveryTotal();

                return (total - disc) + delivery;
            };

            $scope.updateCoupon = function() {

                $scope.coupon = Coupon.get({id:$scope.couponName}, function(r){
                    $scope.coupon = r;
                });

            };



        }])
    .controller('ProductSearchCtrl', function($scope, $modal, $log, Product, $location) {



    })
    .controller('CartCtrl', function($scope, $modal, $log, Product, $location, Coupon) {


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
    .controller('CheckoutCtrl', function($scope, $modal, $log, Product, $location, $http, stripe) {

        $scope.loginData = {};
        $scope.card = {};
        $scope.payment = {};

        $scope.checkoutStage = 1;

        $scope.guestCheckout = false;
        $scope.customer = null;

        $scope.changeGuestCheckout = function (value) {
            $scope.guestCheckout = value;
        };
        if($scope.user) {
            $scope.guestCheckout = true;
            $scope.checkoutStage = 2;
            $scope.customer = $scope.user.customer;
        }

        $scope.submitDetails = function () {
            $scope.checkoutStage = 3;


        };

        $scope.sendingPayment = false;

        $scope.submitLogin = function() {
            $http({
                method  : 'POST',
                url     : '/store/auth',
                data    : {data:$scope.loginData}  // pass in data as strings
            })
                .success(function(data) {
                    console.log(data);

                    if (!data.success) {
                        // if not successful, bind errors to error variables
                        $scope.error = data.error;

                    } else {

                        if(data.user) {
                            $scope.user = data.user;
                        }
                        // if successful, bind success message to message
                        $scope.checkoutStage = 2;
                    }
                });
        };

        $scope.charge = function () {
            $scope.payment.card = $scope.card;
            $scope.payment.coupon = $scope.couponName;
            $scope.payment.amount = $scope.grandTotal();
            $scope.error = null;
            $scope.sendingPayment = true;
            return stripe.card.createToken($scope.payment.card)
                .then(function (token) {
                    console.log('token created for card ending in ', token.card.last4);
                    var payment = angular.copy($scope.payment);
                    payment.card = void 0;
                    payment.token = token.id;
                    payment.customer = $scope.customer;
                    payment.user = $scope.user;
                    return $http.post('/store/payment/make', payment)
                        .success(function(r){
                            $scope.sendingPayment = false;
                            if(r.error) {
                                $scope.error = r.error;
                            } else {


                                $scope.order = r.order;
                                $scope.checkoutStage = 4;
                            }
                        });
                })
                .then(function (payment) {
                    console.log('successfully submitted payment for $', $scope.payment.amount);
                })
                .catch(function (err) {
                    if (err.type && /^Stripe/.test(err.type)) {
                        console.log('Stripe error: ', err.message);
                    }
                    else {
                        console.log('Other error occurred, possibly with your API', err.message);
                    }
                });
        };

    })
    .controller('HomeCtrl', function($scope, $modal, $log, Product, $location) {

        $scope.myInterval = 5000;

        $scope.slides = [
            {
                title: 'Welcome to Steel in Time!',
                text: "This is our brand new website and we're here to help supply you with all your metal needs. We stock a HUGE range of products, so use the drop down search below to get started!",
                button: 'Contact us',
                buttonlink: '/store/#/contact'
            },
            {
                image: '/img/default.png',
                title: 'Stainless Steel Flat bar',
                text: 'We have just opened a brand new range of Stainless Steel products. To see products such as Stainless Steel Flat Bar click the button below.',
                button: 'View Product',
                buttonlink: '/store/#/about'
            }

        ];

    });