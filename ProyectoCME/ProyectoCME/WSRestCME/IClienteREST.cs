using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using WSRestCME.Dominio;
using System.ServiceModel.Web;

namespace WSRestCME
{
    // NOTA: puede usar el comando "Rename" del menú "Refactorizar" para cambiar el nombre de interfaz "IClienteREST" en el código y en el archivo de configuración a la vez.
    [ServiceContract]
    public interface IClienteREST
    {
        [OperationContract]
        [WebInvoke(Method = "POST", UriTemplate = "Clientes", ResponseFormat = WebMessageFormat.Json)]
        cliente CrearCliente(cliente clienteACrear);

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Clientes/{codigo}", ResponseFormat = WebMessageFormat.Json)]
        cliente ObtenerCliente(string codigo);

        [OperationContract]
        [WebInvoke(Method = "PUT", UriTemplate = "Clientes", ResponseFormat = WebMessageFormat.Json)]
        cliente ModificarCliente(cliente clienteAModificar);

        [OperationContract]
        [WebInvoke(Method = "DELETE", UriTemplate = "Clientes/{codigo}", ResponseFormat = WebMessageFormat.Json)]
        string EliminarCliente(string codigo);

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Clientes", ResponseFormat = WebMessageFormat.Json)]
        List<cliente> ListarTodosClientes();
    }
}
