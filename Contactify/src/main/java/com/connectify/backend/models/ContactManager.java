package com.connectify.backend.models;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

public class ContactManager {
	public ContactManager(){}
	private static final EntityManagerFactory entityManagerFactory = Persistence
			.createEntityManagerFactory("com.Contactify.Backend");

	public void createContact(Contact contact) {
		Contact newCon = contact;

		EntityManager entityManager = entityManagerFactory
				.createEntityManager();
		entityManager.getTransaction().begin();

		if (!numberUsed(newCon.getNumber()))
			entityManager.persist(newCon);

		entityManager.getTransaction().commit();
		entityManager.close();

	}

public void closeFactory(){
entityManagerFactory.close();
}

	public void editContact(String number, Contact changedContact) {
		// better use of EM
		if (numberUsed(number)) {
			deleteContact(number);
			createContact(changedContact);// TODO nicer implementation??
		}
	}

	public void deleteContact(String number) {
		EntityManager entityManager = entityManagerFactory
				.createEntityManager();
		entityManager.getTransaction().begin();
		Contact c = getContact(number);

		if (numberUsed(number))
			entityManager.remove(entityManager.contains(c) ? c : entityManager.merge(c));
		entityManager.getTransaction().commit();
		entityManager.close();

	}

	private boolean numberUsed(String number) {

		boolean res;
		EntityManager entityManager = entityManagerFactory
				.createEntityManager();
		entityManager.getTransaction().begin();

		Contact loadedContact = entityManager.find(Contact.class, number);
		if (loadedContact != null) {
			res = true;
		} else {
			res = false;
		}
		entityManager.getTransaction().commit();
		entityManager.close();
		return res;
	}

	public Contact getContact(String number) {
		EntityManager entityManager = entityManagerFactory
				.createEntityManager();
		entityManager.getTransaction().begin();

		Contact loadedContact = entityManager.find(Contact.class, number);
		entityManager.getTransaction().commit();
		entityManager.close();
		if (loadedContact != null)// Better Handle for nonexisting
			return loadedContact;
		return new Contact("", "", "", "");
	}
}