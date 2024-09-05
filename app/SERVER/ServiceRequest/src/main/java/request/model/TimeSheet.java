package request.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class TimeSheet {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private Integer employeeId;
    private String dateSelect;
    private String timeIn;
    private String timeOut;
    private String breakStartTime;
    private String breakEndTime;
    private String overTimeHours;
    private String overTimeReason;
    private String requestStatus;
    private String createdDate;
    private String updatedDate;
        

    // Getters and Setters
    
}

