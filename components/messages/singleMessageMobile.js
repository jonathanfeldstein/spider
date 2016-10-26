app.directive('singleMessageMobile', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      message: '=' 
    }, 
    templateUrl: 'components/messages/singleMessageMobile.html',
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