package request.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import request.model.*;
import request.repository.*;

import java.util.List;


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
    
    //Test Api
    @GetMapping("/message")
    public ResponseEntity<String> Message() {
        return new ResponseEntity<>("Hello World!!!", HttpStatus.OK);
    } 

    // ------------------- CheckIn -------------------
    //Get All CheckIn
    @GetMapping("/checkin/all")
    public ResponseEntity<List<CheckIn>> getAllCheckIn() {
        List<CheckIn> checkin = CheckInRepo.findAll();
        return new ResponseEntity<>(checkin, HttpStatus.OK);
    }

    //Get CheckIn by EmployeeId (use employeeId, Month)
    @GetMapping("/checkin/{employeeId}/{month}")
    public ResponseEntity<List<CheckIn>> getCheckInHistoryByEmployeeId(@PathVariable Integer employeeId, @PathVariable Integer month) {
        List<CheckIn> checkin = CheckInRepo.getCheckInHistory(employeeId, month);
        return new ResponseEntity<>(checkin, HttpStatus.OK);
    }

    //Employee CheckIn
    @PostMapping("/checkin")
    public ResponseEntity<CheckIn> checkIn(@RequestBody CheckIn checkin) {
        //Check if employee already checked in today
        CheckIn isEmployeeCheckedIn = CheckInRepo.isEmployeeCheckedIn(checkin.getEmployeeId(), checkin.getCheckInDate());
        if (isEmployeeCheckedIn != null) {
            return new ResponseEntity<>(null, HttpStatus.OK);
        }
        //Save CheckIn
        CheckIn checkIn = CheckInRepo.save(checkin);
        return new ResponseEntity<>(checkIn, HttpStatus.CREATED);
    }
    
    //Employee CheckOut
    @PutMapping("/checkout")
    public ResponseEntity<CheckIn> checkOut(@RequestBody CheckIn checkin) {
        CheckIn isEmployeeCheckedIn = CheckInRepo.isEmployeeCheckedIn(checkin.getEmployeeId(), checkin.getCheckInDate());
        isEmployeeCheckedIn.setCheckOutTime(checkin.getCheckOutTime());
        CheckIn checkOut = CheckInRepo.save(isEmployeeCheckedIn);
        return new ResponseEntity<>(checkOut, HttpStatus.CREATED);
    }
    

    // ------------------- Leave -------------------
    @GetMapping("/leave/all")
    public ResponseEntity<List<Leave_Request>> getAllLeave() {
        List<Leave_Request> leave = LeaveRepo.findAll();
        return new ResponseEntity<>(leave, HttpStatus.OK);
    }

    @GetMapping("/leave/{employeeId}")
    public ResponseEntity<List<Leave_Request>> getLeaveRequestByEmployeeId(@PathVariable Integer employeeId) {
        List<Leave_Request> leave = LeaveRepo.getLeaveRequestByEmployeeId(employeeId);
        return new ResponseEntity<>(leave, HttpStatus.OK);
    }

    @PostMapping("/leave")
    public ResponseEntity<Leave_Request> createLeaveRequest(@RequestBody Leave_Request leave) {
        Leave_Request newLeave = LeaveRepo.save(leave);
        return new ResponseEntity<>(newLeave, HttpStatus.CREATED);
    }

    // ------------------- TimeSheet -------------------
    @GetMapping("/timesheet/all")
    public ResponseEntity<List<Timesheet>> getAllTimeSheet() {
        List<Timesheet> timesheet = TimeSheetRepo.findAll();
        return new ResponseEntity<>(timesheet, HttpStatus.OK);
    }

    @GetMapping("/timesheet/{employeeId}")
    public ResponseEntity<List<Timesheet>> getTimeSheetByEmployeeId(@PathVariable Integer employeeId) {
        List<Timesheet> timesheet = TimeSheetRepo.getTimeSheetByEmployeeId(employeeId);
        return new ResponseEntity<>(timesheet, HttpStatus.OK);
    }

    @PostMapping("/timesheet")
    public ResponseEntity<Timesheet> createUpdateTimeSheetRequest(@RequestBody Timesheet timesheet) {
        Timesheet newTimeSheet = TimeSheetRepo.save(timesheet);
        return new ResponseEntity<>(newTimeSheet, HttpStatus.CREATED);
    }

    // ------------------- WFH -------------------
   
    @GetMapping("/wfh/all")
    public ResponseEntity<List<Wfh>> getAllWfhRequest() {
        List<Wfh> wfh = WfhRepo.findAll();
        return new ResponseEntity<>(wfh, HttpStatus.OK);
    }

    @GetMapping("/wfh/{employeeId}")
    public ResponseEntity<List<Wfh>> getWfhRequestByEmployeeId(@PathVariable Integer employeeId) {
        List<Wfh> wfh = WfhRepo.getWfhRequestByEmployeeId(employeeId);
        return new ResponseEntity<>(wfh, HttpStatus.OK);
    }

    @PostMapping("/wfh")
    public ResponseEntity<Wfh> createWfhRequest(@RequestBody Wfh wfh) {
        Wfh newWfh = WfhRepo.save(wfh);
        return new ResponseEntity<>(newWfh, HttpStatus.CREATED);
    }

}