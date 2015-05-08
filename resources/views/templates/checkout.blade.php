<div>

    <div class="row">

            <h3 class="red-head">Checkout</h3>
        <alert  type="danger" ng-show="error">@{{error}}</alert>


        <div class="col-md-8" ng-show="checkoutStage == 1">

            <h4>Login / Guest checkout</h4>

                    <form class="form-horizontal" name="login" role="form" method="POST" action="" style="padding:30px 0">
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email"  ng-model="loginData.email" />
                        </div>
                    </div>

                    <div class="form-group" ng-hide="guestCheckout == true">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" ng-model="loginData.password" />
                        </div>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" value="0"  ng-model="guestCheckout">
                            Existing customer
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" value="1"  ng-model="guestCheckout">
                            New customer
                        </label>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="button" class="btn btn-primary" ng-click="submitLogin()">Continue</button>
                        </div>
                    </div>
                    </form>


        </div>
    </div>

    <div class="col-md-8" ng-show="checkoutStage == 2">
        <h4>Order details</h4>
        <div class="panel panel-default">
            <div class="panel-heading">
                Your details
            </div>
            <div class="panel-body">

                <div class="form-group" ng-hide="user && customer.first_name">
                    <label class="col-lg-4 control-label" for="customer_name">Full name</label><div class="col-lg-8"><input ng-model="customer.customer_name" type="text" name="customer_name" id="customer_name" class="form-control ui-autocomplete-input" autocomplete="off"></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="company_name">Company name</label><div class="col-lg-8"><input ng-model="customer.company_name" type="text" name="company_name" id="company_name" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="vat_number">VAT Number</label><div class="col-lg-8"><input ng-model="customer.vat_number" type="text" name="vat_number" id="vat_number" class="form-control" placeholder="Optional"></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="email_address">Email address</label><div class="col-lg-8"><input ng-model="customer.email_address" type="text" name="email_address" id="email_address" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="phone_number">Phone number</label><div class="col-lg-8"><input ng-model="customer.phone_number" type="text" name="phone_number" id="phone_number" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="mobile_number">Mobile number</label><div class="col-lg-8"><input  ng-model="customer.mobile_number" type="text" name="mobile_number" id="mobile_number" class="form-control"></div>
                </div>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Your address
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="billing_address">Billing address</label><div class="col-lg-8"><textarea ng-model="customer.billing_address" name="billing_address" rows="3" cols="50" id="billing_address" class="form-control"></textarea></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="billing_postcode">Billing postcode</label><div class="col-lg-8"><input ng-model="customer.billing_postcode"  type="text" name="billing_postcode" id="billing_postcode" class="form-control postcode"></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="shipping_address">Shipping address</label><div class="col-lg-8"><textarea ng-model="customer.shipping_address"  name="shipping_address" rows="3" cols="50" id="shipping_address" class="form-control"></textarea></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label" for="shipping_postcode">Shipping postcode</label><div class="col-lg-8"><input ng-model="customer.shipping_postcode"  type="text" name="shipping_postcode" id="shipping_postcode" class="form-control postcode"></div>
                </div>

            </div>
        </div>
        <p>&nbsp;</p>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="button" class="btn btn-primary" ng-click="submitDetails()">Continue</button>
            </div>
        </div>

    </div>
    <div class="col-md-8" ng-show="checkoutStage == 3">
        <h4>Payment details</h4>

        <form method="POST" action="" class="form-horizontal" name="billingform" >

            <div class="form-group row">
                <label for="Credit card number" class="col-md-5 control-label">Credit Card Number</label>
                <div class="col-md-7">
                    <input class="form-control" id="cc-number" data-stripe="number" required placeholder="" type="text" ng-model="card.number">
                </div>
            </div>
            <div class="form-group row">
                <label for="Expiration date" class="col-md-5 control-label">Expiration Date</label>
                <div class="col-md-4">
                    <select class="form-control" data-stripe="exp-month" ng-model="card.expMonth"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" data-stripe="exp-year" ng-model="card.expYear"><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option></select>
                </div>
            </div>
            <div class="form-group row">
                <label for="CVV number" class="col-md-5 control-label">CVV Number</label>
                <div class="col-md-7">
                    <input class="form-control" id="cvv" data-stripe="cvc" type="text" ng-model="card.cvc" required>
                </div>
            </div>
            <div class="payment-errors col-md-12" style="display:none"></div>


            <div class="form-group"><div class="col-lg-offset-3 col-lg-9"><button type="button" ng-click="charge()"  class="btn btn-default" ng-disabled="sendingPayment == true">Make payment</button></div></div>

        </form>
    </div>

    <div class="col-md-8" ng-show="checkoutStage == 4">
        <h4 class="text-success">Order successful - #<span ng-bind="order.id"></span></h4>
    </div>


    </div>