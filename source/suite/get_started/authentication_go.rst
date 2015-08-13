Ruby
====

.. code-block:: go

   package main

   import (
       "bytes"
       "crypto/sha1"
       b64 "encoding/base64"
       "encoding/hex"
       "fmt"
       "io/ioutil"
       "math/rand"
       "net/http"
       "time"
   )

   // SuiteAPI represents the credentials to talk with Emarsys API
   type SuiteAPI struct {
       user   string
       secret string
   }

   const letterBytes = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"

   func generateRandString(n int) string {
       b := make([]byte, n)
       for i := range b {
           b[i] = letterBytes[rand.Int63()%int64(len(letterBytes))]
       }
       return string(b)
   }

   // Sends an HTTP request to the Emarsys API
   func (config SuiteAPI) send(method string, path string, body string) (string, string) {
       url := "https://api.emarsys.net/api/v2/" + path
       var timestamp = time.Now().Format(time.RFC3339)
       nonce := generateRandString(36)
       text := (nonce + timestamp + config.secret)
       h := sha1.New()
       h.Write([]byte(text))
       sha1 := hex.EncodeToString(h.Sum(nil))
       passwordDigest := b64.StdEncoding.EncodeToString([]byte(sha1))

       req, err := http.NewRequest(method, url, bytes.NewBufferString(body))
       header := string(" UsernameToken Username=\"" + config.user + "\",PasswordDigest=\"" + passwordDigest + "\",Nonce=\"" + nonce + "\",Created=\"" + timestamp + "\"")

       req.Header.Set("X-WSSE", header)
       req.Header.Set("Content-Type", "application/json")

       client := &http.Client{}
       resp, err := client.Do(req)
       if err != nil {
           panic(err)
       }

       defer resp.Body.Close()

       status := resp.Status
       responseBody, _ := ioutil.ReadAll(resp.Body)
       return status, string(responseBody)
   }

   func main() {
       suiteapi := SuiteAPI{user: "customer001", secret: "customersecret"}
       fmt.Println(suiteapi.send("GET", "settings", ""))
       fmt.Println(suiteapi.send("POST", "source/create", "{\"name\":\"RANDOM\"}"))
   }
