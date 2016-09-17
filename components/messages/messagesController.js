app.controller('MessagesController', ['$scope','MessagesService', MessagesController]);

function MessagesController($scope, MessagesService) {

  //Get all Contacts (Contactbook)
    MessagesService.getMessages()
      .success(function(inbox){
        $scope.messages = inbox['messages'];
        $scope.showmessages=$scope.messages;
      });

};