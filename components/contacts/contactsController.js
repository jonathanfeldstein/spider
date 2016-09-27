app.controller('ContactsController', ['$scope','ContactsService','orderByFilter', ContactsController]);

function ContactsController($scope, ContactsService, orderBy) {

  //Get all Contacts (Contactbook)
    ContactsService.getContacts()
      .success(function(contactbook){
        $scope.propertyName = 'firstname';
        $scope.reverse = true;
        $scope.contacts = orderBy(contactbook['contacts'], $scope.propertyName, $scope.reverse);
        $scope.showcontacts=$scope.contacts;
        var str = "abcdefghijklmnopqrstuvwxyz";
        $scope.alphabet = str.toUpperCase().split("");

        $scope.activeLetter = '';



      });

  //POST information to server
    $scope.postContact = function (contact) {
        ContactsService.postContact(contact)
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
      };

    //Organize Information 
      
  $scope.sortBy = function(propertyName) {
    $scope.activeLetter = '';
    console.log(propertyName);
    var filtered= [];
    $scope.reverse = (propertyName !== null && $scope.propertyName === propertyName)
        ? !$scope.reverse : false;
    $scope.propertyName = propertyName;
    $scope.contacts = orderBy($scope.contacts, $scope.propertyName, $scope.reverse);
    $scope.showcontacts=$scope.contacts;
    };
  $scope.sortByOneWay = function(propertyName) {
    $scope.activeLetter = '';    
    console.log(propertyName);
    $scope.reverse = false;
    $scope.propertyName = propertyName;
    $scope.contacts = orderBy($scope.contacts, $scope.propertyName, $scope.reverse);
    $scope.showcontacts=$scope.contacts;
    };
//Sort by Letter
        $scope.activateLetter = function(letter) {
          console.log($scope.propertyName);
          var sortproperty=$scope.propertyName;
          var contactsByLetter=[];
          var letterMatch = new RegExp(letter, 'i');
          for (var i = 0; i < $scope.contacts.length; i++) {
              var contact = $scope.contacts[i];
              
              if (letterMatch.test(contact[sortproperty].substring(0, 1))) {
                    contactsByLetter.push(contact);
                }
            
          }
          $scope.showcontacts = contactsByLetter;
          $scope.activeLetter = letter
        };


};