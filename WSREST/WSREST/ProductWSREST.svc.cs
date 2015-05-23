using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Data.SqlClient;

namespace WSREST
{
    // NOTA: puede usar el comando "Rename" del menú "Refactorizar" para cambiar el nombre de clase "ProductWSREST" en el código, en svc y en el archivo de configuración a la vez.
    // NOTA: para iniciar el Cliente de prueba WCF para probar este servicio, seleccione ProductWSREST.svc o ProductWSREST.svc.cs en el Explorador de soluciones e inicie la depuración.
    public class ProductWSREST : IProductWSREST
    {
        public List<Product> GetProductList()
        {
            return Products.Instance.ProductList;
        }

        private static List<Person> Persons = new List<Person>();
        int PersonCount = 0;

        public Person CreatePerson(Person createPerson)
        {
            SqlConnection con = new SqlConnection("Data Source=192.0.0.189;Initial Catalog=ControlMix;User ID=sa;Password=mine0210");
            con.Open();
            SqlCommand cmd = new SqlCommand("insert into Clientes(Id,nombre,direccion,correo) values(@Id,@nombre,@direccion,@correo)", con);
            cmd.Parameters.AddWithValue("@Id", 3);
            cmd.Parameters.AddWithValue("@nombre", "Carlos Barreto");
            cmd.Parameters.AddWithValue("@direccion", "Av. Surquillo 234");
            cmd.Parameters.AddWithValue("@correo", "cbarreto@hotmail.com");
            int result = cmd.ExecuteNonQuery();
            con.Close();
            createPerson.ID = (++PersonCount).ToString();
            Persons.Add(createPerson);
            return createPerson;
        }

        public String CreateCliente(string data)
        {
            //return "Nada";
            SqlConnection con = new SqlConnection("Data Source=192.0.0.189;Initial Catalog=ControlMix;User ID=sa;Password=mine0210");
            con.Open();
            SqlCommand cmd = new SqlCommand("insert into Clientes(Id,nombre,direccion,correo) values (@Id,@nombre,@direccion,@correo)", con);
            cmd.Parameters.AddWithValue("@Id", 3);
            cmd.Parameters.AddWithValue("@nombre", "Carlos Barreto");
            cmd.Parameters.AddWithValue("@direccion", "Av. Surquillo 234");
            cmd.Parameters.AddWithValue("@correo", "cbarreto@hotmail.com");
            int result = cmd.ExecuteNonQuery();
            con.Close();
            return "Nada";
        }

        public List<Person> GetAllPerson()
        {
            Person createPerson = new Person();
            createPerson.ID = "1";
            createPerson.Name = "Juan";
            createPerson.Age = "18";
            Persons.Add(createPerson);
            return Persons.ToList();
        }

        public Person GetAPerson(string id)
        {
            SqlConnection con = new SqlConnection("Data Source=192.0.0.189;Initial Catalog=ControlMix;User ID=sa;Password=mine0210");
            con.Open();
            SqlCommand cmd = new SqlCommand("insert into Clientes(Id,nombre,direccion,correo) values (@Id,@nombre,@direccion,@correo)", con);
            cmd.Parameters.AddWithValue("@Id", 3);
            cmd.Parameters.AddWithValue("@nombre", "Carlos Barreto");
            cmd.Parameters.AddWithValue("@direccion", "Av. Surquillo 234");
            cmd.Parameters.AddWithValue("@correo", "cbarreto@hotmail.com");
            int result = cmd.ExecuteNonQuery();
            con.Close();
            return Persons.FirstOrDefault(e => e.ID.Equals(id));
            
        }

        public void UpdatePerson(Person updatePerson)
        {
            Person createPerson = new Person();
            createPerson.ID = "1";
            createPerson.Name = "Juan";
            createPerson.Age = "18";
            Persons.Add(createPerson);
            Person p = Persons.FirstOrDefault(e => e.ID.Equals(updatePerson.ID));
            p.Name = updatePerson.Name;
            p.Age = updatePerson.Age;

        }

        public void DeletePerson(string id)
        {
            Persons.RemoveAll(e => e.ID.Equals(id));
        }

    }
}
