<div>
    <h1 class="red-head">Contact us</h1>
    <div class="row">
        <div class="col-md-9">
            <p>We’re here to answer any questions you may have about our products and services. Reach out to us and we’ll respond
                as soon as we can.</p>
            <p>If you would like advice on purchasing the correct material for your project then please use the form below.</p>
            <iframe width="100%" height="350" frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?q=Harlow%2C%20England%20CM19%205BN%2C%20United%20Kingdom&key=AIzaSyCfsx76Cg2_gQ7KX1uHATpqxemypi1kcJg"></iframe>

            <hr/>
            <div ng-hide="messageSent">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Name</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Message</label>
                        <textarea class="form-control" name="" id="" rows="4"></textarea>
                        <div class="clearfix"></div>
                        <p><a class="btn btn-default" href="" ng-click="messageSent = true">Send</a></p>
                    </div>
                </div>
            </div>
            <div ng-show="messageSent">
                <h3 class="text-success"><i class="glyphicon glyphicon-ok"></i> Thank you for your message!</h3>
            </div>
        </div>
        <div class="col-md-3" id="sidebar">
            <h4>Email</h4>
            <p><a href="">sales@steelintime.co.uk</a></p>
            <h4>Telephone</h4>
            <p>(+44) 01279 444779</p>
            <h4>Address</h4>
            <p>Steel in Time Ltd. <br/>
                5 Moat House <br/>
                Harlow, Essex <br/>
                CM19 5BN <br/>
                England</p>

                <p>Company No. 123456798</p>
            <h4>Connect with us</h4>
            <ul id="social-links" style="float: left;">
                <li><a href="https://www.facebook.com/steelintimeUK"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/steel_in_time"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
</div>