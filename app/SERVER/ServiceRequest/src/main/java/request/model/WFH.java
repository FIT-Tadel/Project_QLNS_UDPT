package request.model;

import java.time.LocalDate;
import java.time.LocalDateTime;

import jakarta.persistence.Entity;
import jakarta.persistence.EnumType;
import jakarta.persistence.Enumerated;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "wfh")
public class Wfh {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;
    private Integer employeeId;
    private LocalDate dateSelect;
    private String wfhReason;

    @Enumerated(EnumType.STRING)
    private RequestStatus requestStatus;

    private LocalDateTime createdDate;
    private LocalDateTime updatedDate;

    public enum RequestStatus {
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

    public String getWfhReason() {
        return wfhReason;
    }

    public void setWfhReason(String wfhReason) {
        this.wfhReason = wfhReason;
    }

    public RequestStatus getRequestStatus() {
        return requestStatus;
    }

    public void setRequestStatus(RequestStatus requestStatus) {
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

    public Wfh(Integer id, Integer employeeId, LocalDate dateSelect, String wfhReason, RequestStatus requestStatus,
            LocalDateTime createdDate, LocalDateTime updatedDate) {
        super();
        this.id = id;
        this.employeeId = employeeId;
        this.dateSelect = dateSelect;
        this.wfhReason = wfhReason;
        this.requestStatus = requestStatus;
        this.createdDate = createdDate;
        this.updatedDate = updatedDate;
    }

    public Wfh() {
        super();
    }
} 
    


