package com.connectify.backend.resources;

import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import com.connectify.backend.models.Contact;

@Path("/contact")
public class ContactRestService {

	@GET
	@Path("/get")
	@Produces(MediaType.APPLICATION_JSON)
	public Contact getContactInJSon() {

		Contact c = new Contact("+418528494", "Lasse", "Lingens", "hallowelt");

		return c;

	}

	@POST
	@Consumes({ MediaType.APPLICATION_JSON })
	@Produces({ MediaType.TEXT_PLAIN })
	@Path("/post")
	public String postMessage(Contact c) throws Exception {

		System.out.println("First Name = " + c.getFirstName());
		System.out.println("Last Name  = " + c.getLastName());

		return "ok";
	}

}