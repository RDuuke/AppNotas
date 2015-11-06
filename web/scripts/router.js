'use strict';

angular.module('Users', ['ngResource','ngRoute'])
       .config(function ($routeProvider) {
           $routeProvider
               .when('/users',{
                   templateUrl: 'views/users/index.html',
                   controller: 'IndexUsersCtrl'
               })
               .when('/users/new',{
                   templateUrl: 'views/users/create.html',
                   controller: 'CreateUsersCtrl'
               })
               .when('/users/edit/:id',{
                   templateUrl: 'views/users/create.html',
                   controller: 'EditUsersCtrl'
               })
               .otherwise({
               redirectTo:'/'
           });
       });