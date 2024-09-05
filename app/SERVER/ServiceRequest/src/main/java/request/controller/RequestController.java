package request.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import request.model.*;
import request.repository.*;

import java.util.Optional;


@RestController
@RequestMapping("/api/request")
public class RequestController {

    @Autowired
    CheckInRepository CheckInRepo;

    @Autowired
    LeaveRepository LeaveRepo;
	
    @Autowired
    TimeSheetRepository TimeSheetRepo;

    @Autowired
    WfhRepository WfhRepo;
    
    //Test
    @GetMapping("/message")
    public ResponseEntity<String> Message() {
        return new ResponseEntity<>("Hello World!!!", HttpStatus.OK);
    } 



    //Leave Request
    //@PostMapping("/leave/add")
    
    //..other requests
   
}