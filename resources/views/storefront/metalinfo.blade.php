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