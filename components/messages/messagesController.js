app.controller('MessagesController', ['$scope','MessagesService', MessagesController]);

function MessagesController($scope, MessagesService) {

  //Get all Contacts (Contactbook)
    MessagesService.getMessages()
      .success(function(inbox){
        $scope.messages = inbox['messages'];
        $scope.showmessages=$scope.messages;
      });

	$scope.filterbylength="all"
    $scope.sortByLength=function(message, filterbylength){
     if(filterbylength=="long")
     {
         if(message.prosa.length>=200)
             return true;
         return false;
     }else if (filterbylength=="short")
     {
         if(message.prosa.length<=200)
             return true;
         return false;
     }else 
     {
        return true;
    }
    }
};
