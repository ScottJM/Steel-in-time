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
                    @{{ selected.metal ? selected.metal.name : 'Metal' }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li ng-repeat="metal in metals"><a href="" ng-click="select('metal', metal) ">@{{ metal.name }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group btn-block" dropdown>
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" dropdown-toggle ng-disabled="!selected.metal" >
                    @{{ selected.grade ? selected.grade : 'Grade' }}  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" dropdown-menu>
                    <li ng-repeat="grade in grades"><a href="" ng-click="select('grade', grade) ">@{{ grade }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group btn-block" dropdown >
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" dropdown-toggle  ng-disabled="!selected.grade">
                    @{{ selected.cut ? selected.cut.name : 'Cut type' }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li ng-repeat="cut in cuts"><a href="" ng-click="select('cut', cut) ">@{{ cut.name }}</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group btn-block" dropdown >
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" dropdown-toggle  ng-disabled="!selected.cut">
                    @{{ selected.size ? selected.size : 'Size' }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li ng-repeat="product in products"><a href="" ng-click="viewProduct(product) ">@{{ product.size }}</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>

<div id="quickShop">
    <h3 style="margin-bottom: 30px">Quick Shop</h3>
    <div class="row text-center">
        <div class="col-md-2 cut-type-box" ng-click="viewCut('roundbar')">
            <img src="/img/cuts/roundbar.png" alt="roundbar" /><br/>
            Round Bar
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('boxsection')">
            <img src="/img/cuts/boxsection.png" alt="roundbar" /><br/>
            Box Section
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('tube')">
            <img src="/img/cuts/tube.png" alt="roundbar" /><br/>
            Tube
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('tsection')">
            <img src="/img/cuts/tsection.png" alt="roundbar" /><br/>
            T-Section
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('rsj')">
            <img src="/img/cuts/rsj.png" alt="roundbar" /><br/>
            RSJs
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('channel')">
            <img src="/img/cuts/channel.png" alt="roundbar" /><br/>
            Channel
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('angle')">
            <img src="/img/cuts/angle.png" alt="roundbar" /><br/>
            Angle
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('pipe')">
            <img src="/img/cuts/pipe.png" alt="roundbar" /><br/>
            Pipe
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('hexagon')">
            <img src="/img/cuts/hexagon.png" alt="roundbar" /><br/>
            Hexagon
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('sheet')">
            <img src="/img/cuts/sheet.png" alt="roundbar" /><br/>
            Sheet
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('squarebar')">
            <img src="/img/cuts/squarebar.png" alt="roundbar" /><br/>
            Square Bar
        </div>
        <div class="col-md-2 cut-type-box" ng-click="viewCut('flatbar')">
            <img src="/img/cuts/flatbar.png" alt="roundbar" /><br/>
            Flat Bar
        </div>
    </div>
</div>

<div class="text-center" style="margin:40px 0;border-bottom: 2px solid #2c3e50">
    <a class="btn btn-primary" href="">Not sure what you need?</a>
</div>

<div id="help">
    <h4>We're here to help</h4>
    <p>Constructing, building and doing it yourself can be difficult when you’re unsure what metal is best fit for the job. Choose a metal below for more
        information on its best use, common usage, properties.</p>
    <p>
    <div class="btn-group" dropdown >
        <button type="button" class="btn btn-primary dropdown-toggle" dropdown-toggle >
            Choose metal <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li ng-repeat="metal in metals"><a href="" ng-click="viewMetal(metal) ">@{{ metal.name }}</a></li>
        </ul>
    </div>
    </p>
</div>
