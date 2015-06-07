using System;
using System.Web;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System.Net;
using System.IO;
using System.Web.Script.Serialization;
using System.Text;


namespace WSRestTestCME
{
    [TestClass]
    public class TestCRUD
    {
        [TestMethod]
        public void CreateTest()
        {
            // 
            string postData = "{\"Ruc\":\"20132367590\",\"Razonsocial\":\"ACEROS TACNA\",\"Direccion\":\"No Tiene\",\"Telefono\":\"2419762\"}";
            byte[] data = Encoding.UTF8.GetBytes(postData);
            HttpWebRequest req = (HttpWebRequest)WebRequest.Create("http://localhost:4325/ClienteREST.svc/Clientes");
            req.Method = "POST";
            req.ContentLength = data.Length;
            req.ContentType = "application/json";
            var reqStream = req.GetRequestStream();
            reqStream.Write(data, 0, data.Length);
            var res = (HttpWebResponse)req.GetResponse();
            StreamReader reader = new StreamReader(res.GetResponseStream());
                string clienteJson = reader.ReadToEnd();
                JavaScriptSerializer js = new JavaScriptSerializer();
                cliente clienteCreado = js.Deserialize<cliente>(clienteJson);
                 Assert.AreEqual("20132367590", clienteCreado.Ruc );
                Assert.AreEqual("ACEROS TACNA", clienteCreado.Razonsocial);
                Assert.AreEqual("No Tiene", clienteCreado.Direccion );
                Assert.AreEqual("2419762", clienteCreado.Telefono );          
        }

        [TestMethod]
        public void GetTest()
        {
            HttpWebRequest req2 = (HttpWebRequest)WebRequest.Create("http://localhost:4325/ClienteREST.svc/Clientes/20132367590");
            req2.Method = "GET";
            HttpWebResponse res2 = (HttpWebResponse)req2.GetResponse();
            StreamReader reader2 = new StreamReader(res2.GetResponseStream());
            string clienteJson2 = reader2.ReadToEnd();
            JavaScriptSerializer js2 = new JavaScriptSerializer();
            cliente clienteObtenido = js2.Deserialize<cliente>(clienteJson2);
            Assert.AreEqual("20132367590", clienteObtenido.Ruc );
            Assert.AreEqual("ACEROS TACNA", clienteObtenido.Razonsocial );
            Assert.AreEqual("No Tiene", clienteObtenido.Direccion);
            Assert.AreEqual("2419762", clienteObtenido.Telefono);
        }

        [TestMethod]
        public void UpdateTest()
        {
            // 
            string postData = "{\"Ruc\":\"20132367590\",\"Razonsocial\":\"ACEROS TACNA\",\"Direccion\":\"Av. Domingo Orue 520\",\"Telefono\":\"2419122\"}";
            byte[] data = Encoding.UTF8.GetBytes(postData);
            HttpWebRequest req = (HttpWebRequest)WebRequest.Create("http://localhost:4325/ClienteREST.svc/Clientes");
            req.Method = "PUT";
            req.ContentLength = data.Length;
            req.ContentType = "application/json";
            var reqStream = req.GetRequestStream();
            reqStream.Write(data, 0, data.Length);
            var res = (HttpWebResponse)req.GetResponse();
            StreamReader reader = new StreamReader(res.GetResponseStream());
            string clienteJson3 = reader.ReadToEnd();
            JavaScriptSerializer js3 = new JavaScriptSerializer();
            cliente clienteModificado = js3.Deserialize<cliente>(clienteJson3);
            Assert.AreEqual("20132367590", clienteModificado.Ruc);
            Assert.AreEqual("ACEROS TACNA", clienteModificado.Razonsocial);
            Assert.AreEqual("Av. Domingo Orue 520", clienteModificado.Direccion);
            Assert.AreEqual("2419122", clienteModificado.Telefono);
        }

        [TestMethod]
        public void DeleteTest()
        {
            HttpWebRequest req4 = (HttpWebRequest)WebRequest.Create("http://localhost:4325/ClienteREST.svc/Clientes/20132367590");
            req4.Method = "DELETE";

            HttpWebResponse res4 = null;
            try
            {
                res4 = (HttpWebResponse)req4.GetResponse();
                StreamReader reader4 = new StreamReader(res4.GetResponseStream());
                string clienteJson4 = reader4.ReadToEnd();
                JavaScriptSerializer js4 = new JavaScriptSerializer();
                String mess = js4.Deserialize<string>(clienteJson4);
                Assert.AreEqual("Elimacion Satisfactoria",mess); 
            }
            catch (WebException e)
            {
                HttpStatusCode code = ((HttpWebResponse)e.Response).StatusCode;
                string message = ((HttpWebResponse)e.Response).StatusDescription;
                StreamReader reader = new StreamReader(e.Response.GetResponseStream());
                string error = reader.ReadToEnd();
                JavaScriptSerializer js = new JavaScriptSerializer();
                string mensaje = js.Deserialize<string>(error);
                Assert.AreEqual("No hubo eliminaciones", mensaje);
            }
            
        }

    }
}
