using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using WSRestCME.Dominio;
using WSRestCME.Persistencia;
using System.Net;
using System.ServiceModel.Web;

namespace WSRestCME
{
    // NOTA: puede usar el comando "Rename" del menú "Refactorizar" para cambiar el nombre de clase "ClienteREST" en el código, en svc y en el archivo de configuración a la vez.
    // NOTA: para iniciar el Cliente de prueba WCF para probar este servicio, seleccione ClienteREST.svc o ClienteREST.svc.cs en el Explorador de soluciones e inicie la depuración.
    public class ClienteREST : IClienteREST
    {
        private ClienteDAO dao = new ClienteDAO();

        public cliente CrearCliente(cliente clienteACrear)
        {
       
            return dao.Crear(clienteACrear);
        }

        public cliente ObtenerCliente(string codigo)
        {
            return dao.Obtener(codigo);
        }

        public cliente ModificarCliente(cliente clienteAModificar)
        {
            return dao.Modificar(clienteAModificar);
        }

        public string EliminarCliente(string codigo)
        {
          return  dao.Eliminar(codigo);
        }

        public List<cliente> ListarTodosClientes()
        {
            return dao.ListarTodos();
        }

    }
}
