package com.example.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.cloud.openfeign.EnableFeignClients;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import java.util.List;
import java.util.Map;

@SpringBootApplication
@EnableFeignClients
@Controller
public class ClientAppApplication {

	public static void main(String[] args) {			
		SpringApplication.run(ClientAppApplication.class, args);
	}
	
	@Autowired
	IClientMessageProxy proxy;
	
	//Test
	@RequestMapping(value = "/api/message")
	public ModelAndView getMessage() {
		String info = proxy.getMessage();
		return new ModelAndView("employee.html","info",info);
	}
	
	@RequestMapping(value= "/api/employee")
    public ModelAndView getAllEmployees() {
		List<Map<String, Object>> employees = proxy.getAllEmployees();
        return new ModelAndView("employee.html","employees", employees);
    }

	//Authentication
	@RequestMapping(value = "/api/employee/login", method=RequestMethod.POST)
	public ResponseEntity<Integer> loginUser(@RequestBody Map<String, String> credentials) {
		try {
	        return proxy.validateUser(credentials);
	    } catch (Exception e) {
	        return new ResponseEntity<>(0, HttpStatus.INTERNAL_SERVER_ERROR);
	    }
    }

	//Get Role
	@RequestMapping(value = "/api/employee/getrole", method=RequestMethod.POST)
	public ResponseEntity<String> getRole(@RequestBody String username) {
	    return proxy.getRole(username);
	}

	//Get credentials
	@RequestMapping(value = "/api/employee/credential/{username}", method=RequestMethod.GET)
	public ResponseEntity<Map<String, Object>> getCredentialByUsername(@PathVariable("username") String username) {
	    return new ResponseEntity<>(proxy.getCredentialByUsername(username).getBody(), HttpStatus.OK);
	}

	//Add credentials (new user)
	@RequestMapping(value = "/api/employee/register", method=RequestMethod.POST)
	public ResponseEntity<Map<String, Object>> addCredential(@RequestBody Map<String, Object> credential) {
	    return new ResponseEntity<>(proxy.addCredential(credential).getBody(), HttpStatus.OK);
	} 

	//Update credentials
	@RequestMapping(value = "/api/employee/credential/update/{username}", method=RequestMethod.PUT)
	public ResponseEntity<Map<String, Object>> updateCredential(@PathVariable("username") String username, @RequestBody Map<String, Object> credential) {
	    return new ResponseEntity<>(proxy.updateCredential(username, credential).getBody(), HttpStatus.OK);
	}

	// ======================Employee Endpoint======================
	//Get Employee by ID
	@RequestMapping(value = "/api/employee/profile/{id}", method=RequestMethod.GET)
	public ResponseEntity<Map<String, Object>> getEmployeeById(@PathVariable("id") int id) {
	    return new ResponseEntity<>(proxy.getEmployeeById(id).getBody(), HttpStatus.OK);
	}

	//Add Employee(Profile)
	@RequestMapping(value = "/api/employee/profile/add", method=RequestMethod.POST)
	public ResponseEntity<Map<String, Object>> addEmployeeProfile(@RequestBody Map<String, Object> employee) {
	    return new ResponseEntity<>(proxy.addEmployeeProfile(employee).getBody(), HttpStatus.OK);
	}

	//Update Employee(Profile)
	@RequestMapping(value = "/api/employee/profile/update/{user_id}", method=RequestMethod.PUT)
	public ResponseEntity<Map<String, Object>> updateEmployeeProfile(@PathVariable("user_id") Integer user_id, @RequestBody Map<String, Object> employee) {
	    return new ResponseEntity<>(proxy.updateEmployeeProfile(user_id, employee).getBody(), HttpStatus.OK);
	}
}
