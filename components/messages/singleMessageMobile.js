app.directive('singleMessageMobile', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      message: '=' 
    }, 
    templateUrl: 'components/messages/singleMessageMobile.html' 
  }; 
});