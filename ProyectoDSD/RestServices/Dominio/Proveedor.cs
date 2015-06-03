using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Web;

namespace RestServices.Dominio
{
    [DataContract]
    public class Proveedor
    {
        [DataMember]
        public string  Codigo { get; set; }
        [DataMember]
        public string Ruc { get; set; }
        [DataMember]
        public string Razonsocial { get; set; }
    }
}