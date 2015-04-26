@include('storefront.search')

<div style="height: 305px">
    <carousel interval="myInterval">
        <slide ng-repeat="slide in slides" active="slide.active">
            <img ng-src="@{{slide.image}}" class="carousel-image">
            <div class="carousel-caption">
                <h4>@{{slide.title}}</h4>
                <p>@{{slide.text}}</p>
                <p><a class="btn btn-primary" href="#">View Product</a> <a class="btn btn-default" href="#">View Store</a></p>
            </div>
        </slide>
    </carousel>
</div>


<div id="multiSelect">
    <h3 style="margin-bottom: 30px">Know exactly what you want?</h3>
    <div class="row">
        <div class="col-md-3">
            <!-- Single button -->
            <div class="btn-group btn-block" dropdown >
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" dropdown-toggle >
                    Metal <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group btn-block" dropdown>
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" dropdown-toggle >
                    Grade <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" dropdown-menu>
                    <li><a href="#">Action</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group btn-block" dropdown >
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" dropdown-toggle >
                    Cut type <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group btn-block" dropdown >
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" dropdown-toggle >
                    Size <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="quickShop">
    <h3 style="margin-bottom: 30px">Quick Shop</h3>
</div>