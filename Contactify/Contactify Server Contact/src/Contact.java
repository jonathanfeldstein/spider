import java.util.ArrayList;
import java.util.List;

public class Contact {

	private String number = "+41798528494";
	private String firstName = "Lasse", lastName = "Lingens";
	private String password = "1234issafe";

	private List<List<String>> extraFields = new ArrayList<List<String>>(); // the
																			// value
																			// at
																			// place
																			// zero
																			// is
																			// the
																			// name
																			// of
																			// the
																			// field,
																			// the
																			// other
	private List<List<String>> relations = new ArrayList<List<String>>();// saves
																			// the
																			// relations
																			// to
																			// the
																			// friends,
																			// first
																			// entry
																			// is
																			// the
																			// relationship
																			// name

	public Contact(String number) {
		// Set all the values to the values extracted from the DB by the number.
		this.number = number;
		List<String> l1 = new ArrayList<String>();
		List<String> l2 = new ArrayList<String>();
		List<String> l3 = new ArrayList<String>();
		List<String> l4 = new ArrayList<String>();
		List<String> l5 = new ArrayList<String>();
		
		l1.add("Hobbys");
		l1.add("Fighting Sport");
		l1.add("Guitar");
		l1.add("Piano");
		addExtraInformation(l1);
		addExtraInformation("Hobbys","Table Soccer");
		
		l2.add("Music");
		l2.add("Metal");
		addExtraInformation(l2);
		l5.add("Music");
		l5.add("Classic");
		l5.add("Rock");
		addExtraInformation(l5);
		
		l3.add("Working");
		l3.add("Lennart");
		l3.add("Nicco");
		l3.add("Jonathan");
		l3.add("Avik");
		addRelationInformation(l3);
		
		l4.add("Family");
		l4.add("Solveigh");
		l4.add("Lara");
		l4.add("Stella");
		addRelationInformation(l4);
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

	public List<List<String>> getExtraInformation() {
		return extraFields;
	}

	public void addExtraInformation(List<String> newList) {
		for (int i = 0; i < extraFields.size(); i++) {
			if (extraFields.get(i).contains(newList.get(0))) {
				for(int k = 1; k < newList.size();k++){
					extraFields.get(i).add(newList.get(k));
				}
				return;
			}
		}
		extraFields.add(newList);
	}

	public void addExtraInformation(String category, String element) {
		for (int i = 0; i < extraFields.size(); i++) {
			if (extraFields.get(i).contains(category)) {
				extraFields.get(i).add(element);
				return;
			}
		}
	}

	public List<List<String>> getRelationInformation() {
		return relations;
	}

	public void addRelationInformation(List<String> newList) {
		for (int i = 0; i < relations.size(); i++) {
			if (relations.get(i).contains(newList.get(0))) {
				for(int k = 1; k < newList.size();k++){
					relations.get(i).add(newList.get(k));
				}
				return;
			}
		}
		relations.add(newList);
	}

	public void addRelationInformation(String category, String element) {
		for (int i = 0; i < relations.size(); i++) {
			if (relations.get(i).contains(category)) {
				relations.get(i).add(element);
				return;
			}
		}
	}

}
