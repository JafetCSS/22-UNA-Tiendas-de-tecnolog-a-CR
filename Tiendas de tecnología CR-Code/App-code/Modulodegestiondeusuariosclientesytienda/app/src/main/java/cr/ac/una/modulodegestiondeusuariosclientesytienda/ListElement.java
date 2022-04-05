package cr.ac.una.modulodegestiondeusuariosclientesytienda;

public class ListElement {

    private String color;
    private String userName;
    private String id;
    private String password;
    private String userType;
    private String state;

    public ListElement(String color, String userName, String id, String password, String userType, String state) {
        this.color = color;
        this.userName = userName;
        this.id = id;
        this.password = password;
        this.userType = userType;
        this.state = state;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public void setId(String id) {
        this.id = id;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public void setUserType(String userType) {
        this.userType = userType;
    }

    public void setState(String state) {
        this.state = state;
    }

    public String getColor() {
        return color;
    }

    public String getUserName() {
        return userName;
    }

    public String getId() {
        return id;
    }

    public String getPassword() {
        return password;
    }

    public String getUserType() {
        return userType;
    }

    public String getState() {
        return state;
    }
}
