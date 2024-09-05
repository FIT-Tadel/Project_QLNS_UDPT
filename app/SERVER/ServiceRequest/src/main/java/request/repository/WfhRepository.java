package request.repository;


import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;


import request.model.WFH;
import java.util.Optional;

public interface WfhRepository extends CrudRepository<WFH, Integer> {
    // CRUD methods
    Optional<WFH> findById(Integer id);
}