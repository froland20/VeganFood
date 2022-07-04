using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;

namespace EtteremSzerkeszto
{
    class Functions
    {
        public static string md5(string stringToHash)
        {

            byte[] lvAsciiBytes = System.Text.ASCIIEncoding.ASCII.GetBytes(stringToHash);
            byte[] lvHashedBytes = System.Security.Cryptography.MD5CryptoServiceProvider.Create().ComputeHash(lvAsciiBytes);
            string lvHashedString = BitConverter.ToString(lvHashedBytes).Replace("-", "").ToLower();

            return lvHashedString;

        }
    }
}
