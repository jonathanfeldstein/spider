//Service to get and send Contact(s)
app.service('DialogService', ['$http', DialogService]);

function DialogService($http) { 

	//Communication with Server (Keep all Communication (promise) with the Server in the Service not in the Controller)
	
	/**
	 * Get all Contacts for one User
	 * @returns promise
	 */  
	function getDialog(){
		return $http.get('somerandomdialog.json'); // page
	};
	//Get specific Contact with an ID
  	/*	function getContactById(id){
  			return $http.get(); // TODO
  		}; */
  	//Create New Messagethread
  	/*	function postNewMessage(message){
  			return $http.post('/toto2.php', JSON.stringify(message));
  		}; */

//Communication with Controller(s)
   return {
   		getDialog: getDialog,
   		/*postNewMessage: postNewMessage,*/
   		/*getContactById: getContactById*/
		};


}