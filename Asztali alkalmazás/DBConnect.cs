using MySqlConnector;
using System;
using System.Data;
using System.Windows.Forms;

namespace EtteremSzerkeszto
{
    class DBConnect
    {
        private MySqlConnection connection = null;

        const string server = "localhost";
        const string database = "173_projectxxii";
        const string username = "root";
        const string password = "";
        public DBConnect()
        {
            Initialize();
        }

        private void Initialize()
        {
            string connectionString = "SERVER=" + server + ";" + "DATABASE=" + database + ";" + "UID=" + username + ";" + "PASSWORD=" + password + ";";
            connection = new MySqlConnection(connectionString);
        }

        private void OpenConnection()
        {
            try
            {
                connection.Open();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

        private bool isConnected()
        {
            if (connection == null) {
                OpenConnection();
            }

            return true;
        }

        private void CloseConnection()
        {
            if (connection != null)
                connection.Close();
        }

        public bool tryLogin(string email, string password)
        {
            OpenConnection();

            password = Functions.md5(password);
            string sql = "SELECT * FROM accounts WHERE email='"+email+ "' and password = '" + password + "' and permission=1";
            MySqlCommand cmd = new MySqlCommand(sql, connection);
            MySqlDataReader rdr = cmd.ExecuteReader();

            bool success = false;
            while (rdr.Read())
            {
                success = true;
            }

            CloseConnection();

            return success;
        }

        public int mysqlNumRows(string _query)
        {
            OpenConnection();

            string sql = _query;
            MySqlCommand cmd = new MySqlCommand(sql, connection);
            MySqlDataReader rdr = cmd.ExecuteReader();

            int count = 0; ;
            while (rdr.Read())
            {
                count++;
            }

            CloseConnection();

            return count;
        }

        public DataSet loadTable(int userId)
        {
            OpenConnection();
            var select = $"SELECT foods.id AS ID ,name AS 'Étel Neve',price AS 'Ár (Ft)',category AS Kategória,ingredients AS Összetevők,image AS Kép FROM foods LEFT JOIN accounts ON foods.rest_id=accounts.rest_id WHERE accounts.id='{userId}'";
            var dataAdapter = new MySqlDataAdapter(select, connection);

            var commandBuilder = new MySqlCommandBuilder(dataAdapter);

            var ds = new DataSet();
            dataAdapter.Fill(ds);

            CloseConnection();
            return ds;
        }

        public void editFood(int id, string name, int price)
        {
            OpenConnection();
            string query = "UPDATE foods SET name=@FoodName,price=@FoodPrice WHERE id =@FoodID";
            MySqlCommand cmd = new MySqlCommand();
            cmd.CommandText = query;
            cmd.Parameters.AddWithValue("@FoodID", Convert.ToInt32(id));
            cmd.Parameters.AddWithValue("@FoodName", name);
            cmd.Parameters.AddWithValue("@FoodPrice", Convert.ToInt32(price));
            cmd.Connection = connection;
            cmd.ExecuteNonQuery();

            CloseConnection();
        }

        public int getUserId(string email)
        {
            OpenConnection();
            string sql = "SELECT * FROM accounts WHERE email='" + email +"'";
            MySqlCommand cmd = new MySqlCommand(sql, connection);
            MySqlDataReader rdr = cmd.ExecuteReader();

            int id = 0;
            while (rdr.Read())
            {
                id = rdr.GetInt32(0);
            }

            CloseConnection();
            return id;
        }

        public int getRestId(int _id)
        {
            OpenConnection();
            string sql = "SELECT rest_id FROM accounts WHERE id='" + _id + "'";
            MySqlCommand cmd = new MySqlCommand(sql, connection);
            MySqlDataReader rdr = cmd.ExecuteReader();

            int id = 0;
            while (rdr.Read())
            {
                id = rdr.GetInt32(0);
            }

            CloseConnection();
            return id;
        }

        public void deleteFood(int id)
        {
            OpenConnection();

            string query = "DELETE from foods WHERE id =@FoodID";
            MySqlCommand cmd = new MySqlCommand();
            cmd.CommandText = query;
            cmd.Parameters.AddWithValue("@FoodID", Convert.ToInt32(id));
            cmd.Connection = connection;
            cmd.ExecuteNonQuery();

            CloseConnection();
        }

        public void addFood(string name,int rest_id, string category, string price, string ingredients, string image)
        {
            OpenConnection();

            string query = "INSERT INTO foods (name,rest_id,category,price,ingredients,image) VALUE (@FoodName,@FoodRestID,@FoodCategory,@FoodPrice,@FoodIngredients,@FoodImage)";
            MySqlCommand cmd = new MySqlCommand();
            cmd.CommandText = query;
            cmd.Parameters.AddWithValue("@FoodName", name);
            cmd.Parameters.AddWithValue("@FoodRestID", rest_id);
            cmd.Parameters.AddWithValue("@FoodCategory", category);
            cmd.Parameters.AddWithValue("@FoodPrice", Convert.ToInt32(price));
            cmd.Parameters.AddWithValue("@FoodIngredients", ingredients);
            cmd.Parameters.AddWithValue("@FoodImage", image);
            cmd.Connection = connection;
            cmd.ExecuteNonQuery();

            CloseConnection();
        }
    }
}
