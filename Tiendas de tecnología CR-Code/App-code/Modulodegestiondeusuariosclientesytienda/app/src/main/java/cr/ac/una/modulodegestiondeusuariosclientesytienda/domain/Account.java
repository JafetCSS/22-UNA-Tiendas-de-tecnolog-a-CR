package cr.ac.una.modulodegestiondeusuariosclientesytienda.domain;

public class Account{

    private int account_id;
    private String account_username;
    private String account_password;
    private String account_type;
    private int account_state;
    private int account_typeId;

    public Account() {

    }

    public Account(int account_id, String account_username, String account_password, String account_type, int account_state, int account_typeId) {
        this.account_id = account_id;
        this.account_username = account_username;
        this.account_password = account_password;
        this.account_type = account_type;
        this.account_state = account_state;
        this.account_typeId = account_typeId;
    }

    public void setAccountId(int account_id) {
        this.account_id = account_id;
    }

    public void setAccountUsername(String account_username) {
        this.account_username = account_username;
    }

    public void setAccountPassword(String account_password) {
        this.account_password = account_password;
    }

    public void setAccountType(String account_type) {
        this.account_type = account_type;
    }

    public void setAccountState(int account_state) {
        this.account_state = account_state;
    }

    public void setAccountTypeId(int account_typeId) {
        this.account_typeId = account_typeId;
    }

    public int getAccountId() {
        return account_id;
    }

    public String getAccountUsername() {
        return account_username;
    }

    public String getAccountPassword() {
        return account_password;
    }

    public String getAccountType() {
        return account_type;
    }

    public int getAccountState() {
        return account_state;
    }

    public int getAccountTypeId() {
        return account_typeId;
    }
}
