app.directive('singleMessage', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      message: '=',
      checkDateDifference: '&'
    }, 
    templateUrl: 'components/messages/singleMessage.html',
    link: function(scope, elem, attrs){	      
	    scope.checkDateDifference = function(messagesentdate){
	    	var todayDate = Date.now();
	    	var oneDay = 24*60*60*1000;
	            if(todayDate-messagesentdate < oneDay && todayDate-messagesentdate > 0){
	                return true;
	            }else{
	            	return false;
	            }
	    };
    }
  }; 
});