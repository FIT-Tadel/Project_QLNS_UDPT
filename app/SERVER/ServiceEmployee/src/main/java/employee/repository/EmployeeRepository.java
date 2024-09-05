package employee.repository;


import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;


import employee.model.Employee;
import java.util.Optional;

public interface EmployeeRepository extends CrudRepository<Employee, Integer> {
    // CRUD methods
    @Query("SELECT e FROM Employee e WHERE e.user_id = :id")
    Optional<Employee> findById(Integer id);
}