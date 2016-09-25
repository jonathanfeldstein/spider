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
/* DOES NOT WORK */                                       //TODO
//Makes Modal draggable in Angular
app.directive('modaldraggabletoo', function ($document) {
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
});