app.directive('singleThreadTablet', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      message: '=' 
    }, 
    templateUrl: 'components/messages/singleThreadTablet.html' 
  }; 
});