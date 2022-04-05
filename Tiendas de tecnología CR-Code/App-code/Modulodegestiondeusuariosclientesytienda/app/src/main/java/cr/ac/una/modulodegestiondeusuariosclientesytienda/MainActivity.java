package cr.ac.una.modulodegestiondeusuariosclientesytienda;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    List<ListElement> elements;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        init();
    }

    public void init(){

        elements = new ArrayList<>();
        elements.add(new ListElement("#775447", "JafetSS", "Id:1", "Contraseña:1234A","Tipo:cliente","Activo"));
        elements.add(new ListElement("#607d8b", "Cris123", "Id:2", "Contraseña:4321A","Tipo:tienda","Activo"));
        elements.add(new ListElement("#03a9f4", "Alejandra123", "Id:3", "Contraseña:2314A","Tipo:cliente","Inactivo"));
        elements.add(new ListElement("#f44336", "Jessica123", "Id:4", "Contraseña:3214A","Tipo:cliente","Activo"));
        elements.add(new ListElement("#009688", "Armando123", "Id:5", "Contraseña:1234B","Tipo:tienda","Inactivo"));
        elements.add(new ListElement("#775447", "JafetSSS", "Id:6", "Contraseña:1234A","Tipo:cliente","Activo"));
        elements.add(new ListElement("#607d8b", "Cris1234", "Id:7", "Contraseña:4321A","Tipo:tienda","Activo"));
        elements.add(new ListElement("#03a9f4", "Alejandra1234", "Id:8", "Contraseña:2314A","Tipo:cliente","Inactivo"));
        elements.add(new ListElement("#f44336", "Jessica1234", "Id:9", "Contraseña:3214A","Tipo:cliente","Activo"));
        elements.add(new ListElement("#009688", "Armando1234", "Id:10", "Contraseña:1234B","Tipo:tienda","Inactivo"));

        ListAdapter listAdapter = new ListAdapter(elements, this);
        RecyclerView recyclerView = findViewById(R.id.listRecyclerView);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.setAdapter(listAdapter);
    }
}