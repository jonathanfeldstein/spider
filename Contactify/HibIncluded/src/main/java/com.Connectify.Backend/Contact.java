package com.Contactify.Backend;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.*;
	
@Entity
public class Contact {

	@Id
	private String number;

	private String firstName, lastName;
	private String password;

	@ElementCollection(targetClass=ExtraInformation.class)
	private List<ExtraInformation> extraFields; 
	//onetomany?!
	@ElementCollection(targetClass=RelationShip.class)
	private List<RelationShip> relations;
	
	public Contact(){
	number = "";
	firstName = "";
	lastName = "";
	password = "";
}
	public Contact(String number, String firstName, String lastName, String password) {
	extraFields = new ArrayList<ExtraInformation>(); 
	relations = new ArrayList<RelationShip>();
		this.number = number;
		this.firstName = firstName;
		this.lastName = lastName;
		this.password = password;
	
	}

	public String getNumber() {
		return number;
	}

	public void setNumber(String number) {
		this.number = number;
	}

	public String getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getLastName() {
		return lastName;
	}

	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public void addExtraInformation(ExtraInformation ei) {
		extraFields.add(ei);
	}

	public List<ExtraInformation> getExtraInformation() {
		return extraFields;
	}

	public void addRelationInformation(RelationShip rs) {
		relations.add(rs);
	}

	public List<RelationShip> getRelationInformation() {
		return relations;
	}

}
