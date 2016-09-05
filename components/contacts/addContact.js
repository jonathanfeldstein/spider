//directive building MODAL and to POST information from modal to SERVER
app.directive('addContact', ['ContactsService', function(ContactsService) { 
  return { 
    // "restricte" defines how directive will be used, "E" say its an html Element
    restrict: 'E', 
    // "scope" defines in what form information will be past on to directive
    scope: {

    submitFunc: '='

    }, 
    // templateUrl to definie MODAL
    templateUrl: 'components/contacts/addContact.html',
    //makes the directive interactive eith User action
    link: function($scope, element, attrs) {
    	$scope.contact={};
 		$scope.submitWrapper = function(contact){

 			$scope.submitFunc(contact);
 			$scope.dismiss();
 		};
	  	
	}  	
  }  
}]);

//Helpdirective to be able to load dismiss function into modal once opened, to dismiss after submit
app.directive('dismissModal', function() {
   return {
     restrict: 'A',
     link: function(scope, element, attr) {
       scope.dismiss = function() {
           element.modal('hide');
       };
     }
   } 
});