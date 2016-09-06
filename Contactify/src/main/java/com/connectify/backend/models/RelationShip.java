package com.connectify.backend.models;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.Column;
import javax.persistence.ElementCollection;
import javax.persistence.Entity;
import javax.persistence.Id;

@Entity
public class RelationShip {
	@Id
	private String number;

	@Column
	private String category;

	@ElementCollection
	private List<String> persons = new ArrayList<String>();

	public RelationShip(String number, String category, List<String> persons) {
		this.number = number;
		this.category = category;
		this.persons = persons;
	}

	public RelationShip(String category) {
		this.category = category;
	}

	public String getCategory() {
		return category;
	}

	public void setCategory(String category) {
		this.category = category;
	}

	public void addPerson(String person) {
		persons.add(person);
	}

	public List<String> getPersons() {
		return persons;
	}
}