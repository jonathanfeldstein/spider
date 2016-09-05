









































public class Main {

	public static void main(String[] args) {
		String number = "+41798528494";
		Contact contact = new Contact(number);
		ContactManager mg = new ContactManager();
		mg.createContact(contact);
		mg.deleteContact(contact.getNumber());
		mg.createContact(contact);
		mg.getContact(contact.getNumber());
		

	}

}
