package employee.repository;

import java.util.Optional;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import employee.model.Credentials;

public interface CredentialRepository extends CrudRepository<Credentials, Integer> {

    // Find by username
    @Query(value="SELECT * FROM Credentials WHERE BINARY username = :username", nativeQuery = true)
    Optional<Credentials> findByUsername(String username);

    // Find max user id
    @Query("SELECT COALESCE(MAX(c.userId), 0) FROM Credentials c")
    Integer findMaxUserId();
    
}
