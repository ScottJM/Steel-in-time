"use strict";
var App = angular.module('SIT', [
    'ui.bootstrap',
    'ui.bootstrap.showErrors',
    'angular-stripe',
    'ngRoute',
    'ngResource',
    'SIT.services'

]).config(function (stripeProvider) {
    stripeProvider.setPublishableKey('pk_test_5wWO241axD8j8qpgOHIPo4dD');
});