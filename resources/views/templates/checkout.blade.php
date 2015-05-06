<div>

    <div class="row">

            <h3 class="red-head">Checkout</h3>


        <div class="col-md-8">

            <tabset>
                <tab heading="Guest">Justified content</tab>
                <tab heading="Login">
                    <form class="form-horizontal" name="login" role="form" method="POST" action="" style="padding:30px 0">
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email"  ng-model="loginData.email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" ng-model="loginData.password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" ng-model="loginData.remember" /> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="button" class="btn btn-primary" ng-click="submitLogin()">Login</button>

                            <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                    </form>
                </tab>
            </tabset>

        </div>
    </div>

</div>