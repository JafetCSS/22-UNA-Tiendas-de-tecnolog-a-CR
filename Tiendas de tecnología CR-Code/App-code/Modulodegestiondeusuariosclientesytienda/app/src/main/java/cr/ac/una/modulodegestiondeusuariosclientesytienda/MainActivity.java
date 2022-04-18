package cr.ac.una.modulodegestiondeusuariosclientesytienda;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;

import java.util.ArrayList;
import java.util.List;

import cr.ac.una.modulodegestiondeusuariosclientesytienda.data.DataAccountHelper;
import cr.ac.una.modulodegestiondeusuariosclientesytienda.domain.Account;

public class MainActivity extends AppCompatActivity {

    List<Account> accounts;
    DataAccountHelper connection;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        connection = new DataAccountHelper(this,"dbtiendatecnologiacr", null,1);
        init();
    }

    public void init(){

        connection.openDB();
        accounts = connection.getAccounts();;
        connection.closeDB();
        ManageAccountClientAndStoreListAdapter listAdapter = new ManageAccountClientAndStoreListAdapter(accounts, this,connection);
        RecyclerView recyclerView = findViewById(R.id.listRecyclerView);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.setAdapter(listAdapter);
    }
}