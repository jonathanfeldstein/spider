var app = angular.module("ProjectC",['ngRoute']);

app.config(function ($routeProvider) { 
  $routeProvider 
    .when('/contacts', { 
      controller: 'ContactsController as ctrl', 
      templateUrl: 'components/contacts/contacts.html' 
    }) 
    .otherwise({ 
      redirectTo: '/contacts' 
    }); 
});