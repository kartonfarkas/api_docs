Java
====

.. code-block:: java

   package com.emarsys.apisample;

   import java.io.BufferedReader;
   import java.io.InputStreamReader;
   import java.io.UnsupportedEncodingException;
   import java.net.HttpURLConnection;
   import java.net.URL;
   import java.security.MessageDigest;
   import java.security.NoSuchAlgorithmException;
   import java.text.SimpleDateFormat;
   import java.util.Date;
   import java.util.Random;
   import java.util.TimeZone;
   import sun.misc.BASE64Encoder;


   public class ApiSample {

       final protected static char[] hexArray = "0123456789abcdef".toCharArray();

       private String apiUsername;
       private String apiSecretKey;


       public static void main(String[] args) throws Exception {
           ApiSample apiSample = new ApiSample("bob001", "XP6f9G5estrr0epACeMm7II");
           apiSample.sendGet();
       }

       public ApiSample(String apiUsername, String apiSecretKey) {
           this.apiUsername = apiUsername;
           this.apiSecretKey = apiSecretKey;
       }

       private void sendGet() throws Exception {
           String url = "https://suite5.emarsys.net/api/v2/language";

           URL obj = new URL(url);
           HttpURLConnection con = (HttpURLConnection) obj.openConnection();

           con.setRequestMethod("GET");
           con.addRequestProperty("X-WSSE", getSignature());
           con.addRequestProperty("Content-Type", "application/json");

           BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
           String inputLine;
           StringBuffer response = new StringBuffer();

           while ((inputLine = in.readLine()) != null) {
               response.append(inputLine);
           }
           in.close();

           System.out.println(response.toString());
       }

       private String getSignature() {
           String timestamp = getUTCTimestamp();
           String nonce = getNonce();
           String digest = getPasswordDigest(nonce, timestamp);

           return String.format("UsernameToken Username=\"%s\", PasswordDigest=\"%s\", " +
                   "Nonce=\"%s\", Created=\"%s\"", apiUsername, digest, nonce, timestamp);
       }

       private String getUTCTimestamp()
       {
           SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ssZ");
           sdf.setTimeZone(TimeZone.getTimeZone("UTC"));

           return sdf.format(new Date());
       }

       private String getNonce() {
           byte[] nonceBytes = new byte[16];
           new Random().nextBytes(nonceBytes);

           return bytesToHex(nonceBytes);
       }

       private String getPasswordDigest(String nonce, String timestamp)
       {
           String digest = "";
           try {
               MessageDigest messageDigest = MessageDigest.getInstance("SHA-1");
               messageDigest.reset();
               String hashedString = String.format("%s%s%s", nonce, timestamp, apiSecretKey);
               messageDigest.update(hashedString.getBytes("UTF-8"));
               String sha1Sum = bytesToHex(messageDigest.digest());

               BASE64Encoder encoder = new BASE64Encoder();
               digest = encoder.encode(sha1Sum.getBytes("UTF-8"));

           } catch (NoSuchAlgorithmException ex) {
               System.out.println("No SHA-1 algorithm was found!");
           } catch (UnsupportedEncodingException ex) {
               System.out.println("Cannot use UTF-8 encoding.");
           }

           return digest;
       }

       private String bytesToHex(byte[] bytes) {
           char[] hexChars = new char[bytes.length * 2];
           for ( int j = 0; j < bytes.length; j++ ) {
               int v = bytes[j] & 0xFF;
               hexChars[j * 2] = hexArray[v >>> 4];
               hexChars[j * 2 + 1] = hexArray[v & 0x0F];
           }
           return new String(hexChars);
       }
   }
