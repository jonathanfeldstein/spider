app.controller('MessagesController', ['$scope','MessagesService','orderByFilter', MessagesController]);

function MessagesController($scope, MessagesService, orderBy) {
      var oneDay = 24 * 60 * 60 * 1000;
  //Get complete inbox
    MessagesService.getMessages()
      .success(function(inbox){
        $scope.messages = inbox['messages'];
        $scope.showmessages=$scope.messages;
      });
 

  //POST newMessage to server
    $scope.postNewMessage = function (message) {
        MessagesService.postNewMessage(message)
          .success(function(data, status, headers, config) {
              if (status == 200) {      //needs to be changed to 'OK' once connected to server
                $scope.errormessages = 'Your form has been sent!';
                $scope.submitted = false;
              } else {
                $scope.errormessages = 'Oops, we received your request, but there was an error processing it.';
                console.error(data);
              }
          })
          .error(function(data, status, headers, config) {
              //$scope.progress = data;
              $scope.messages = 'There was a network error. Try again later.';
              console.error(data);
          });
      };

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
