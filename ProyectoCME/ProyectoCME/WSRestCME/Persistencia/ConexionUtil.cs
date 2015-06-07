using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WSRestCME.Persistencia
{
    public class ConexionUtil
    {
         public static string Cadena
        {
            get
            {
                return "Data Source=localhost;Database=controlmix;uid=root;pwd=sebluc2010";
                //return "Data Source=localhost;Database=controlmix;uid=marsa;pwd=marsa2015";
            }
        }
    }
}