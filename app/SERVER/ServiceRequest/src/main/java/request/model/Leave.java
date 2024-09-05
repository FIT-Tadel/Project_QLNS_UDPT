package request.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Leave {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private Integer employeeId;
    private String leaveFrom;
    private String leaveTo;
    private String reasonLeave;
    private String requestStatus;
    private String createdDate;
    private String updatedDate;    

    // Getters and Setters
    
}

