app.directive('contactInfoTablet', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      contact: '=' 
    }, 
    templateUrl: 'components/contacts/contactInfoTablet.html' 
  }; 
});