'use strict';

angular.module('Users')
    .factory('UsersResource', function($resource){
       return $resource('http://localhost/AppNotas/users/:id',
           {id: '@id'},
           {update:
                {method: 'PUT'}
           },
           {query:
                {method: 'GET', isArray:false}
           });
    });
