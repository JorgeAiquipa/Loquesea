using System;
using System.Web;
using System.Text;
using System.Collections.Generic;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System.Net;
using System.IO;
using System.Web.Script.Serialization;

namespace RestTEST
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void CreateTest()
        {
            // 
            string postData = "{\"Codigo\":\"10027\",\"Ruc\":\"20132367800\",\"Razonsocial\":\"MARSA\"}";
            byte[] data = Encoding.UTF8.GetBytes(postData);
            HttpWebRequest req = (HttpWebRequest)WebRequest.Create("http://localhost:1601/ProveedorREST.svc/Proveedor");
            req.Method = "POST";
            req.ContentLength = data.Length;
            req.ContentType  = "application/json";
            var reqStream = req.GetRequestStream();
            reqStream.Write(data, 0, data.Length);
            try
            {
                var res = (HttpWebResponse)req.GetResponse();
                StreamReader reader = new StreamReader(res.GetResponseStream());
                string proveedorJson = reader.ReadToEnd();
                JavaScriptSerializer js = new JavaScriptSerializer();
                proveedor proveedorCreado = js.Deserialize<proveedor>(proveedorJson);
                Assert.AreEqual("10027", proveedorCreado.Codigo);
                Assert.AreEqual("20132367800", proveedorCreado.Ruc);
                Assert.AreEqual("MARSA", proveedorCreado.Razonsocial);
            }
            catch (WebException e) {
                HttpStatusCode code = ((HttpWebResponse)e.Response).StatusCode;
                string message = ((HttpWebResponse)e.Response).StatusDescription;
                StreamReader reader = new StreamReader(e.Response.GetResponseStream());
                string error = reader.ReadToEnd();
                JavaScriptSerializer js = new JavaScriptSerializer();
                string mensaje = js.Deserialize<string>(error);
                Assert.AreEqual("Alumno imposible", mensaje);
            }

        }

        [TestMethod]
        public void GetTest()
        {
            HttpWebRequest req2 = (HttpWebRequest)WebRequest.Create("http://localhost:1601/ProveedorREST.svc/Proveedor/10027");
            req2.Method = "GET";
            HttpWebResponse res2 = (HttpWebResponse)req2.GetResponse();
            StreamReader reader2 = new StreamReader(res2.GetResponseStream());
            string proveedorJson2 = reader2.ReadToEnd();
            JavaScriptSerializer js2 = new JavaScriptSerializer();
            proveedor proveedorObtenido = js2.Deserialize<proveedor>(proveedorJson2);
            Assert.AreEqual("10027", proveedorObtenido.Codigo);
            Assert.AreEqual("20132367800", proveedorObtenido.Ruc);
            Assert.AreEqual("MARSA", proveedorObtenido.Razonsocial);

        }

        [TestMethod]
        public void UpdateTest()
        {
            // 
            string postdata = "{\"Codigo\":\"10027\",\"Ruc\":\"20122267900\",\"Razonsocial\":\"MARSA LIMA\"}";
            
            
            byte[] data = Encoding.UTF8.GetBytes(postdata);
            HttpWebRequest req = (HttpWebRequest)WebRequest.Create("http://localhost:1601/ProveedorREST.svc/Proveedor/10027");
            req.Method = "PUT";
            req.ContentLength = data.Length;
            req.ContentType = "application/json";
            var reqStream = req.GetRequestStream();
            reqStream.Write(data, 0, data.Length);
            var res = (HttpWebResponse)req.GetResponse();

            StreamReader reader = new StreamReader(res.GetResponseStream());
            string proveedorJson = reader.ReadToEnd();
            JavaScriptSerializer js = new JavaScriptSerializer();
            proveedor proveedorMod = js.Deserialize<proveedor>(proveedorJson);
            
            Assert.AreEqual("10027", proveedorMod.Codigo);
            Assert.AreEqual("20122267900", proveedorMod.Ruc);
            Assert.AreEqual("MARSA LIMA", proveedorMod.Razonsocial);

        }


    }
}
