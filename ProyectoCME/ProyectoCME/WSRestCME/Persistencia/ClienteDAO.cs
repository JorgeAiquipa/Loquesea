using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using WSRestCME.Dominio;
using MySql.Data;
using MySql.Data.MySqlClient;
using System.Net;
using System.ServiceModel.Web;

namespace WSRestCME.Persistencia
{
    public class ClienteDAO
    {
        public cliente Crear(cliente clienteACrear)
        {   cliente clienteCreado = null;
            string sql = "INSERT INTO clientes(ruc,razonsocial,direccion,telefono) VALUES (@ruc, @razon, @direcc, @telef)";
            using (MySqlConnection cn = new MySqlConnection(ConexionUtil.Cadena))
            {   cn.Open();
                using (MySqlCommand cm = new MySqlCommand())
               {
                   cm.Connection = cn;
                   cm.CommandType = System.Data.CommandType.Text;
                   cm.CommandText = sql;
                   cm.Parameters.AddWithValue("@ruc", clienteACrear.Ruc );
                   cm.Parameters.AddWithValue("@razon", clienteACrear.Razonsocial );
                   cm.Parameters.AddWithValue("@direcc", clienteACrear.Direccion);
                   cm.Parameters.AddWithValue("@telef", clienteACrear.Telefono );
                   cm.ExecuteNonQuery();
                }
            }
            clienteCreado = Obtener(clienteACrear.Ruc);
            return clienteCreado;
        }
        public cliente Obtener(string codigoruc)
        {   cliente clienteEncontrado = null;
            string sql = "SELECT * FROM clientes WHERE ruc=@cod";
            using (MySqlConnection cn = new MySqlConnection(ConexionUtil.Cadena))
            {
                cn.Open();
                using (MySqlCommand cm = new MySqlCommand())
                {
                    cm.Connection = cn;
                    cm.CommandType = System.Data.CommandType.Text;
                    cm.CommandText = sql;
                    cm.Parameters.AddWithValue("@cod", codigoruc );                                        
                    using (MySqlDataReader  resultado = cm.ExecuteReader())
                    {
                        if (resultado.Read())
                        {
                            clienteEncontrado = new cliente()
                            {
                                Ruc = (string)resultado["ruc"],
                                Razonsocial = (string)resultado["razonsocial"],
                                Direccion = (string)resultado["direccion"],
                                Telefono = (string)resultado["telefono"]
                            };
                        }
                    }
                }
            }
            return clienteEncontrado;
        }
        public cliente Modificar(cliente clienteAModificar)
        {   cliente clienteModificado = null;
            string sql = "UPDATE clientes SET  razonsocial=@razon, direccion=@direcc, telefono=@telef WHERE ruc=@ruc";

            using (MySqlConnection cn = new MySqlConnection(ConexionUtil.Cadena))
            {
                cn.Open();
                using (MySqlCommand cm = new MySqlCommand())
                {
                    cm.Connection = cn;
                    cm.CommandType = System.Data.CommandType.Text;
                    cm.CommandText = sql;
                    cm.Parameters.AddWithValue("@ruc", clienteAModificar.Ruc );
                    cm.Parameters.AddWithValue("@razon", clienteAModificar.Razonsocial);
                    cm.Parameters.AddWithValue("@direcc", clienteAModificar.Direccion);
                    cm.Parameters.AddWithValue("@telef", clienteAModificar.Telefono);
                    cm.ExecuteNonQuery();
                }
            }
            clienteModificado = Obtener(clienteAModificar.Ruc );
            return clienteModificado;
   
        }
        public string Eliminar(string codigoruc)
        {   
                string sql = "DELETE FROM clientes WHERE ruc=@cod";
                using (MySqlConnection cn = new MySqlConnection(ConexionUtil.Cadena))
                {
                   cn.Open();
                   using (MySqlCommand cm = new MySqlCommand())
                    {
                      cm.Connection = cn;
                      cm.CommandType = System.Data.CommandType.Text;
                      cm.CommandText = sql;
                      cm.Parameters.AddWithValue("@cod", codigoruc);
                      int resultado = cm.ExecuteNonQuery();
                      if (resultado == 0)
                      {
                          throw new WebFaultException<string>
                            ("No hubo eliminaciones", HttpStatusCode.InternalServerError);
                      }
                  
                    }
                }
                return "Elimacion Satisfactoria";  
        }
        public List<cliente> ListarTodos()
        {   List<cliente> Lista = new List<cliente>();
            string sql = "SELECT * FROM clientes ";
            using (MySqlConnection cn = new MySqlConnection(ConexionUtil.Cadena))
            {   cn.Open();
                using (MySqlCommand cm = new MySqlCommand())
                {
                    cm.Connection = cn;
                    cm.CommandType = System.Data.CommandType.Text;
                    cm.CommandText = sql;
                    MySqlDataReader dr = null;
                    dr = cm.ExecuteReader();
                    while (dr.Read())
                        {   cliente cli = new cliente();
                            cli.Ruc = dr.GetString(0);
                            cli.Razonsocial = dr.GetString(1);
                            cli.Direccion = dr.GetString(2);
                            cli.Telefono = dr.GetString(3);
                            Lista.Add(cli);
                        }                   
                }
            }
            return Lista;
        }

    }
}