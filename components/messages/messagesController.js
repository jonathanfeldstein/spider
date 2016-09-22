app.controller('MessagesController', ['$scope','MessagesService','orderByFilter', MessagesController]);

function MessagesController($scope, MessagesService, orderBy) {

  //Get all Contacts (Contactbook)
    MessagesService.getMessages()
      .success(function(inbox){
        $scope.messages = inbox['messages'];
        $scope.showmessages=$scope.messages;
      });
    $scope.filterIsBusiness="all";
	$scope.filterByLength="all";
    $scope.sortByLength=function(message, filterByLength, filterIsBusiness){
     if(filterByLength=="long" && filterIsBusiness=="all")
     {
         if(message.prosa.length>=200)
             return true;
         return false;
     }else if (filterByLength=="short" && filterIsBusiness=="all")
     {
         if(message.prosa.length<=200)
             return true;
         return false;
     }else if(filterIsBusiness=="all")
     {
        return true;
    }
      else if(filterByLength=="long" && filterIsBusiness!="all")
     {
         if(message.prosa.length>=200 && message.business==filterIsBusiness)
             return true;
         return false;
     }else if (filterByLength=="short" && filterIsBusiness!="all")
     {
         if(message.prosa.length<=200 && message.business==filterIsBusiness)
             return true;
         return false;
     }else 
     {
         if(message.business==filterIsBusiness)
             return true;
         return false;
    }
    };
    $scope.sortByChronos = function(propertyName) {
    $scope.reverse = (propertyName !== null && $scope.propertyName === propertyName)
        ? !$scope.reverse : false;
    $scope.propertyName = propertyName;
    $scope.messages = orderBy($scope.messages, $scope.propertyName, $scope.reverse);
    $scope.showmessages=$scope.messages;
    };
};
