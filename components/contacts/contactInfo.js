app.directive('contactInfo', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      contact: '=' 
    }, 
    templateUrl: 'components/contacts/contactInfo.html' 
  }; 
});