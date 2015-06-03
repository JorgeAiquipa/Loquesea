using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.ServiceModel.Web;
using RestServices.Dominio;

namespace RestServices
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the interface name "IProveedor" in both code and config file together.
    [ServiceContract]
    public interface IProveedor
    {
        [OperationContract]
        [WebInvoke(Method="POST", UriTemplate ="Proveedor", ResponseFormat= WebMessageFormat.Json )]
        Proveedor CrearProveedor(Proveedor proveedorACrear);

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Proveedor/{codigo}", ResponseFormat = WebMessageFormat.Json)]
        Proveedor ObtenerProveedor(string codigo);

        [OperationContract]
        [WebInvoke(Method = "PUT", UriTemplate = "Proveedor/{codigo}", ResponseFormat = WebMessageFormat.Json)]
        Proveedor ModificarProveedor(string codigo, Proveedor proveedorAModificar);

        [OperationContract]
        [WebInvoke(Method = "DELETE", UriTemplate = "Proveedor/{codigo}", ResponseFormat = WebMessageFormat.Json)]
        void EliminarProveedor(string codigo);
    }
}
