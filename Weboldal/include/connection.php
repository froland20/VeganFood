<?php

// Kapcsolódási adatok megadása
$servername = "localhost";
$username = "root";
$password = "";
$database = "173_projectxxii";

// Kapcsolat létrehozása a fent megadott adatokkal
$connection = new mysqli($servername, $username, $password, $database);


// Ékezetes karakterek átalakítása
$connection->query("SET NAMES 'utf8'"); 

// Kapcsolat ellenőrzése az oldal betöltése előtt
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}

// Alapvető adatok gyors megadása
$siteSettings['site_title'] = 'VegánPont - Online vegán ételrendelés';
$siteSettings['site_logo'] = 'VegánPont';
$siteSettings['site_description'] = 'A partnereink 100%-ban növényi összetevőket használnak, ami egészséges és finom.';
$siteSettings['site_long_description'] = 'A partnereink 100%-ban növényi összetevőket használnak, ami egészséges és finom. Teljes értékű, hozzáadott cukrot és olajat nem tartalmaznak a menük.';
$siteSettings['site_footer_text'] = 'Az oldal a Bootstrap nyíltforráskódú eszköztárával készült,<br /> <br /> Szoftverfejlesztő és -tesztelő projekt munka céljából.';
$siteSettings['company_address'] = '1078 Budapest, Murányi u. 10';
$siteSettings['company_phone_number'] = '+36 30 900 9999';
$siteSettings['company_mail'] = 'info@veganpont.hu';

$paymentMethods = array(
	"Fizetés átvételkor (készpénz)", 
	"Bankkártyás fizetés (online)", 
	"Szépkártyás fizetés (online)"
);

$orderState = array(
	"Rendelés leadva", 
	"Feldolgozás alatt", 
	"Rendelés teljesítve",
	"Hiba a rendelésnél"
);
?>