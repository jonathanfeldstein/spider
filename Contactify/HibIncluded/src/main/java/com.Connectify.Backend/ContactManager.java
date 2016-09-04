package com.Contactify.Backend;

import java.util.List;
import java.util.Map;
import javax.persistence.*;

public class ContactManager {
	private EntityManagerFactory entityManagerFactory = Persistence
			.createEntityManagerFactory("contactPU");

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

		if (numberUsed(number))
			entityManager.remove(getContact(number));

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
