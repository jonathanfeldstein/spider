app.controller('ContactsController', ['$scope','ContactsService','orderByFilter', ContactsController]);

//Controller-Service get All Contacts from User
function ContactsController($scope, ContactsService, orderBy) {

    ContactsService.getContacts()
      .success(function(contactbook){
        $scope.propertyName = 'firstname';
        $scope.reverse = true;
        $scope.contacts = orderBy(contactbook['contacts'], $scope.propertyName, $scope.reverse);

      });

    //Organize Information DOESNT WORK BITCHES, PROBLEM ON  SHOWING END, NOT in FCT
      
  $scope.sortBy = function(propertyName) {
    console.log(propertyName);
    $scope.reverse = (propertyName !== null && $scope.propertyName === propertyName)
        ? !$scope.reverse : false;
    $scope.propertyName = propertyName;
    $scope.contacts = orderBy($scope.contacts, $scope.propertyName, $scope.reverse);
  
    };

  //POST information to server
    $scope.postContact = function (contact) {
        ContactsService.postContact(contact)
          .success(function(data, status, headers, config) {
              if (status == 200) {      //needs to be changed to 'OK' once connected to server
                $scope.messages = 'Your form has been sent!';
                $scope.submitted = false;
              } else {
                $scope.messages = 'Oops, we received your request, but there was an error processing it.';
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