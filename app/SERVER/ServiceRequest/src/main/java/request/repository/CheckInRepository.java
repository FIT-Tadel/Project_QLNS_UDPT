package request.repository;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import request.model.CheckIn;

import java.time.LocalDate;
import java.util.List;

public interface CheckInRepository extends CrudRepository<CheckIn, Integer> {
    @Query(value = "SELECT * FROM checkin", nativeQuery = true)
    List<CheckIn> findAll();

    @Query(value = "SELECT * FROM checkin WHERE employee_id = ?1 AND MONTH(check_in_date) = ?2", nativeQuery = true)
    List<CheckIn> getCheckInHistory(Integer employeeId, Integer month);

    @Query(value = "SELECT * FROM checkin WHERE employee_id = ?1 AND check_in_date = ?2", nativeQuery = true)
    CheckIn isEmployeeCheckedIn(Integer employeeId, LocalDate date);
}
