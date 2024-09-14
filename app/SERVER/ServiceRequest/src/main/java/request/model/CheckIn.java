package request.model;

import java.time.LocalDate;
import java.time.LocalTime;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;

@Entity
@Table(name = "checkin")
public class CheckIn {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private Integer employeeId;
    private LocalDate checkInDate;
    private LocalTime checkInTime;
    private LocalTime checkOutTime;
    private String confirmImagePath;

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

    public LocalDate getCheckInDate() {
        return checkInDate;
    }

    public void setCheckInDate(LocalDate checkInDate) {
        this.checkInDate = checkInDate;
    }

    public LocalTime getCheckInTime() {
        return checkInTime;
    }

    public void setCheckInTime(LocalTime checkInTime) {
        this.checkInTime = checkInTime;
    }

    public LocalTime getCheckOutTime() {
        return checkOutTime;
    }

    public void setCheckOutTime(LocalTime checkOutTime) {
        this.checkOutTime = checkOutTime;
    }

    public String getConfirmImagePath() {
        return confirmImagePath;
    }

    public void setConfirmImagePath(String confirmImagePath) {
        this.confirmImagePath = confirmImagePath;
    }

    public CheckIn(Integer employeeId, LocalDate checkInDate, LocalTime checkInTime, LocalTime checkOutTime, String confirmImagePath) {
        super();
        this.employeeId = employeeId;
        this.checkInDate = checkInDate;
        this.checkInTime = checkInTime;
        this.checkOutTime = checkOutTime;
        this.confirmImagePath = confirmImagePath;
    }

    public CheckIn() {
        super();
    }

}
