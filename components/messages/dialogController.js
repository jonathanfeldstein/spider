app.controller('DialogController', ['$scope','DialogService','orderByFilter', DialogController]);

function DialogController($scope, MessagesService, orderBy) {

  //Get all Contacts (Contactbook)
    DialogService.getDialog()
      .success(function(inbox){
        $scope.dialog = inbox['dialog'];
        $scope.showdialog=$scope.dialog;
      });

  //POST information to server
  /*  $scope.postToDialog = function (sentence) {
        DialogService.postToDialog(sentence)
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
              $scope.errormessages = 'There was a network error. Try again later.';
              console.error(data);
          });
      }; */
};