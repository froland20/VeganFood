namespace EtteremSzerkeszto
{
    partial class NewFood
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(NewFood));
            this.tBoxName = new System.Windows.Forms.TextBox();
            this.tBoxCategory = new System.Windows.Forms.TextBox();
            this.tBoxPrice = new System.Windows.Forms.TextBox();
            this.tBoxIndegrients = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.btnAddNew = new System.Windows.Forms.Button();
            this.cBoxImage = new System.Windows.Forms.ComboBox();
            this.label5 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // tBoxName
            // 
            this.tBoxName.Font = new System.Drawing.Font("Times New Roman", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.tBoxName.Location = new System.Drawing.Point(7, 35);
            this.tBoxName.MaxLength = 50;
            this.tBoxName.Name = "tBoxName";
            this.tBoxName.Size = new System.Drawing.Size(361, 29);
            this.tBoxName.TabIndex = 0;
            // 
            // tBoxCategory
            // 
            this.tBoxCategory.Font = new System.Drawing.Font("Times New Roman", 14.25F);
            this.tBoxCategory.Location = new System.Drawing.Point(374, 35);
            this.tBoxCategory.MaxLength = 50;
            this.tBoxCategory.Name = "tBoxCategory";
            this.tBoxCategory.Size = new System.Drawing.Size(233, 29);
            this.tBoxCategory.TabIndex = 1;
            // 
            // tBoxPrice
            // 
            this.tBoxPrice.Font = new System.Drawing.Font("Times New Roman", 14.25F);
            this.tBoxPrice.Location = new System.Drawing.Point(616, 35);
            this.tBoxPrice.MaxLength = 6;
            this.tBoxPrice.Name = "tBoxPrice";
            this.tBoxPrice.Size = new System.Drawing.Size(113, 29);
            this.tBoxPrice.TabIndex = 2;
            // 
            // tBoxIndegrients
            // 
            this.tBoxIndegrients.Font = new System.Drawing.Font("Times New Roman", 14.25F);
            this.tBoxIndegrients.Location = new System.Drawing.Point(7, 107);
            this.tBoxIndegrients.MaxLength = 200;
            this.tBoxIndegrients.Name = "tBoxIndegrients";
            this.tBoxIndegrients.Size = new System.Drawing.Size(566, 29);
            this.tBoxIndegrients.TabIndex = 3;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Times New Roman", 15.75F, System.Drawing.FontStyle.Underline, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.label1.Location = new System.Drawing.Point(144, 9);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(44, 23);
            this.label1.TabIndex = 4;
            this.label1.Text = "Étel";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Times New Roman", 15.75F, System.Drawing.FontStyle.Underline);
            this.label2.Location = new System.Drawing.Point(443, 9);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(92, 23);
            this.label2.TabIndex = 5;
            this.label2.Text = "Kategória";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Times New Roman", 15.75F, System.Drawing.FontStyle.Underline);
            this.label3.Location = new System.Drawing.Point(658, 9);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(31, 23);
            this.label3.TabIndex = 6;
            this.label3.Text = "Ár";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 15.75F, System.Drawing.FontStyle.Underline);
            this.label4.Location = new System.Drawing.Point(263, 81);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(105, 23);
            this.label4.TabIndex = 7;
            this.label4.Text = "Összetevők";
            // 
            // btnAddNew
            // 
            this.btnAddNew.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.btnAddNew.Font = new System.Drawing.Font("Times New Roman", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.btnAddNew.Location = new System.Drawing.Point(0, 166);
            this.btnAddNew.Name = "btnAddNew";
            this.btnAddNew.Size = new System.Drawing.Size(734, 35);
            this.btnAddNew.TabIndex = 8;
            this.btnAddNew.Text = "Hozzáadás";
            this.btnAddNew.UseVisualStyleBackColor = true;
            this.btnAddNew.Click += new System.EventHandler(this.btnAddNew_Click);
            // 
            // cBoxImage
            // 
            this.cBoxImage.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.cBoxImage.Font = new System.Drawing.Font("Times New Roman", 14.25F);
            this.cBoxImage.FormattingEnabled = true;
            this.cBoxImage.Items.AddRange(new object[] {
            "hamburger",
            "tészta",
            "saláta",
            "leves",
            "köret",
            "üditő",
            "pizza",
            "egyéb"});
            this.cBoxImage.Location = new System.Drawing.Point(579, 107);
            this.cBoxImage.Name = "cBoxImage";
            this.cBoxImage.Size = new System.Drawing.Size(150, 29);
            this.cBoxImage.TabIndex = 10;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Font = new System.Drawing.Font("Times New Roman", 15.75F, System.Drawing.FontStyle.Underline);
            this.label5.Location = new System.Drawing.Point(633, 81);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(44, 23);
            this.label5.TabIndex = 11;
            this.label5.Text = "Kép";
            // 
            // NewFood
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(734, 201);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.cBoxImage);
            this.Controls.Add(this.btnAddNew);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.tBoxIndegrients);
            this.Controls.Add(this.tBoxPrice);
            this.Controls.Add(this.tBoxCategory);
            this.Controls.Add(this.tBoxName);
            this.DoubleBuffered = true;
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.MaximumSize = new System.Drawing.Size(750, 240);
            this.MinimumSize = new System.Drawing.Size(750, 240);
            this.Name = "NewFood";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Új étel hozzáadás";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox tBoxName;
        private System.Windows.Forms.TextBox tBoxCategory;
        private System.Windows.Forms.TextBox tBoxPrice;
        private System.Windows.Forms.TextBox tBoxIndegrients;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Button btnAddNew;
        private System.Windows.Forms.ComboBox cBoxImage;
        private System.Windows.Forms.Label label5;
    }
}