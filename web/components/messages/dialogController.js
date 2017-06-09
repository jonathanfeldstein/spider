app.controller('DialogController', ['$scope','DialogService','MessagesService', '$timeout', DialogController]);

function DialogController($scope, DialogService, MessagesService, $timeout) {

        $scope.oneHour = 60 * 60 * 1000;

  //Get all Contacts (Contactbook)
    DialogService.getDialog()
      .success(function(story){
        $scope.user_id = story['user_id'];
        $scope.interlocutor = story['interlocutor'];
        $scope.showdialog = story['dialog'];
      });

    MessagesService.getMessages()
      .success(function(inbox){
        $scope.messages = inbox['messages'];
        $scope.showmessages=$scope.messages;
      });

    //get actual time
    $scope.getDatetime = function() {
      return (new Date).toISOString();
    };

  //POST newMessage to server
    $scope.postExtraMessage = function (message) {
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
};
