package cr.ac.una.loginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.regex.*; //the password using ReGex (expresiones regulares)

import cr.ac.una.loginapp.data.DataUserHelper;
import cr.ac.una.loginapp.domain.User;

public class MainActivity extends AppCompatActivity {

    private EditText editText_username;
    private EditText editText_password;
    private DataUserHelper connection;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        this.editText_username = findViewById(R.id.txt_username);
        this.editText_password = findViewById(R.id.txt_password);
        this.connection = new DataUserHelper(this);
    }

    public void checkData(View view) {
         final String USERNAME = "admin";
        final String PASSWORD = "Hey@lei123";

        String username = this.editText_username.getText().toString();
        String password = this.editText_password.getText().toString();

       //User user = new User(USERNAME,PASSWORD,1); //first user in database
        this.connection.open();
        //this.connection.addUser(user); //add first user to work login, remember insert first register to try enter username and password
        ArrayList<User> users = this.connection.getUsers();
        if (!this.editText_username.getText().toString().isEmpty() && !this.editText_password.getText().toString().isEmpty()) {

            if (validatePassword(password)) { //to start validate password format
                for (User user : users) {
                    enterData(username,password,user);
               }
            } else {
                this.editText_username.setText("");
                this.editText_password.setText("");
                Toast.makeText(this, "Formato de contrasenia Invalido,Debe contener numeros 0-9,caracteres especial(/#@%$&+=),letra A-Z y a-z", Toast.LENGTH_SHORT).show();
            }
        } else {
            Toast.makeText(this, "Debe completar los espacios", Toast.LENGTH_LONG).show();
        }
        this.connection.closeConnection();
    }

    private void enterData(String username,String password,User user){
        if (user.getUsername().equals(username) && user.getPassword().equals(password)) {
            Toast.makeText(this, "Te damos la bienvenida", Toast.LENGTH_SHORT).show();
        } else {
            Toast.makeText(this, "Los datos son incorrectos!", Toast.LENGTH_SHORT).show();
            this.editText_username.setText("");
            this.editText_password.setText("");
        }
    }

    private boolean validatePassword(String password) {
        //expresion regular para validar la contrasenia
        String regex = "^(?=.*[0-9])"
                + "(?=.*[a-z])(?=.*[A-Z])"
                + "(?=.*[@#$%^&+=])"
                + "(?=\\S+$).{8,20}$";
        Pattern pattern = Pattern.compile(regex);
        Matcher matcher = pattern.matcher(password);
        //retorna true si el pw cumple el formato caso contrario false
        System.out.println(matcher.matches());
        return matcher.matches();
    }
}