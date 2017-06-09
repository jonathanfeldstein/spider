var app = angular.module("ProjectC",['ngRoute','angular-responsive','luegg.directives','angularMoment','lrInfiniteScroll']);
    

app.config(function ($routeProvider, responsiveHelperProvider) {
        var device = 'desktop';
        var responsiveHelper = responsiveHelperProvider.$get();
        if(responsiveHelper.isXs()){
            device = 'mobile';
        }else if(responsiveHelper.isSm()){
          device = 'tablet';
        }else{
          device = 'desktop';
        }
  $routeProvider 
  	.when('/home',{
  		controller: 'HomeController as ctrl',
  		templateUrl:'components/home/' + device + '/home.html'
  	})
  	.when('/company',{
  		controller: 'CompanyController as ctrl',
  		templateUrl:'components/home/' + device + '/company.html'
  	})
    .when('/contacts', { 
      controller: 'ContactsController as ctrl', 
      templateUrl: 'components/contacts/' + device + '/contacts.html' 
    }) 
    .when('/messages', { 
      controller: 'MessagesController as ctrl', 
      templateUrl: 'components/messages/' + device + '/messages.html' 
    })
    .when('/dialog', { 
      controller: 'DialogController as ctrl', 
      templateUrl: 'components/messages/' + device + '/dialog.html'
    })        
    .otherwise({ 
      redirectTo: '/home' 
    }); 
});

