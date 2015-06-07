using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Web;

namespace WSRestCME.Dominio
{
      [DataContract]
    public class cliente
    {
          [DataMember]
        public string Ruc { get; set; }
          [DataMember]
        public string Razonsocial {get; set; }
          [DataMember]
        public string Direccion { get; set; }
          [DataMember]
        public string Telefono { get; set; }


    }
}