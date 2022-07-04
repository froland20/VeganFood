using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace EtteremSzerkeszto
{
    public partial class mainForm : Form
    {
        public static int userId = 0;
        public mainForm(int id)
        {
            InitializeComponent();
            userId = id;
        }

        private void UI_Load(object sender, EventArgs e)
        {
            loadTable();
        }

        private void loadTable()
        {
            DBConnect query = new DBConnect();

            var ds = query.loadTable(userId);
            dataGridView1.ReadOnly = true;
            dataGridView1.DataSource = ds.Tables[0];
            dataGridView1.ClearSelection();
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            if (dataGridView1.SelectedRows.Count > 0)
            {
                string id = dataGridView1.SelectedRows[0].Cells[0].Value + string.Empty;
                string name = dataGridView1.SelectedRows[0].Cells[1].Value + string.Empty;
                string price = dataGridView1.SelectedRows[0].Cells[2].Value + string.Empty;

                boxID.Text = id;
                boxName.Text = name;
                boxPrice.Text = price;

                boxID.Visible = true;
                boxName.Visible = true;
                boxPrice.Visible = true;

                btnDelete.Enabled = true;
                btnModify.Enabled = true;
            }
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
            DBConnect query = new DBConnect();
            try
            {
                query.deleteFood(Convert.ToInt32(boxID.Text));
                MessageBox.Show($"Sikeresen törölted a(z) {boxName.Text} ételt!");
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            refreshTable();
        }

        private void bntModify_Click(object sender, EventArgs e)
        {
            DBConnect query = new DBConnect();
            try
            {
                query.editFood(Convert.ToInt32(boxID.Text), boxName.Text, Convert.ToInt32(boxPrice.Text));
                MessageBox.Show("Sikeres módosítás!");
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            refreshTable();
        }

        private void refreshBtn_Click(object sender, EventArgs e)
        {
            refreshTable();
        }

        public void refreshTable()
        {
            dataGridView1.DataSource = null;
            loadTable();
            dataGridView1.ClearSelection();

            boxID.Text = "";
            boxName.Text = "";
            boxPrice.Text = "";

            boxID.Visible = false;
            boxName.Visible = false;
            boxPrice.Visible = false;

            btnDelete.Enabled = false;
            btnModify.Enabled = false;
        }

        private void bntNew_Click(object sender, EventArgs e)
        {
            DBConnect dBConnect = new DBConnect();
            NewFood nf = new NewFood(dBConnect.getRestId(userId));
            nf.ShowDialog();
        }
    }
}
