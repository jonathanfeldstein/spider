app.directive('singleMessageTablet', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      message: '=' 
    }, 
    templateUrl: 'components/messages/singleMessageTablet.html' 
  }; 
});