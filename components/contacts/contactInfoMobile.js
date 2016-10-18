app.directive('contactInfoMobile', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      contact: '=' 
    }, 
    templateUrl: 'components/contacts/contactInfoMobile.html' 
  }; 
});