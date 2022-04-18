package cr.ac.una.modulodegestiondeusuariosclientesytienda;

import android.content.Context;
import android.graphics.Color;
import android.graphics.PorterDuff;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

import cr.ac.una.modulodegestiondeusuariosclientesytienda.data.DataAccountHelper;
import cr.ac.una.modulodegestiondeusuariosclientesytienda.domain.Account;

public class ManageAccountClientAndStoreListAdapter extends RecyclerView.Adapter<ManageAccountClientAndStoreListAdapter.ViewHolder>{

    private List<Account> mData;
    private LayoutInflater mInflater;
    private Context context;
    private DataAccountHelper connection;

    public ManageAccountClientAndStoreListAdapter(List<Account> itemList, Context context, DataAccountHelper connection){

        this.mInflater = LayoutInflater.from(context);
        this.context = context;
        this.mData = itemList;
        this.connection = connection;
    }

    @Override
    public int getItemCount() {return mData.size();}

    @Override
    public ManageAccountClientAndStoreListAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType){

        View view = mInflater.inflate(R.layout.account_element, null);
        return new ManageAccountClientAndStoreListAdapter.ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final ManageAccountClientAndStoreListAdapter.ViewHolder holder, final int position) {

        holder.bindData(mData.get(position), position);
    }

    public void setItems(List<Account> items){mData = items;}

    public class ViewHolder extends RecyclerView.ViewHolder {

        ImageView iconImage;
        TextView userName, id, password, userType, state;
        Button blockUserButton;

        ViewHolder (View itemView){

            super(itemView);
            iconImage = itemView.findViewById(R.id.iconImageView);
            userName = itemView.findViewById(R.id.userNameTextView);
            id = itemView.findViewById(R.id.idTextView);
            password = itemView.findViewById(R.id.passwordTextView);
            userType = itemView.findViewById(R.id.userTypeTextView);
            state = itemView.findViewById(R.id.stateTextView);
            blockUserButton = itemView.findViewById(R.id.blockUserButton);
        }

        void bindData(final Account item, final int position){

            iconImage.setColorFilter(Color.parseColor("#03a9f4"), PorterDuff.Mode.SRC_IN);
            userName.setText(item.getAccountUsername());
            id.setText("Id:"+item.getAccountId());
            password.setText("Contraseña:"+item.getAccountPassword());
            userType.setText("Tipo:"+item.getAccountType());
            if(item.getAccountState() == 0){

                state.setText("Inactivo");
                blockUserButton.setBackgroundColor(Color.GREEN);
                blockUserButton.setText("Desbloquear");
            }else{

                state.setText("Activo");
                blockUserButton.setText("Bloquear");
                blockUserButton.setBackgroundColor(Color.RED);
            }
            blockUserButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                    if(state.getText().toString().equals("Inactivo")){

                        state.setText("Activo");
                        blockUserButton.setBackgroundColor(Color.RED);
                        blockUserButton.setText("Bloquear");
                        connection.openDB();
                        connection.updateAccount(new Account(item.getAccountId(), item.getAccountUsername(), item.getAccountPassword(), item.getAccountType(), 1, item.getAccountTypeId()));
                        connection.closeDB();
                    }else{

                        state.setText("Inactivo");
                        blockUserButton.setBackgroundColor(Color.GREEN);
                        blockUserButton.setText("Desbloquear");
                        connection.openDB();
                        connection.updateAccount(new Account(item.getAccountId(), item.getAccountUsername(), item.getAccountPassword(), item.getAccountType(), 0, item.getAccountTypeId()));
                        connection.closeDB();
                    }
                }
            });
        }
    }
}
