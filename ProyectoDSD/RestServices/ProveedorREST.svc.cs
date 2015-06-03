using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using RestServices.Dominio;
using RestServices.Persistencia;
using System.Web;
using System.ServiceModel.Web;
using System.Net;

namespace RestServices
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "Proveedor" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select Proveedor.svc or Proveedor.svc.cs at the Solution Explorer and start debugging.
    public class ProveedorREST : IProveedor
    {
        private ProveedorDAO  dao = new ProveedorDAO();

        public Proveedor CrearProveedor(Proveedor proveedorACrear)
        {
            Proveedor tmp_proveedor = null;
            tmp_proveedor.Codigo = "";
            tmp_proveedor = ObtenerProveedor(proveedorACrear.Codigo);

            if(tmp_proveedor.Codigo.Equals(proveedorACrear.Codigo))
            {
                throw new WebFaultException<string>("Alumno imposible", HttpStatusCode.InternalServerError);
            }
            return dao.Crear(proveedorACrear);
        }

        public Proveedor ObtenerProveedor(string codigo)
        {
            return dao.Obtener(codigo);
        }

        public Proveedor ModificarProveedor(string codigo, Proveedor proveedorAModificar)
        {
            return dao.Modificar(codigo, proveedorAModificar);
        }

        public void EliminarProveedor(string codigo)
        {
            dao.Eliminar(codigo);
        }

        public List<Proveedor> ListarAlumnos()
        {
            return null;
        }
    }
}
