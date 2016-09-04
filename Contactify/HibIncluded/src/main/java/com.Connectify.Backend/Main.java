package com.Contactify.Backend;

public class Main {
    public static void main(String[] args) {
	Contact c = new Contact("+418528494","Lasse","Lingens","123456issafe");
	RelationShip r = new RelationShip("Team");
	r.addPerson("Johnny F");
	r.addPerson("Hackerman");
	ExtraInformation e = new ExtraInformation("Hobby");
	e.addData("Fighting");
	e.addData("Coding");
	ContactManager cm = new ContactManager();
	cm.createContact(c);
	cm.deleteContact(c.getNumber());
	c.setFirstName("Lasse Rolf");
	cm.createContact(c);
	c = new Contact("123456","Jonathan","Feldstein","123456issafe");
	cm.createContact(c);
	c.setPassword("123456");
	cm.editContact("123456",c);
cm.closeFactory();
    }
}
