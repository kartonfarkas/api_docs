C#
==

.. code-block:: csharp

   using System;
   using System.Security.Cryptography;
   using System.Net;
   using System.IO;
   using System.Text;
   using System.Web.Script.Serialization;
   using System.Collections.Generic;

   namespace SuiteApiClientExapmle
   {
   	class SuiteApiClientExapmle
   	{
   		private readonly string key;
   		private readonly string secret;

   		public SuiteApiClientExapmle(string key, string secret)
   		{
   			this.key = key;
   			this.secret = secret;
   		}

   		public object Get(string uri)
   		{
   			var nonce = GetRandomString(32);
   			var timestamp = DateTime.UtcNow.ToString("o");
   			var passwordDigest = System.Convert.ToBase64String(Encoding.UTF8.GetBytes(Sha1(nonce + timestamp + secret)));
   			var authHeader = String.Format("Username=\"{0}\", PasswordDigest=\"{1}\", Nonce=\"{2}\", Created=\"{3}\"", key, passwordDigest, nonce, timestamp);

   			var httpRequest = (HttpWebRequest)WebRequest.Create("https://trunk-int.s.emarsys.com/api/v2/" + uri);
   			httpRequest.Method = "GET";
   			httpRequest.Headers.Add("X-WSSE: " + authHeader);
   			httpRequest.ContentType = "application/json";

   			var response = (HttpWebResponse) httpRequest.GetResponse();
   			using (var reader = new StreamReader(response.GetResponseStream()))
   			{
   				string responseJson = reader.ReadToEnd();
   				return new JavaScriptSerializer().Deserialize<object>(responseJson);
   			}
   		}

   		private static string Sha1(string input)
   		{
   			var hashInBytes = new SHA1CryptoServiceProvider().ComputeHash(Encoding.UTF8.GetBytes(input));
   			return string.Join(string.Empty, Array.ConvertAll(hashInBytes, b => b.ToString("x2")));
   		}

   		private static string GetRandomString(int length)
   		{
   			var random = new Random();
   			string[] chars = new string[] { "0","2","3","4","5","6","8","9","a","b","c","d","e","f","g","h","j","k","m","n","p","q","r","s","t","u","v","w","x","y","z" };
   			var sb = new StringBuilder();
   			for (int i = 0; i < length; i++) sb.Append(chars[random.Next(chars.Length)]);
   			return sb.ToString();
   		}
   	}

   	class MainClass
   	{
   		public static void Main(string[] args)
   		{
   			var key = "your api username";
   			var secret = "your api password";
   			var client = new SuiteApiClientExapmle(key, secret);
   			var result = client.Get("field");

   			Print(result);
   		}

   		private static void Print(object data, string prefix = "")
   		{
   			if (data is Dictionary<string, object>)
   			{
   				var dict = data as Dictionary<string, object>;
   				foreach (var key in dict.Keys)
   				{
   					Console.WriteLine(prefix + "-" + key + ":");
   					Print(dict[key], prefix + "  ");
   				}
   			}
   			else if (data is System.Collections.IEnumerable && !(data is string))
   			{
   				foreach (var item in data as System.Collections.IEnumerable)
   				{
   					Print(item, prefix + "  ");
   				}
   			}
   			else
   			{
   				Console.WriteLine(prefix + data.ToString());
   			}
   		}
   	}
   }
