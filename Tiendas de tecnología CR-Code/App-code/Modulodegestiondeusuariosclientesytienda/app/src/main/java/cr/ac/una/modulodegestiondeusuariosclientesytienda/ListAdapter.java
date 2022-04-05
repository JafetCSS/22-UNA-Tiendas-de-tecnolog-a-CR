package cr.ac.una.modulodegestiondeusuariosclientesytienda;

import android.content.Context;
import android.graphics.Color;
import android.graphics.PorterDuff;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class ListAdapter extends RecyclerView.Adapter<ListAdapter.ViewHolder>{

    private List<ListElement> mData;
    private LayoutInflater mInflater;
    private Context context;

    public ListAdapter(List<ListElement> itemList, Context context){

        this.mInflater = LayoutInflater.from(context);
        this.context = context;
        this.mData = itemList;
    }

    @Override
    public int getItemCount() {return mData.size();}

    @Override
    public ListAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType){

        View view = mInflater.inflate(R.layout.list_element, null);
        return new ListAdapter.ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final ListAdapter.ViewHolder holder, final int position) {

        holder.bindData(mData.get(position));
    }

    public void setItems(List<ListElement> items){mData = items;}

    public class ViewHolder extends RecyclerView.ViewHolder {

        ImageView iconImage;
        TextView userName, id, password, userType, state;

        ViewHolder (View itemView){

            super(itemView);
            iconImage = itemView.findViewById(R.id.iconImageView);
            userName = itemView.findViewById(R.id.userNameTextView);
            id = itemView.findViewById(R.id.idTextView);
            password = itemView.findViewById(R.id.passwordTextView);
            userType = itemView.findViewById(R.id.userTypeTextView);
            state = itemView.findViewById(R.id.stateTextView);
        }

        void bindData(final ListElement item){

            iconImage.setColorFilter(Color.parseColor(item.getColor()), PorterDuff.Mode.SRC_IN);
            userName.setText(item.getUserName());
            id.setText(item.getId());
            password.setText(item.getPassword());
            userType.setText(item.getUserType());
            state.setText(item.getState());
        }
    }
}
