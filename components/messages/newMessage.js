//directive building MODAL and to POST information from modal to SERVER
app.directive('newMessage', ['MessagesService', function(MessagesService) { 
  return { 
    // "restricte" defines how directive will be used, "E" say its an html Element
    restrict: 'E', 
    // "scope" defines in what form information will be past on to directive
    scope: {

    submitFunc: '='

    }, 
    // templateUrl to definie MODAL
    templateUrl: 'components/messages/newMessage.html',
    //makes the directive interactive eith User action
    link: function($scope, element, attrs) {
    $scope.message={};
 		$scope.submitWrapper = function(message){

 			$scope.submitFunc(message);
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
/*                                                                              TODO
// Makes Modal draggable in Angular
modaldraggable
app.directive('modaldraggable', function ($document) {
  "use strict";
  return function (scope, element) {
    var startX = 500,
      startY = 500,
      x = 0,
      y = 0;
     element= angular.element(document.getElementsByClassName("modal-dialog"));
     console.log("added directive");
    element.css({
      position: 'absolute',
      cursor: 'move'
    });
    
    element.on('mousedown', function (event) {
      // Prevent default dragging of selected content
      event.preventDefault();
      startX = event.screenX - x;
      startY = event.screenY - y;
      $document.on('mousemove', mousemove);
      $document.on('mouseup', mouseup);
    });

    function mousemove(event) {
      y = event.screenY - startY;
      x = event.screenX - startX;
      element.css({
        top: y + 'px',
        left: x + 'px'
      });
    }

    function mouseup() {
      $document.unbind('mousemove', mousemove);
      $document.unbind('mouseup', mouseup);
    }
  };
}); */