package request.model;

import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.LocalTime;

import jakarta.persistence.Entity;
import jakarta.persistence.EnumType;
import jakarta.persistence.Enumerated;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "timesheet")
public class Timesheet {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private Integer employeeId;
    private LocalDate dateSelect; 
    private LocalTime timeIn;
    private LocalTime timeOut;   
    private LocalTime breakStartTime;  
    private LocalTime breakEndTime;   
    private String overTimeHours;
    private String updateSheetReason;

    @Enumerated(EnumType.STRING) 
    private TimeSheetStatus requestStatus;

    private LocalDateTime createdDate;  
    private LocalDateTime updatedDate;  

    // RequestStatus Enum
    public enum TimeSheetStatus {
        PENDING,
        APPROVED,
        REJECTED, 
        CANCELED
    }

    // Getters and Setters
    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getEmployeeId() {
        return employeeId;
    }

    public void setEmployeeId(Integer employeeId) {
        this.employeeId = employeeId;
    }

    public LocalDate getDateSelect() {
        return dateSelect;
    }

    public void setDateSelect(LocalDate dateSelect) {
        this.dateSelect = dateSelect;
    }

    public LocalTime getTimeIn() {
        return timeIn;
    }

    public void setTimeIn(LocalTime timeIn) {
        this.timeIn = timeIn;
    }

    public LocalTime getTimeOut() {
        return timeOut;
    }

    public void setTimeOut(LocalTime timeOut) {
        this.timeOut = timeOut;
    }

    public LocalTime getBreakStartTime() {
        return breakStartTime;
    }

    public void setBreakStartTime(LocalTime breakStartTime) {
        this.breakStartTime = breakStartTime;
    }

    public LocalTime getBreakEndTime() {
        return breakEndTime;
    }

    public void setBreakEndTime(LocalTime breakEndTime) {
        this.breakEndTime = breakEndTime;
    }

    public String getOverTimeHours() {
        return overTimeHours;
    }

    public void setOverTimeHours(String overTimeHours) {
        this.overTimeHours = overTimeHours;
    }

    public String getUpdateSheetReason() {
        return updateSheetReason;
    }

    public void setUpdateSheetReason(String updateSheetReason) {
        this.updateSheetReason = updateSheetReason;
    }

    public TimeSheetStatus getRequestStatus() {
        return requestStatus;
    }

    public void setRequestStatus(TimeSheetStatus requestStatus) {
        this.requestStatus = requestStatus;
    }

    public LocalDateTime getCreatedDate() {
        return createdDate;
    }

    public void setCreatedDate(LocalDateTime createdDate) {
        this.createdDate = createdDate;
    }

    public LocalDateTime getUpdatedDate() {
        return updatedDate;
    }

    public void setUpdatedDate(LocalDateTime updatedDate) {
        this.updatedDate = updatedDate;
    }

    public Timesheet(Integer id, Integer employeeId, LocalDate dateSelect, LocalTime timeIn, LocalTime timeOut,
            LocalTime breakStartTime, LocalTime breakEndTime, String overTimeHours, String updateSheetReason,
            TimeSheetStatus requestStatus, LocalDateTime createdDate, LocalDateTime updatedDate) {
        super();
        this.id = id;
        this.employeeId = employeeId;
        this.dateSelect = dateSelect;
        this.timeIn = timeIn;
        this.timeOut = timeOut;
        this.breakStartTime = breakStartTime;
        this.breakEndTime = breakEndTime;
        this.overTimeHours = overTimeHours;
        this.updateSheetReason = updateSheetReason;
        this.requestStatus = requestStatus;
        this.createdDate = createdDate;
        this.updatedDate = updatedDate;
    }

    public Timesheet() {
        super();
    }
    
}

