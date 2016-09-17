app.directive('singleMessage', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      message: '=' 
    }, 
    templateUrl: 'components/messages/singleMessage.html' 
  }; 
});