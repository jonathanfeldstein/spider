app.controller('DialogController', ['$scope','DialogService','MessagesService', DialogController]);

function DialogController($scope, DialogService, MessagesService, $timeout, $q) {
        $scope.dialog= [];
        $scope.showdialog=[];
        $scope.page=0;
        $scope.step=10;
  //Get all Contacts (Contactbook)
    DialogService.getDialog()
      .success(function(story){
        $scope.user_id = story['user_id'];
        $scope.interlocutor = story['interlocutor'];
        $scope.dialog = story['dialog'];
        $scope.nextPage();
        $scope.busy=false;
      });

    $scope.nextPage=function(){
      if($scope.busy){
        return;
      }
      $scope.busy=true;
      $scope.showdialog = $scope.showdialog.concat($scope.dialog.splice($scope.page*$scope.step,$scope.step));
      console.log($scope.page);      
      $scope.page ++;
      $scope.busy=false;
      console.log($scope.page);
    };

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
};