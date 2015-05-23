using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;

namespace WSREST
{
    // NOTA: puede usar el comando "Rename" del menú "Refactorizar" para cambiar el nombre de interfaz "IProductWSREST" en el código y en el archivo de configuración a la vez.
    [ServiceContract]
    public interface IProductWSREST
    {
        [OperationContract]
        [WebInvoke(Method = "GET", ResponseFormat = WebMessageFormat.Xml,
                                                  BodyStyle = WebMessageBodyStyle.Bare,
                                                  UriTemplate = "GetProductList/")]
        List<Product> GetProductList();


        [OperationContract]
        //Llama al metodo Add con formato json
        [WebInvoke(Method = "POST",
                          ResponseFormat = WebMessageFormat.Json,
                          RequestFormat = WebMessageFormat.Json, UriTemplate = "Add")]
 
         Person CreatePerson(Person createPerson);


     
        [OperationContract]
        [WebInvoke(Method = "GET",
               ResponseFormat = WebMessageFormat.Json,BodyStyle = WebMessageBodyStyle.Bare , UriTemplate ="GetAllPerson/")]

        List<Person> GetAllPerson();

        [OperationContract]
        [WebInvoke(Method = "POST",
               ResponseFormat = WebMessageFormat.Json, UriTemplate = "AddCliente")]

        String CreateCliente(string data);
 

        [OperationContract]
        [WebInvoke(Method = "POST",
                                  ResponseFormat = WebMessageFormat.Json, UriTemplate = "GetPerson/{id}")]
        Person GetAPerson(string id);
 
        //PUT Operation
        [OperationContract]
        [WebInvoke(Method = "PUT",
                                  ResponseFormat = WebMessageFormat.Json, UriTemplate = "Update")]
         void UpdatePerson(Person updatePerson);
 
         //DELETE Operation
         [OperationContract]
         [WebInvoke(Method = "DELETE",
                                      ResponseFormat = WebMessageFormat.Json, UriTemplate = "Delete")]
         void DeletePerson(string id);
     }

     [DataContract]
      public class Person
       {
        [DataMember]
        public string ID;
        [DataMember]
        public string Name;
        [DataMember]
        public string Age;
       }

    [DataContract]
  public class AnObject 
  {
    [DataMember]
    public int ObjectId {get;set;}
    [DataMember]
    public int ObjectValue {get;set;}
} 
}
