package request.repository;


import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;


import request.model.TimeSheet;
import java.util.Optional;

public interface TimeSheetRepository extends CrudRepository<TimeSheet, Integer> {
    // CRUD methods
    Optional<TimeSheet> findById(Integer id);
}