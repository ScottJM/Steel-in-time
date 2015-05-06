<div>

    <div class="row">
        <div class="col-md-8">
            <h3 class="red-head">Your cart</h3>
            <table class="table table-striped" ng-show="cartItems.length">
                <thead>
                    <tr><th>Product</th><th>Quantity</th><th class="text-right">Price</th><th class="text-right">Total</th><th></th></tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in cartItems">
                        <td>@{{ item.name }}</td>
                        <td class="text-center"><input type="number" class="form-control text-center" min="1" ng-blur="updateItem(item)" style="width:70px; padding:2px; height: 35px" name="qty" ng-model="item.quantity" /></td>
                        <td class="text-right">@{{ item.price | currency:"£" }}</td>
                        <td class="text-right">@{{ (item.price * item.quantity) | currency:"£" }}</td>
                        <td><a href="" ng-click="removeCartItem(item)"><i class="glyphicon glyphicon-remove text-muted"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <h3 class="red-head">Coupon</h3>
            <div class="row">
                <div class="col-xs-3">
                    <input class="form-control" type="text" ng-model="couponName" ng-blur="updateCoupon()" ng-disabled="coupon && coupon.id > 0"/>
                </div>
            </div>
            <div class="text-center text-muted" ng-show="!cartItems.length">
                No items
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1" ng-show="cartItems.length">
            <h3 class="red-head">Sub total <span class="pull-right" ng-bind="cartTotal() | currency:'£' " style="color:#000"></span></h3>
            <h3 class="red-head" ng-show="coupon && coupon.id > 0">Discount <span class="pull-right" ng-bind="discountTotal() | currency:'- £' " style="color:#000"></span></h3>
            <h3 class="red-head">Delivery <span class="pull-right" ng-bind="deliveryTotal() | currency:'£' " style="color:#000"></span></h3>
            <h3 class="red-head">Total <span class="pull-right" ng-bind="grandTotal() | currency:'£' " style="color:#000"></span></h3>
            <p><a class="btn btn-default" href="/store/#checkout">Go to checkout</a></p>
        </div>
    </div>

</div>