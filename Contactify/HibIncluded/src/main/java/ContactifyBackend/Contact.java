package ContactifyBackend;

import javax.persistence.ElementCollection;
import javax.persistence.Entity;
import javax.persistence.Id;
import java.util.ArrayList;
import java.util.List;

@Entity
public class Contact {

	@id
	private String number;

	private String firstName, lastName;
	private String password;

	@ElementCollection
	private List<ExtraInformation> extraFields = new ArrayList<>(); 

	@ElementCollection
	private List<RelationShip> relations = new ArrayList<>();

	public Contact(String number, String firstName, String lastName, String password) {
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

	public Object getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public Object getLastName() {
		return lastName;
	}

	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public Object getPassword() {
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
