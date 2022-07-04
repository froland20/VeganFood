using System;
using System.IO;
using System.Reflection;
using System.Windows.Forms;

namespace EtteremSzerkeszto
{
    public partial class loginForm : Form
    {
        public static string saveLoginFile = Path.GetDirectoryName(Assembly.GetEntryAssembly().Location) + @"\login.dat";
        public loginForm()
        {
            InitializeComponent();

            if (File.Exists(saveLoginFile) && new FileInfo(saveLoginFile).Length != 0)
            {
                string[] datas = File.ReadAllLines(saveLoginFile);
                emailBox.Text = datas[0];
                pwBox.Text = datas[1];
                saveLoginCB.Checked = true;
            }
        }

        private void loginButton_Click(object sender, EventArgs e)
        {
            DBConnect DBConn = new DBConnect();
            if (DBConn.tryLogin(emailBox.Text, pwBox.Text))
            {
                MessageBox.Show("Sikeres belépés.");

                if (saveLoginCB.Checked)
                    File.WriteAllText(saveLoginFile, $"{emailBox.Text} \n{pwBox.Text}");
                else
                    File.WriteAllText(saveLoginFile, string.Empty);

                this.Hide();
                mainForm ui = new mainForm(DBConn.getUserId(emailBox.Text));
                ui.ShowDialog();
                this.Close();
            }
            else
            {
                MessageBox.Show("Sikertelen belépés.");
                emailBox.Text = "";
                pwBox.Text = "";
                saveLoginCB.Checked = false;
            }
        }

    }
}
