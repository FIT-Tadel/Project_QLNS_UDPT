package com.example.demo.model;

import java.util.List;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;

@Entity
public class user_point {
	 @Id
	 private String user_id;
	 private String username;
	 private int user_points;
	 private List<String> vouchers;
	
	 public String getId() {
	        return user_id;
	  }

     public void setId(String user_id) {
        this.user_id = user_id;
     }
     
     public String getUsername() {
         return username;
     }

     public void setUsername(String username) {
         this.username = username;
     }

     public int getPoints() {
         return user_points;
     }

     public void setPoints(int user_points) {
         this.user_points = user_points;
     }

     public List<String> getVouchers() {
        return vouchers;
     }

     public void setVouchers(List<String> vouchers) {
         this.vouchers = vouchers;
     }
     
     public user_point(String user_id, String username, int user_points, List<String> vouchers) {
    	 super();
    	 this.user_id = user_id;
    	 this.username = username;
    	 this.user_points = user_points;
    	 this.vouchers = vouchers;
    	 
     }
     
     public user_point() {
    	 super();
     }

}
