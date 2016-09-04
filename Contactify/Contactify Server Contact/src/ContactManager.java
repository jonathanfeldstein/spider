import java.util.List;
import java.util.Map;

import org.bson.Document;

import com.mongodb.MongoClient;
import com.mongodb.client.MongoDatabase;

public class ContactManager {
	MongoDatabase db;
	MongoClient dbClient;
	String collectionName = "ContactInformation", databaseName = "Contacts", firstDoc = "NecessaryInformation",
			secondDoc = "ExtraInformation", thirdDoc = "RelationInformation", idField = "PhoneNumber",
			pwdField = "Password", fNameField = "FirstName", sNameField = "LastName";

	public ContactManager() {
		dbClient = new MongoClient("localhost", 27017);// 1337=portnumber
														// localhost=serveradress
		db = dbClient.getDatabase("Contacts");
	}

	// TODO
	// return true if it was possible to create a new Contact
	// return false if it was not(number already used etc.)
	// either this method handles the errormessage or the returned value should
	// be an encoded int for different reasons
	// why the contact couldnt be created
	public boolean createContact(Contact contact) {
		if (!numberUsed(contact.getNumber())) {

			List<List<String>> extraInfoList = contact.getExtraInformation();
			List<List<String>> relationInfoList = contact.getRelationInformation();

			db.getCollection(collectionName)
					.insertOne(new Document(firstDoc,
							new Document("Name",
									new Document().append(fNameField, contact.getFirstName()).append(sNameField,
											contact.getLastName())).append(idField, contact.getNumber())
													.append(pwdField, contact.getPassword())));

			for (int i = 0; i < extraInfoList.size(); i++) {
				for (int k = 1; k < extraInfoList.get(i).size(); k++) {
					db.getCollection(collectionName).updateOne(
							new Document(firstDoc + "." + idField, contact.getNumber()),
							new Document("$push", new Document(secondDoc + "." + extraInfoList.get(i).get(0),
									extraInfoList.get(i).get(k))));
				}
			}

			for (int i = 0; i < relationInfoList.size(); i++) {
				for (int k = 1; k < relationInfoList.get(i).size(); k++) {
					db.getCollection(collectionName).updateOne(
							new Document(firstDoc + "." + idField, contact.getNumber()),
							new Document("$push", new Document(thirdDoc + "." + relationInfoList.get(i).get(0),
									relationInfoList.get(i).get(k))));
				}
			}

			return true;
		} else {
			return false;
		}
	}

	// Same "problem" with the return, see createContact comments
	public void editContact(String number, Contact changedContact) {
		if (numberUsed(number)) {
			deleteContact(number);
			createContact(changedContact);// TODO nicer implementation??
		}
	}

	// Same "problem" with the return, see createContact comments
	public void deleteContact(String number) {
		if (numberUsed(number)) {
			db.getCollection(collectionName).deleteMany(new Document(firstDoc + "." + idField, number));
		}
	}

	private boolean numberUsed(String number) {
		if (db.getCollection(collectionName).find(new Document(firstDoc + "." + idField, "" + number))
				.first() != null) {
			return true;
		} else {
			return false;
		}
	}

	public Contact getContact(String number) {
		Contact contact = new Contact("-1");
		if (db.getCollection(collectionName).find(new Document(firstDoc + "." + idField, "" + number))
				.first() != null) {
			Document doc = db.getCollection(collectionName)
					.find(new Document(firstDoc + "." + idField, "" + number)).first();
			doc.values();
			System.out.println(doc.values());
			System.out.println(doc.containsKey(firstDoc));
			System.out.println(doc);
			return contact;
		} else {
			return contact;
		}
	}
}
