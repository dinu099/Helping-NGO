package com.example.narayan.tech1;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;


import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;


import org.json.JSONException;
import org.json.JSONObject;


public class MainActivity extends AppCompatActivity {
    private Button loginButton;
    private TextView userNameText;
    private EditText passwordText;
    private static String USERNAME;
    private static String PASSWORD;
    private static Boolean LOGIN=false;
    SharedPreferences sharedPref;
    SharedPreferences.Editor editor;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        sharedPref = getSharedPreferences("MyData",Context.MODE_PRIVATE);
        editor = sharedPref.edit();
        if(!(sharedPref.getBoolean("loginValue",false))) {

            setContentView(R.layout.activity_main);
          //  new ServletPostAsyncTask().execute(this);
            userNameText = (TextView) findViewById(R.id.userNameText);
            passwordText = (EditText) findViewById(R.id.passwordText);
            loginButton = (Button) findViewById(R.id.loginButton);



            loginButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                    if((!TextUtils.isEmpty(userNameText.getText())) && (!TextUtils.isEmpty(passwordText.getText())))
                    {

                        login(userNameText.getText().toString(),passwordText.getText().toString());
                    }
                    else
                    {
                        Toast.makeText(getApplicationContext(), "Empty Fields", Toast.LENGTH_LONG).show();

                    }
                }
            });
        }
        else
        {
                //call next screen

            launchLoggedIn();
        }
    }

    private void login(final String username, String password) {

        class LoginAsync extends AsyncTask<String, Void, String> {


            @Override
            protected void onPreExecute() {
                super.onPreExecute();
            }

            @Override
            protected String doInBackground(String... params) {
                String uname = params[0];
                String pass = params[1];

                System.out.println("step1");
                String urlString = "http://192.168.43.33/android_connect/logincheck.php?"+"username="+uname+"&password="+pass;
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
                    System.out.println("step2");

                    br = new BufferedReader(new InputStreamReader(url.openStream()));
                    char[] buffer = new char[1024];

                    jsonString = new String();

                    StringBuilder sb = new StringBuilder();
                    String line;
                    while ((line = br.readLine()) != null) {
                        sb.append(line + "\n");
                        br.close();
                        jsonString = sb.toString();

                    }
                }
                catch(IOException e) {
                }



                String result =null;
                try {
                    JSONObject obj = new JSONObject(jsonString);

                    result = obj.get("success").toString();
                }
                catch(JSONException e)
                {

                }
                return result;
            }

            @Override
            protected void onPostExecute(String result){

                if(result.equals("1")){
                    USERNAME = userNameText.getText().toString();
                    PASSWORD = passwordText.getText().toString();
                    LOGIN=true;

                    editor.putString("userNameValue",USERNAME);
                    editor.putString("passwordValue",PASSWORD);
                    editor.putBoolean("loginValue",true);
                    editor.commit();
                    launchLoggedIn();

                }else {
                    Toast.makeText(getApplicationContext(), "Invalid User Name or Password", Toast.LENGTH_LONG).show();
                }
            }
        }

        LoginAsync la = new LoginAsync();
        la.execute(username, password);

    }

   public void launchLoggedIn()
   {
       Intent intent = new Intent(MainActivity.this,LoggedIn.class);
       intent.putExtra("username",sharedPref.getString("userNameValue",""));
       finish();
       startActivity(intent);
   }
}





