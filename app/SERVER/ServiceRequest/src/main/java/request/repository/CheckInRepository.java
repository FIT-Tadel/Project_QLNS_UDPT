package request.repository;

import java.util.Optional;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import request.model.CheckIn;

public interface CheckInRepository extends CrudRepository<CheckIn, Integer> {
    Optional<CheckIn> findByUsername(String username);

    // Find max id row
    @Query("SELECT COALESCE(MAX(c.userId), 0) FROM Credentials c")
    Integer findMaxUserId();
    
}
