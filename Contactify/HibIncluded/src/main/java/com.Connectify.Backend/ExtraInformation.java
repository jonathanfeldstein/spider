package com.Contactify.Backend;

import java.util.ArrayList;
import java.util.List;
import javax.persistence.*;

//not good
@Entity
public class ExtraInformation {
	@Id
	private String number;
	
 	@Column
    	private String category;
	
	@ElementCollection
    	private List<String> data=new ArrayList<String>();;
	
	public ExtraInformation(String number, String category, List<String> data){
		this.number=number;
		this.category = category;
		this.data = data;
	}	

	public ExtraInformation(String category){
		this.category = category;
	}

	public String getCategory(){
		return category;
	}

	public void setCategory(String category){
		this.category=category;
	}

	public void addData(String entry){
		data.add(entry);
	}

	public List<String> getData(){
		return data;
	}
}
