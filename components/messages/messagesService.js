//Service to get and send Contact(s)
app.service('MessagesService', ['$http', MessagesService]);

function MessagesService($http) { 

	//Communication with Server (Keep all Communication (promise) with the Server in the Service not in the Controller)
	
	/**
	 * Get all Contacts for one User
	 * @returns promise
	 */  
	function getMessages(){
		return $http.get('somerandommaillist.json');
	};
	//Get specific Contact with an ID
  	/*	function getContactById(id){
  			return $http.get(); // TODO
  		}; */
  	/*//Add new Contact to list OR modifiy existing Contact
  		function postContact(contact){
  			return $http.post('/toto.php', JSON.stringify(contact));
  		}; */

//Communication with Controller(s)
   return {
   		getMessages: getMessages,
   		/* postContact: postContact, */
   		/*getContactById: getContactById*/
		};


}