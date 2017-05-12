package com.example.narayan.tech1;

import android.content.Context;
import android.os.AsyncTask;
import android.util.Pair;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;

import javax.net.ssl.HttpsURLConnection;

/**
 * Created by navinsoni on 31-03-2017.
 */

class ServletPostAsyncTask extends AsyncTask<Context, Void, String> {
    private Context context;

    @Override
    protected String doInBackground(Context... param) {
        context = param[0];
        String urlString = "http://192.168.0.100/android_connect/test.php";
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
        String name=null;
        try {
            br = new BufferedReader(new InputStreamReader(url.openStream()));

            char[] buffer = new char[1024];

            jsonString = new String();

            StringBuilder sb = new StringBuilder();
            String line;
            while ((line = br.readLine()) != null) {
                sb.append(line + "\n");
                br.close();
                name =sb.toString();    }
        }
        catch(IOException e) {
        }




        return name;
    }



    @Override
    protected void onPostExecute(String result) {
        Toast.makeText(context, result, Toast.LENGTH_LONG).show();
    }
}

