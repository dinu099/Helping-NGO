package com.example.narayan.tech1;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.location.Location;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.PopupWindow;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdateFactory;


import com.google.android.gms.location.LocationListener;


import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;

import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;


public class LoggedIn extends AppCompatActivity implements OnMapReadyCallback,GoogleApiClient.ConnectionCallbacks, GoogleApiClient.OnConnectionFailedListener , LocationListener{

    GoogleMap m_map;
    boolean mapReady = false;
    private GoogleApiClient mGoogleApiClient;
    private LocationRequest mLocationRequest;
    private MarkerOptions markerOptions[] ;
    static final CameraPosition KOLKATA = CameraPosition.builder()
            .target(new LatLng(22.5726, 88.3639))
            .zoom(10)
            .bearing(0)
            .tilt(0)
            .build();
    private PopupWindow popupWindow;
    private LayoutInflater layoutInflater;
    private RelativeLayout relativeLayout;
    private int count;
    private Marker markerM;
    private int key;
    private CollectionUnit obj[];
    private JSONArray jsonArray;
    private JSONObject jsonObject;
    private String Vusername;
    private int key2;
    private TextView headerText;
    private Button refreshButton;
    private int left;
    Marker myPostion;



    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_logged_in);



        headerText =(TextView)findViewById(R.id.headerText);
        refreshButton=(Button)findViewById(R.id.refreshButton);
        Intent intent = getIntent();
        Bundle bundle = intent.getExtras();

        if(bundle != null){
            Vusername  = bundle.getString("username");
        }

        getData(Vusername);

    }

    @Override
    public void onMapReady(GoogleMap googleMap) {
        mapReady=true;
        m_map = googleMap;




        m_map.setOnMarkerClickListener(new GoogleMap.OnMarkerClickListener() {
            @Override
            public boolean onMarkerClick(final Marker marker) {

                markerM = marker;
                key = Integer.valueOf(markerM.getTitle());

                if (key != -1) {
                    layoutInflater = (LayoutInflater) getApplicationContext().getSystemService(LAYOUT_INFLATER_SERVICE);
                    ViewGroup container = (ViewGroup) layoutInflater.inflate(R.layout.info_window, null);

                    TextView nameText = (TextView) container.findViewById(R.id.nameVText);
                    TextView addText = (TextView) container.findViewById(R.id.addVText);
                    final TextView phoneText = (TextView) container.findViewById(R.id.phoneVText);
                    TextView unitText = (TextView) container.findViewById(R.id.unitVText);


                    final Button myButton = (Button) container.findViewById(R.id.myButton);
                    myButton.setEnabled(false);
                    myButton.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View v) {

                            key2 = key;
                            setData(obj[key].getPledgeId());
                        }
                    });

                    CheckBox checkBox = (CheckBox) container.findViewById(R.id.checkBox);

                    checkBox.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View v) {
                            boolean checked = ((CheckBox) v).isChecked();
                            if (checked) {
                                myButton.setEnabled(true);
                            } else {
                                myButton.setEnabled(false);
                            }

                        }
                    });



                    nameText.setText(obj[key].getDonorName());
                    addText.setText(obj[key].getAddress());
                    phoneText.setText(obj[key].getPhoneNo());
                    unitText.setText(obj[key].getDesc());

                   phoneText.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View v) {
                            Intent intent = new Intent(Intent.ACTION_DIAL);
                            intent.setData(Uri.parse("tel:"+phoneText.getText().toString()));
                            startActivity(intent);
                        }
                    });


                    popupWindow = new PopupWindow(container, 400, 350, true);
                    popupWindow.showAtLocation(relativeLayout, Gravity.NO_GRAVITY, 160, 350);
                    popupWindow.setTouchable(true);


                }
                return true;
            }
        });



        for(int i=0;i<count;i++)
        {
            m_map.addMarker(markerOptions[i]);
            System.out.println(markerOptions[i].getPosition().toString());
        }
        flyTo(KOLKATA);


    }
    private void flyTo(CameraPosition target)
    {
        m_map.moveCamera(CameraUpdateFactory.newCameraPosition(target));
    }
    private void getData(final String Vusername) {

        class LoginAsync extends AsyncTask<String, Void, String> {


            @Override
            protected void onPreExecute() {
                super.onPreExecute();
            }

            @Override
            protected String doInBackground(String... params) {
                String uname = params[0];


                String urlString = "http://192.168.43.33/android_connect/collection.php?"+"Vusername="+uname;
                HttpURLConnection urlConnection = null;
                URL url = null;
                try {
                    url = new URL(urlString);
                }
                catch(MalformedURLException e)
                {

                }
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
                }
                catch(IOException e)
                {

                }

                try{
                    urlConnection.setRequestMethod("GET");
                }
                catch(ProtocolException e)
                {

                }
                urlConnection.setReadTimeout(10000 /* milliseconds */);
                urlConnection.setConnectTimeout(15000 /* milliseconds */);

                urlConnection.setDoOutput(true);
                BufferedReader br =null;
                String jsonString = null;

                try {

                    br = new BufferedReader(new InputStreamReader(url.openStream()));

                    jsonString = new String();

                    StringBuilder sb = new StringBuilder();
                    String line;
                    while ((line = br.readLine()) != null) {
                        sb.append(line + "\n");
                        br.close();
                        jsonString = sb.toString();

                    }
                    System.out.println(sb);

                }
                catch(IOException e) {
                }


                String result =null;
                try {
                    jsonObject = new JSONObject(jsonString);

                    result = jsonObject.get("success").toString();
                    System.out.println(result);
                }
                catch(JSONException e)
                {

                }
                return result;
            }

            @Override
            protected void onPostExecute(String result){

                if(result.equals("1")){

                    try {
                        jsonArray = jsonObject.getJSONArray("products");
                        count = Integer.valueOf(jsonObject.get("count").toString());
                        left=count;
                        markerOptions = new MarkerOptions[count];
                        obj = new CollectionUnit[count];
                        for(int i=0;i<count;i++)
                        {
                            JSONObject c = jsonArray.getJSONObject(i);
                            obj[i]= new CollectionUnit();
                            obj[i].setPledgeId(Integer.valueOf(c.get("pledgeId").toString()));
                            obj[i].setDonorName(c.get("donorName").toString());

                            obj[i].setAddress(c.get("address").toString());
                            obj[i].setPhoneNo(c.get("phoneNo").toString());
                            obj[i].setDesc(c.get("description").toString());
                            obj[i].setLatitude(Double.valueOf(c.get("latitude").toString()));
                            obj[i].setLongitude(Double.valueOf(c.get("longitude").toString()));



                        }

                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    setup();


                }else {
                    count=0;
                    left=count;
                    setup();
                }
            }
        }

        LoginAsync la = new LoginAsync();
        la.execute(Vusername);

    }
    private void setData(final int pledgeId) {

        class LoginAsync extends AsyncTask<Integer, Void, String> {


            @Override
            protected void onPreExecute() {
                super.onPreExecute();
            }

            @Override
            protected String doInBackground(Integer... params) {
                String uname = Integer.toString(params[0]);

                System.out.println(params[0]+"hello");
                String urlString = "http://192.168.43.33/android_connect/update.php?"+"pledgeId="+params[0];
                HttpURLConnection urlConnection = null;
                URL url = null;
                try {
                    url = new URL(urlString);
                }
                catch(MalformedURLException e)
                {

                }
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
                }
                catch(IOException e)
                {

                }

                try{
                    urlConnection.setRequestMethod("GET");
                }
                catch(ProtocolException e)
                {

                }
                urlConnection.setReadTimeout(10000 /* milliseconds */);
                urlConnection.setConnectTimeout(15000 /* milliseconds */);

                urlConnection.setDoOutput(true);
                BufferedReader br =null;
                String jsonString = null;

                try {

                    br = new BufferedReader(new InputStreamReader(url.openStream()));

                    jsonString = new String();

                    StringBuilder sb = new StringBuilder();
                    String line;
                    while ((line = br.readLine()) != null) {
                        sb.append(line + "\n");
                        br.close();
                        jsonString = sb.toString();

                    }
                    System.out.println(sb);

                }
                catch(IOException e) {
                }


                String result =null;
                try {
                    jsonObject = new JSONObject(jsonString);

                    result = jsonObject.get("success").toString();
                    System.out.println(result);
                }
                catch(JSONException e)
                {

                }
                return result;
            }

            @Override
            protected void onPostExecute(String result){

                if(result.equals("1")){
                    markerM.remove();
                    popupWindow.dismiss();
                    --left;
                    headerText.setText("User : "+Vusername+"\nCollections Left : "+left);

                    Toast.makeText(getApplicationContext(), "updated", Toast.LENGTH_LONG).show();

                }else {
                    Toast.makeText(getApplicationContext(), "failed", Toast.LENGTH_LONG).show();
                }
            }
        }

        LoginAsync la = new LoginAsync();
        la.execute(pledgeId);

    }
    public void setup()
    {
        headerText.setText("User : "+Vusername+"\nCollections Left : "+count);
        relativeLayout=(RelativeLayout)findViewById(R.id.map_relative_layout);

        for(int i=0;i<count;i++)
        {
            markerOptions[i] = new MarkerOptions()
                    .position(new LatLng(obj[i].getLatitude(),obj[i].getLongitude()))
                    .title(Integer.toString(i));
        }

        MapFragment mapFragment = (MapFragment) getFragmentManager().findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        refreshButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                finish();
                startActivity(intent);
            }
        });

        myPostion=null;
        mGoogleApiClient = new GoogleApiClient.Builder(this)
                .addApi(LocationServices.API)
                .addConnectionCallbacks(this)
                .addOnConnectionFailedListener(this)
                .build();
        mGoogleApiClient.connect();

        final Button myLocation = (Button)findViewById(R.id.myLocation);
        myLocation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CameraPosition newPos = CameraPosition.builder()
                        .target(new LatLng(myPostion.getPosition().latitude,myPostion.getPosition().longitude))
                        .zoom(17)
                        .bearing(0)
                        .tilt(0)
                        .build();
                m_map.moveCamera(CameraUpdateFactory.newCameraPosition(newPos));

            }
        });

    }
    protected void onStart()
    {

        super.onStart();

    }
    protected void onStop()
    {
        mGoogleApiClient.disconnect();
        super.onStop();
    }
    @Override
    public void onConnected(Bundle bundle){
        mLocationRequest=LocationRequest.create();
        mLocationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
        mLocationRequest.setInterval(1000);
        LocationServices.FusedLocationApi.requestLocationUpdates(mGoogleApiClient,mLocationRequest,this);

    }

    @Override
    public void onConnectionSuspended(int i) {

    }

    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {

    }

    @Override
    public void onLocationChanged(Location location) {
       if(myPostion!=null)
         myPostion.remove();

        myPostion = m_map.addMarker(new MarkerOptions().icon(BitmapDescriptorFactory.fromResource(R.mipmap.myicon)).position(new LatLng(location.getLatitude(),location.getLongitude())));
        myPostion.setTitle("-1");
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu,menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId())
        {
            case R.id.menuLogout: logout();
        }
        return true;

    }
    public void logout()
    {
        SharedPreferences sharedPref = getSharedPreferences("MyData", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPref.edit();
        editor.clear();
        editor.apply();
        finish();
        startActivity(new Intent(this,MainActivity.class));
    }
}

