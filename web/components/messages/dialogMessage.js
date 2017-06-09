app.directive('dialogMessage', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      message: '=' 
    }, 
    templateUrl: 'components/messages/dialogMessage.html' 
  }; 
});