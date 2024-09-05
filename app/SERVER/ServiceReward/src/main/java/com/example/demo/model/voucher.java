package com.example.demo.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;


@Entity
public class voucher {
	
	@Id
	//auto increment
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Integer id;
	private String maVC;
	private String tenVC;
	private int cost;
	
	public String getMaVC() {
		return maVC;
	}
	public void setMaVC(String maVC) {
		this.maVC = maVC;
	}
	
	public String getTenVC() {
		return tenVC;
	}
	public void setTenVC(String tenVC) {
		this.tenVC = tenVC;
	}
	
	public int getCost() {
		return cost;
	}
	public void setCost(int cost) {
		this.cost = cost;
	}
	
	public voucher(String maVC, String tenVC, int cost) {
		super();
		this.maVC = maVC;
		this.tenVC = tenVC;
		this.cost = cost;
	}
	
	public voucher() {
		super();
	}
}
