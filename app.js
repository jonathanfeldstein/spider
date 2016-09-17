var app = angular.module("ProjectC",['ngRoute']);

app.config(function ($routeProvider) { 
  $routeProvider 
  	.when('/home',{
  		controller: 'HomeController as ctrl',
  		templateUrl:'components/home/home.html'
  	})
  	.when('/company',{
  		controller: 'CompanyController as ctrl',
  		templateUrl:'components/home/company.html'
  	})
    .when('/contacts', { 
      controller: 'ContactsController as ctrl', 
      templateUrl: 'components/contacts/contacts.html' 
    }) 
    .when('/messages', { 
      controller: 'MessagesController as ctrl', 
      templateUrl: 'components/messages/messages.html' 
    }) 
    .otherwise({ 
      redirectTo: '/home' 
    }); 
});