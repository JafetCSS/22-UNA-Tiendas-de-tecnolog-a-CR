package cr.ac.una.modulodegestiondeusuariosclientesytienda.data;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

import java.util.ArrayList;

import cr.ac.una.modulodegestiondeusuariosclientesytienda.domain.Account;

public class DataAccountHelper extends SQLiteOpenHelper{


    public DataAccountHelper(@Nullable Context context, @Nullable String name, @Nullable SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        String query = "CREATE TABLE tbaccount(id integer primary key autoincrement, username text, password text, type text, state integer, typeid integer);";
        db.execSQL(query);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {

    }

    public void openDB(){

        super.getWritableDatabase();
    }

    public void closeDB(){

        super.close();
    }

    public void addAccount(Account account){

        ContentValues values = new ContentValues();
        values.put("username",account.getAccountUsername());
        values.put("password", account.getAccountPassword());
        values.put("type", account.getAccountType());
        values.put("state", account.getAccountState());
        values.put("typeid", account.getAccountTypeId());
        this.getWritableDatabase().insert("tbaccount",null,values);
    }

    public void updateAccount(Account account){

        ContentValues values = new ContentValues();
        values.put("username",account.getAccountUsername());
        values.put("password", account.getAccountPassword());
        values.put("type", account.getAccountType());
        values.put("state", account.getAccountState());
        values.put("typeid", account.getAccountTypeId());
        String whereClause = "id = "+account.getAccountId();
        this.getWritableDatabase().update("tbaccount",values,whereClause,null);
    }

    public ArrayList<Account> getAccounts(){

        ArrayList accounts = new ArrayList<Account>();
        String query = "SELECT * FROM tbaccount;";
        Cursor cursor = this.getReadableDatabase().rawQuery(query,null);
        Account account = null;
        while (cursor.moveToNext()){

            account = new Account();
            account.setAccountId(cursor.getInt(0));
            account.setAccountUsername(cursor.getString(1));
            account.setAccountPassword(cursor.getString(2));
            account.setAccountType(cursor.getString(3));
            account.setAccountState(cursor.getInt(4));
            account.setAccountTypeId(cursor.getInt(5));
            accounts.add(account);
        }
        return accounts;
    }
}
