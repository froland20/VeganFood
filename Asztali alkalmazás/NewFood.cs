using System.Windows.Forms;

namespace EtteremSzerkeszto
{
    public partial class NewFood : Form
    {
        public static int restId = 0;
        public NewFood(int id)
        {
            InitializeComponent();
            restId = id;
            cBoxImage.Text = "egyéb";
        }

        private void btnAddNew_Click(object sender, System.EventArgs e)
        {
            DBConnect dBConnect = new DBConnect();
            try
            {
                dBConnect.addFood(tBoxName.Text, restId, tBoxCategory.Text, tBoxPrice.Text, tBoxIndegrients.Text, cBoxImage.Text + ".png");
                MessageBox.Show($"Sikeresen felvitted a(z) {tBoxName.Text} ételt az étteremhez.");
            }
            catch (System.Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            this.Close();
        }
    }
}
