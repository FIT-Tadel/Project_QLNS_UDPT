package com.example.demo.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.demo.model.user_point;

public interface user_pointRepo extends JpaRepository<user_point, String> {
	@Query("SELECT u FROM user_point u WHERE u.username = :username")
	user_point findByUsername(String username);

}
