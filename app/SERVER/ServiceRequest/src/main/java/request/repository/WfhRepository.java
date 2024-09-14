package request.repository;


import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;


import request.model.Wfh;

import java.util.List;

public interface WfhRepository extends CrudRepository<Wfh, Integer> {
    // CRUD methods
    @Query(value = "SELECT * FROM wfh", nativeQuery = true)
    List<Wfh> findAll();

    // Get WFH Request by EmployeeId
    @Query(value = "SELECT * FROM wfh WHERE employee_id = ?1", nativeQuery = true)
    List<Wfh> getWfhRequestByEmployeeId(Integer employeeId);

}