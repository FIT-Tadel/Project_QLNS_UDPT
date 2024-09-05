package employee.controller;

import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import employee.model.*;
import employee.repository.*;

import java.util.Optional;


@RestController
@RequestMapping("/api/employee")
public class EmployeeController {

    @Autowired
    EmployeeRepository employeeRepo;

    @Autowired
    CredentialRepository credentialRepo;

    @Autowired
    private PasswordEncoder passwordEncoder;
    
    //Test
    @GetMapping("/message")
    public ResponseEntity<String> Message() {
        return new ResponseEntity<>("Hello World!!!", HttpStatus.OK);
    } 
    
    //Get all employees
    // @GetMapping("/listall")
    // public ResponseEntity<List<Employee>> viewEmployeeList() {
    //     try {
    //         List<Employee> employeeList = (List<Employee>) repo.findAll();
    //         if (employeeList.isEmpty()) {
    //             return new ResponseEntity<>(HttpStatus.NO_CONTENT);
    //         }
    //         return new ResponseEntity<>(employeeList, HttpStatus.OK);
    //     } catch (Exception e) {
    //         return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
    //     }
    // }

    //Authentication
    @PostMapping("/login")
    public ResponseEntity<Integer> login(@RequestBody Credentials request) {
        Optional<Credentials> credentials = credentialRepo.findByUsername(request.getUsername());

        if (credentials.isPresent() == false) {
            return new ResponseEntity<>(-1, HttpStatus.OK);
        }
        if (passwordEncoder.matches(request.getPassword(), credentials.get().getPassword())) {
            return new ResponseEntity<>(1, HttpStatus.OK);
        }
        return new ResponseEntity<>(0, HttpStatus.OK);
    }

    //Get Role
    @PostMapping("/getrole")
    public ResponseEntity<String> getRole(@RequestBody String username) {
        Optional<Credentials> credentials = credentialRepo.findByUsername(username);
        return new ResponseEntity<>(credentials.get().getUserType(), HttpStatus.OK);
    }

    //Get credentials
    @GetMapping("/credential/{username}")
    public ResponseEntity<Credentials> getCredentialByUsername(@PathVariable String username) {
        Optional<Credentials> credential = credentialRepo.findByUsername(username);
        if (credential.isPresent()) {
            return new ResponseEntity<>(credential.get(), HttpStatus.OK);
        }
        return new ResponseEntity<>(null, HttpStatus.OK);
    }

    //Add credentials (add new user/account)
    @PostMapping("/register")
    public ResponseEntity<Credentials> addCredential(@RequestBody Credentials credentials) {
        try {
            Integer maxUserId = credentialRepo.findMaxUserId();
            credentials.setUserId(maxUserId + 1);
            Credentials _credential = credentialRepo.save(credentials);
            return new ResponseEntity<>(_credential, HttpStatus.CREATED);
        } catch (Exception e) {
            return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
        }
    }

    //Update credentials
    @PutMapping("/credential/update/{username}")
    public ResponseEntity<Credentials> updateCredential(@PathVariable String username, @RequestBody Credentials credentials) {
        Optional<Credentials> credentialData = credentialRepo.findByUsername(username);

        if (credentialData.isPresent()) {
            Credentials _credential = credentialData.get();
            if (credentials.getUsername() != null) {
                _credential.setUsername(credentials.getUsername());
            }
            if (credentials.getPassword() != null) {
                _credential.setPassword(passwordEncoder.encode(credentials.getPassword()));
            }
            if (credentials.getUserType() != null) {
                _credential.setUserType(credentials.getUserType());
            }
            if (credentials.getUserStatus() != null) {
                _credential.setUserStatus(credentials.getUserStatus());
            }
            
            return new ResponseEntity<>(credentialRepo.save(_credential), HttpStatus.OK);
        } else {
            return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
        }
    }
    

    //Get employee by id
    @GetMapping("/profile/{user_id}")
    public ResponseEntity<Employee> getEmployeeById(@PathVariable Integer user_id) {
        Optional<Employee> employee = employeeRepo.findById(user_id);
        if (employee.isPresent()) {
            return new ResponseEntity<>(employee.get(), HttpStatus.OK);
        }
        return new ResponseEntity<>(null, HttpStatus.OK);
    }

    //Add employee(profile)
    @PostMapping("/profile/add")
    public ResponseEntity<Employee> addEmployeeProfile(@RequestBody Employee employee) {
        try {
            Employee _employee = employeeRepo.save(employee);
            return new ResponseEntity<>(_employee, HttpStatus.CREATED);
        } catch (Exception e) {
            return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }

    //Update employee(profile)
    @PutMapping("/profile/update/{user_id}")
    public ResponseEntity<Employee> updateEmployeeProfile(@PathVariable Integer user_id, @RequestBody Employee employee) {
        Optional<Employee> employeeData = employeeRepo.findById(user_id);

        if (employeeData.isPresent()) {
            Employee _employee = employeeData.get();
            _employee.setName(employee.getName());
            _employee.setPhone(employee.getPhone());
            _employee.setAddress(employee.getAddress());
            _employee.setPersonalInfoJson(employee.getPersonalInfoJson());
            _employee.setImagePath(employee.getImagePath());
            return new ResponseEntity<>(employeeRepo.save(_employee), HttpStatus.OK);
        } else {
            employee.setId(user_id);
            return new ResponseEntity<>(employeeRepo.save(employee), HttpStatus.CREATED);
        }
    }

}