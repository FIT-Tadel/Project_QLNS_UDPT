package request.model;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;

@Entity
public class CheckIn {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private Integer employeeId;
    private String checkInDate;
    private String checkInTime;
    private String checkOutTime;
    private String confirmImagePath;

    // Getters and Setters
    
}
