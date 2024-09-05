package request.repository;


import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;


import request.model.Leave;
import java.util.Optional;

public interface LeaveRepository extends CrudRepository<Leave, Integer> {
    // CRUD methods
    Optional<Leave> findById(Integer id);
}