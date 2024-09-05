package employee.model;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;

@Entity
public class Employee {
    @Id
    private Integer user_id;
    private String name;
    private String phone;
    private String address;
    private String personal_info_json;
    private String image_path;

    // Getters and Setters
    public Integer getId() {
        return user_id;
    }

    public void setId(Integer id) {
        this.user_id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getPersonalInfoJson() {
        return personal_info_json;
    }

    public void setPersonalInfoJson(String personal_info_json) {
        this.personal_info_json = personal_info_json;
    }

    public String getImagePath() {
        return image_path;
    }

    public void setImagePath(String image_path) {
        this.image_path = image_path;
    }

    public Employee(Integer id, String name, String phone, String address, String personal_info_json, String image_path) {
        super();
        this.user_id = id;
        this.name = name;
        this.phone = phone;
        this.address = address;
        this.personal_info_json = personal_info_json;
        this.image_path = image_path;
    }

    public Employee() {
    	super(); 
    }
}
