<div class="row">
    <h1>@{{ product.description }}</h1>
    <div class="col-md-6">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>Metal</th><td>@{{ product.metal_type.name }}</td>
            </tr>
            <tr>
                <th>Cut</th><td>@{{ product.cut_type.name }}</td>
            </tr>
            <tr>
                <th>Grade</th><td>@{{ product.grade }}</td>
            </tr>
            <tr>
                <th>Width</th><td>@{{ product.width + 'mm' }}</td>
            </tr>
            <tr>
                <th>Height</th><td>@{{ product.height + 'mm' }}</td>
            </tr>
            <tr>
                <th>Length</th><td>@{{ product.length + 'mm' }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="text-success" ng-show="product.in_stock == 1">
            <i class="glyphicon glyphicon-ok"></i> In stock
        </div>
        <div class="text-danger" ng-show="product.in_stock == 0">
            <i class="glyphicon glyphicon-remove"></i> Out of stock
        </div>
        <div class="act" style="margin-top:40px" ng-show="product.in_stock == 1">
            <form class="form-inline">
                <div class="form-group">
                    <input type="number" style="max-width:70px" class="form-control" id="qty" name="qty" placeholder="1" min="1" value="1" ng-model="qty" ng-disabled="addingToBasket">
                </div>
                <button type="button" class="btn btn-default" ng-click="addToCart(product, qty)" ng-disabled="addingToBasket">@{{ addingToBasket ? 'Please wait..' : 'Add to cart' }}</button>
            </form>
        </div>
    </div>
</div>
