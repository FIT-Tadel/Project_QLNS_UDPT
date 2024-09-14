package request.repository;


import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import request.model.Leave_Request;

import java.util.List;

public interface LeaveRepository extends CrudRepository<Leave_Request, Integer> {
    // CRUD methods
    @Query(value = "SELECT * FROM leave_request", nativeQuery = true)
    List<Leave_Request> findAll();

    // Get Leave Request by EmployeeId
    @Query(value = "SELECT * FROM leave_request WHERE employee_id = ?1", nativeQuery = true)
    List<Leave_Request> getLeaveRequestByEmployeeId(Integer employeeId);
}