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
@Table(name = "leave_request")
public class Leave_Request {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private Integer employeeId;
    private LocalDate leaveFrom;
    private LocalDate leaveTo;
    private String reasonLeave;

    @Enumerated(EnumType.STRING)
    private LeaveStatus requestStatus;

    private LocalDateTime createdDate;
    private LocalDateTime updatedDate;

    // Enum For requestStatus
    public enum LeaveStatus {
        PENDING, APPROVED, REJECTED, CANCELED
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


    public LocalDate getLeaveFrom() {
        return leaveFrom;
    }

    public void setLeaveFrom(LocalDate leaveFrom) {
        this.leaveFrom = leaveFrom;
    }

    public LocalDate getLeaveTo() {
        return leaveTo;
    }

    public void setLeaveTo(LocalDate leaveTo) {
        this.leaveTo = leaveTo;
    }

    public String getReasonLeave() {
        return reasonLeave;
    }

    public void setReasonLeave(String reasonLeave) {
        this.reasonLeave = reasonLeave;
    }

    public LeaveStatus getRequestStatus() {
        return requestStatus;
    }

    public void setRequestStatus(LeaveStatus requestStatus) {
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

    public Leave_Request(Integer id, Integer employeeId, LocalDate leaveFrom, LocalDate leaveTo, String reasonLeave,
            LeaveStatus requestStatus, LocalDateTime createdDate, LocalDateTime updatedDate) {
        super();
        this.id = id;
        this.employeeId = employeeId;
        this.leaveFrom = leaveFrom;
        this.leaveTo = leaveTo;
        this.reasonLeave = reasonLeave;
        this.requestStatus = requestStatus;
        this.createdDate = createdDate;
        this.updatedDate = updatedDate;
    }

    public Leave_Request() {
        super();
    }

}

