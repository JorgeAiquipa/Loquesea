using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using RestServices.Dominio;
using RestServices.Persistencia;
using System.Data.SqlClient;

namespace RestServices.Persistencia
{
    public class ProveedorDAO
    {
        public Proveedor Crear(Proveedor proveedorACrear)
        {
            Proveedor proveedorCreado = null;
            string sql = "INSERT INTO t_proveedor VALUES (@cod, @ruc, @raz)";
            using (SqlConnection con = new SqlConnection(ConexionUtils.Cadena ))
            {
                con.Open();
                using (SqlCommand com = new SqlCommand(sql, con))
                {
                    com.Parameters.Add(new SqlParameter("@cod", proveedorACrear.Codigo));
                    com.Parameters.Add(new SqlParameter("@ruc", proveedorACrear.Ruc ));
                    com.Parameters.Add(new SqlParameter("@raz", proveedorACrear.Razonsocial ));
                    com.ExecuteNonQuery();
                }
            }
            proveedorCreado = Obtener(proveedorACrear.Codigo);
            return proveedorCreado;
        }
        public Proveedor  Obtener(string  codigo)
        {
            Proveedor proveedorEncontrado = null;
            string sql = "SELECT * FROM t_proveedor WHERE codigo=@cod";
            using (SqlConnection con = new SqlConnection(ConexionUtils.Cadena ))
            {
                con.Open();
                using (SqlCommand com = new SqlCommand(sql, con))
                {
                    com.Parameters.Add(new SqlParameter("@cod", codigo));
                    using (SqlDataReader resultado = com.ExecuteReader())
                    {
                        if (resultado.Read())
                        {
                            proveedorEncontrado = new Proveedor()
                            {
                                Codigo = (string)resultado["codigo"],
                                Ruc = (string)resultado["ruc"],
                                Razonsocial = (string)resultado ["razonsocial"]
                            };
                        }
                    }
                }
            }
            return proveedorEncontrado;
        }

        public Proveedor Modificar(string codigo,  Proveedor proveedorAModificar)
        {
            Proveedor proveedorModificado = null;
            string sql = "UPDATE t_proveedor SET ruc=@ruc , razonsocial= @raz WHERE codigo = @cod)";
            using (SqlConnection con = new SqlConnection(ConexionUtils.Cadena))
            {
                con.Open();
                using (SqlCommand com = new SqlCommand(sql, con))
                {
                    com.Parameters.Add(new SqlParameter("@cod", codigo));
                    com.Parameters.Add(new SqlParameter("@ruc", proveedorAModificar.Ruc));
                    com.Parameters.Add(new SqlParameter("@raz", proveedorAModificar.Razonsocial));
                    com.ExecuteNonQuery();
                }
            }
            proveedorModificado = Obtener(codigo);
            return proveedorModificado;
        }

        public void Eliminar(string codigo)
        {
            string sql = "DELETE FROM t_proveedor WHERE codigo = @cod)";
            using (SqlConnection con = new SqlConnection(ConexionUtils.Cadena))
            {
                con.Open();
                using (SqlCommand com = new SqlCommand(sql, con))
                {
                    com.Parameters.Add(new SqlParameter("@cod",codigo));
                    com.ExecuteNonQuery();
                }
            }
        }
        public List<Proveedor> ListarTodos()
        {
            return null;
        }
    }
}