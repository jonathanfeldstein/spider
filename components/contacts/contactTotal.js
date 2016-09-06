//directive building MODAL and to POST information from modal to SERVER
app.directive('contactTotal', [function() { 
  return { 
    // "restricte" defines how directive will be used, "E" say its an html Element
    restrict: 'E', 
    // "scope" defines in what form information will be past on to directive
    scope: {
      'contact': '='
    }, 
    // templateUrl to definie MODAL
    templateUrl: 'components/contacts/contactTotal.html'	
	}  	
  }]);