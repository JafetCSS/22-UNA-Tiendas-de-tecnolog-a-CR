package cr.ac.una.loginapp.data;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

import java.util.ArrayList;

import cr.ac.una.loginapp.domain.User;

public class DataUserHelper extends SQLiteOpenHelper {

    //Database name
    private static final String DATABASE_NAME = "user_database";
    //Table name
    private static final String TABLE_NAME = "user";
    //Columns name
    public static final String ID = "id";
    public static final String USERNAME = "username";
    public static final String PASSWORD = "password";
    public static final String USER_ID = "userid";

    //Table query
    private static final String CREATE_TABLE = "create table " + TABLE_NAME + "(" + ID + " INTEGER PRIMARY KEY AUTOINCREMENT," + USERNAME + " TEXT NOT NULL," +
            PASSWORD + " TEXT NOT NULL," + USER_ID + ");";

    public DataUserHelper(Context context) {
        super(context, DATABASE_NAME, null, 1);
    }

    @Override

    public void onCreate(SQLiteDatabase db) {
        db.execSQL(CREATE_TABLE);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {
        db.execSQL(" DROP TABLE IF EXISTS " + TABLE_NAME);
        onCreate(db);
    }

    public void open() {
        this.getWritableDatabase();
    }

    public void closeConnection() {
        super.close();
    }

    public void addUser(User user) {
        ContentValues contentValues = new ContentValues();
        contentValues.put(DataUserHelper.USERNAME, user.getUsername());
        contentValues.put(DataUserHelper.PASSWORD, user.getPassword());
        contentValues.put(DataUserHelper.USER_ID, user.getUserid());
        SQLiteDatabase sqLiteDatabase = this.getWritableDatabase();
        sqLiteDatabase.insert(DataUserHelper.TABLE_NAME, null, contentValues);
    }

    public ArrayList<User> getUsers() {
        ArrayList<User> users = new ArrayList<>();
        String query = "SELECT * FROM "+TABLE_NAME;
        Cursor cursor = this.getReadableDatabase().rawQuery(query, null);
        User user = null;
        while (cursor.moveToNext()) {
           // System.out.println(cursor.getString(1));
            user = new User();
            user.setUsername(cursor.getString(1));
            user.setPassword(cursor.getString(2));
            user.setUserid(cursor.getInt(3));
            users.add(user);
        }
        return users;
    }
}
