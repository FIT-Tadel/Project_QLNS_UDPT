package request.repository;


import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import request.model.Timesheet;

import java.util.List;

public interface TimeSheetRepository extends CrudRepository<Timesheet, Integer> {
    // CRUD methods
    @Query(value = "SELECT * FROM timesheet", nativeQuery = true)
    List<Timesheet> findAll();

    // Get TimeSheet by EmployeeId
    @Query(value = "SELECT * FROM timesheet WHERE employee_id = ?1", nativeQuery = true)
    List<Timesheet> getTimeSheetByEmployeeId(Integer employeeId);
}