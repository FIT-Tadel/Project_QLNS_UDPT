package com.example.demo;

import org.springframework.cloud.openfeign.FeignClient;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.util.List;
import java.util.Map;

@FeignClient("Service-Employee")
public interface IClientMessageProxy {
	
	//Test
	@GetMapping(value = "/api/message")
	String getMessage();
	
	//Get All Employee
	@GetMapping("/api/employee")
    List<Map<String, Object>> getAllEmployees();
	
	// ======================Credential Interface Endpoint======================
	//Authentication
	@RequestMapping(value="/api/employee/login", method=RequestMethod.POST)
	ResponseEntity<Integer> validateUser(@RequestBody Map<String, String> credentials);

	//Get Role
	@RequestMapping(value="/api/employee/getrole", method=RequestMethod.POST)
	ResponseEntity<String> getRole(@RequestBody String username);
	
	//Get credentials
	@GetMapping("/api/employee/credential/{username}")
	ResponseEntity<Map<String, Object>> getCredentialByUsername(@PathVariable("username") String username);

	//Add credentials
	@RequestMapping(value="/api/employee/register", method=RequestMethod.POST)
	ResponseEntity<Map<String, Object>> addCredential(@RequestBody Map<String, Object> credential);

	//Update credentials
	@RequestMapping(value="/api/employee/credential/update/{username}", method=RequestMethod.PUT)
	ResponseEntity<Map<String, Object>> updateCredential(@PathVariable("username") String username, @RequestBody Map<String, Object> credential);

	// ======================Employee Interface Endpoint======================

	//Get Employee by ID
	@GetMapping("/api/employee/profile/{id}")
	ResponseEntity<Map<String, Object>> getEmployeeById(@PathVariable("id") int id);

	//Add Employee(Profile)
	@RequestMapping(value="/api/employee/profile/add", method=RequestMethod.POST)
	ResponseEntity<Map<String, Object>> addEmployeeProfile(@RequestBody Map<String, Object> employee);

	//Update Employee(Profile)
	@RequestMapping(value="/api/employee/profile/update/{user_id}", method=RequestMethod.PUT)
	ResponseEntity<Map<String, Object>> updateEmployeeProfile(@PathVariable("user_id") Integer user_id, @RequestBody Map<String, Object> employee);


}
