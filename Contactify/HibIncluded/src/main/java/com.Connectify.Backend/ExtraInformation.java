package com.Contactify.Backend;

import java.util.ArrayList;
import java.util.List;
import javax.persistence.*;

@Embeddable
public class ExtraInformation {

    	private String category;
    	private List<String> data=new ArrayList<String>();;
	
	public ExtraInformation(String category, List<String> data){
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
