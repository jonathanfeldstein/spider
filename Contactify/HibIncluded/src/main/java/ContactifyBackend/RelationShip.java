package ContactifyBackend;

import java.util.ArrayList;
import java.util.List;
import javax.persistence.Embeddable;

@Embeddable
public class RelationShip {

    	private String category;
    	private List<String> persons=new ArrayList<>();
	
	public RelationShip(String category, List<String> persons){
		this.category = category;
		this.persons = persons;
	}

	public RelationShip(String category){
		this.category = category;
	}

	public String getCategory(){
		return category;
	}

	public void setCategory(String category){
		this.category=category;
	}

	public void addPerson(String person){
		persons.add(person);
	}

	public List<String> getPersons(){
		return persons;
	}
}
