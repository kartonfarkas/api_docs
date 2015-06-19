Java
====

.. code-block:: java

   import java.io.BufferedReader;
   import java.io.IOException;
   import java.io.InputStream;
   import java.io.InputStreamReader;
   import java.io.UnsupportedEncodingException;
   import java.net.HttpURLConnection;
   import java.net.MalformedURLException;
   import java.net.URL;
   import java.security.MessageDigest;
   import java.security.NoSuchAlgorithmException;
   import java.text.SimpleDateFormat;
   import java.util.Date;
   import java.util.Random;
   import java.util.TimeZone;
   
   import javax.xml.bind.DatatypeConverter;
   
   public class ApiSample {
   
       final protected static char[] hexArray = "0123456789abcdef".toCharArray();
   
       private String environment;
       private String apiUsername;
       private String apiSecretKey;
   
       public static void main(String[] args) throws Exception {
           ApiSample apiSample = new ApiSample("https://api.emarsys.net/", "customer001", "customersecret");
           apiSample.send("GET", "language", null);
           apiSample.send("POST", "source/create", "{\"name\":\"RANDOM\"}");
       }
   
       public ApiSample(String environment, String apiUsername, String apiSecretKey) {
           this.environment = environment;
           this.apiUsername = apiUsername;
           this.apiSecretKey = apiSecretKey;
       }
   
       public void send(String method, String urlText, String data) {
           try {
               URL url = new URL(environment + "api/v2/" + urlText);
               HttpURLConnection connection = (HttpURLConnection) url.openConnection();
   
               connection.setRequestMethod(method);
               connection.addRequestProperty("X-WSSE", getSignature());
               connection.setRequestProperty("Content-Type", "application/json");
   
               if (data != null) {
                   byte[] postDataBytes = data.getBytes("UTF-8");
                   connection.setDoOutput(true);
                   connection.setUseCaches(false);
                   connection.getOutputStream().write(postDataBytes);
               }
   
               StringBuffer response = new StringBuffer();
               InputStream inputStream;
   
               if (connection.getResponseCode() == 200) {
                   System.out.println("OK (200)");
                   inputStream = connection.getInputStream();
               } else {
                   /* error from server */
                   System.out.println("ERROR (" + Integer.toString(connection.getResponseCode()) + ")");
                   inputStream = connection.getErrorStream();
               }
   
               BufferedReader in = new BufferedReader(new InputStreamReader(
               inputStream));
               String inputLine;
   
               while ((inputLine = in .readLine()) != null) {
                   response.append(inputLine);
               } in .close();
   
               System.out.println(response.toString());
           } catch (MalformedURLException e) {
               // TODO Auto-generated catch block
               e.printStackTrace();
           } catch (IOException e) {
               // TODO Auto-generated catch block
               e.printStackTrace();
           }
   
       }
   
       private String getSignature() {
           String timestamp = getUTCTimestamp();
           String nonce = getNonce();
           String digest = getPasswordDigest(nonce, timestamp);
   
           return String.format(
               "UsernameToken Username=\"%s\", PasswordDigest=\"%s\", " + "Nonce=\"%s\", Created=\"%s\"", apiUsername, digest,
           nonce, timestamp);
       }
   
       private String getUTCTimestamp() {
           SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ssZ");
           sdf.setTimeZone(TimeZone.getTimeZone("UTC"));
   
           return sdf.format(new Date());
       }
   
       private String getNonce() {
           byte[] nonceBytes = new byte[16];
           new Random().nextBytes(nonceBytes);
   
           return bytesToHex(nonceBytes);
       }
   
       private String getPasswordDigest(String nonce, String timestamp) {
           String digest = "";
           try {
               MessageDigest messageDigest = MessageDigest.getInstance("SHA-1");
               messageDigest.reset();
               String hashedString = String.format("%s%s%s", nonce, timestamp,
               apiSecretKey);
               messageDigest.update(hashedString.getBytes("UTF-8"));
               String sha1Sum = bytesToHex(messageDigest.digest());
   
               digest = DatatypeConverter.printBase64Binary(sha1Sum.getBytes("UTF-8"));
   
           } catch (NoSuchAlgorithmException ex) {
               System.out.println("No SHA-1 algorithm was found!");
           } catch (UnsupportedEncodingException ex) {
               System.out.println("Cannot use UTF-8 encoding.");
           }
   
           return digest;
       }
   
       private String bytesToHex(byte[] bytes) {
           char[] hexChars = new char[bytes.length * 2];
           for (int j = 0; j < bytes.length; j++) {
               int v = bytes[j] & 0xFF;
               hexChars[j * 2] = hexArray[v >>> 4];
               hexChars[j * 2 + 1] = hexArray[v & 0x0F];
           }
           return new String(hexChars);
       }
   }
