package ContactifyBackend;

public class Main {
    public static void main(String[] args) {
	Contact c = new Contact("+418528494","Lasse","Lingens","123456issafe");
	RelationShip r = new RelationShip("Team");
	r.addPerson("Johnny F");
	r.addPerson("Hackerman");
	ExtraInformation e = new ExtraInformation("Hobby");
	e.addData("Fighting");
	e.addData("Coding");
    }
}
