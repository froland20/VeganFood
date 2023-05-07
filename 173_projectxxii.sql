-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 07. 11:49
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `173_projectxxii`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `rest_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `permission` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `accounts`
--

INSERT INTO `accounts` (`id`, `rest_id`, `email`, `password`, `first_name`, `last_name`, `permission`, `create_date`) VALUES
(20, 7, 'roland.foldes20@gmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', 'Roland', 'Földes', 1, '2022-02-22 12:08:36'),
(27, NULL, 'glevente0413@yahoo.com', 'b2ec7c6894cef218d60192c02094170e', 'Levente', 'Gács', 0, '2022-02-28 00:37:08'),
(32, NULL, 'kissferenc@gmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', 'Ferenc', 'Kiss', 0, '2022-05-24 11:28:50'),
(33, NULL, 'nagyevelin@gmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', 'Evelin', 'Nagy', 0, '2022-05-24 11:32:28');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `ingredients` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `foods`
--

INSERT INTO `foods` (`id`, `rest_id`, `name`, `category`, `price`, `ingredients`, `image`) VALUES
(1, 1, 'Vegán NEMCSIRKE Nuggets pizza (32cm)', 'pizza', 3290, 'céklás BBQ szósz, brokkoli, kaliforniai paprika, lila hagyma, kukorica, koktélparadicsom, rukkola, N', '14464112.jpg'),
(2, 1, 'Vegán Nemsonkás pizza (32cm)', 'pizza', 2590, 'pizzaparadicsom, vegán mozzarella borsófehérjés mozaik szelet=NEMSONKA', '14464112.jpg'),
(3, 1, 'Vegán SonGoKu pizza (32cm)', 'pizza', 2590, 'pizzaparadicsom, vegán mozzarella, gomba, kukorica, választható protein', '14464112.jpg'),
(4, 1, 'Vegán BBQ pizza (32cm)', 'pizza', 2590, 'BBQ szósz, vegán mozzarella, kaliforniai paprika, választható protein\r\n\r\n\r\n\r\n', '14464112.jpg'),
(5, 1, 'Vegán classic burger', 'hamburger', 2590, 'mustár, jégsaláta, paradicsom., lila hagyma, szezámolajon grillezett választható burgerpogácsa, vegán cheddar, ketchup, csemegeuborka., köret: tortillachips, ketchup\r\n', 'ef5165dd869fc864.jpg'),
(6, 1, 'Vegán BBQ burger', 'hamburger', 3190, 'rukkola., lila hagyma, paradicsom, szezámolajon grillezett 100% húsmentes választható burgerpogácsa, vegán cheddar, kaliforniai paprika, gomba, tortilla, céklás BBQ\r\n\r\n', 'ef5165dd869fc864.jpg'),
(7, 1, 'Vegán olasz paradicsomleves mozzarellával', 'leves', 1290, 'paradicsompüré, zeller, bors, cukor, vegán ’mozzarella’\r\n\r\n', '1042063vg.jpg'),
(8, 6, 'Babgulyás - 2,5 dl', 'leves', 990, 'szárazbab, sárgarépa, fehérrépa, zeller, hagyma, burgonya, tönkölybúzaliszt, olaj, fokhagyma, tönkölycsipetke, szójajoghurts', '24uzhlydcb.png'),
(9, 6, 'Vitaminsaláta', 'saláta', 1300, 'jégsaláta, zöldsaláta, rukkola, cukkini, sárgarépa, káposzta, csíra, citromos-olívás öntet, szezámmag', '61haxvqn5j.png\r\n'),
(10, 6, 'Cézársaláta', 'saláta', 2300, 'jégsaláta, fejes saláta, cézáröntet, fokhagymás kruton, sült tofukocka, kesu-parmezán, petrezselyem', 'i4lydwe68h.png\r\n'),
(11, 6, 'Napfényes Bőségtál 2 személyre', 'főétel', 7950, 'steakburgonya, rizibizi, grill szójacsíkok, kijevi töltött szejtán, rántott növényi sajt, mustáros grillszejtán, falafel, tofusajtpakora, párolt káposzta, zöldsaláta mix, tartármártás, házi ketchup', 'rpdiy2lzmw.png\r\n'),
(12, 6, 'Falafeltál tönkölypitával', 'főétel', 3200, 'házi csicseriborsó-fasírtok, humuszkrém, vegyes zöldsaláta, fokhagyma, zöldfűszeres szójajoghurt, tönkölypitával', '0fbo1c6dim.png\r\n'),
(13, 6, 'Szejtánbrassói', 'főétel', 3500, 'szejtánpörkölt, paprika, paradicsom, hagyma, fűszeres steakburgonya, sült hagymakarika, fokhagyma, kovászos uborka (allergén: glutén, szója, zeller)', 'hvswntdzq5.png\r\n'),
(14, 6, 'Köles„túró\"gombóc szójajoghurtos öntettel', 'desszert', 1600, 'köles, kukoricadara, tönköly zsemlemorzsa, szójajoghurt, nádcukor, vanília, citrom (allergén: glutén, szója))', 'ygdxe7jo4m.png\r\n'),
(15, 6, 'Somlói galuska', 'desszert', 1600, 'vaníliás-diós-karobos piskóta, vaníliakrém, karoböntet, dió, szójatejszínhab (allergén: glutén, szója, diófélék)', 'iu87w6brz4.png\r\n'),
(16, 6, 'Tavaszi zöldségleves grízgaluskával (0,25l)', 'leves', 950, 'sárgarépa, fehérrépa, angol zeller, zöldborsó, karfiol, szőlőmagolaj, fűszerek (allergén: glutén, zeller)', 'lehv97tcbd.png'),
(17, 7, 'Édes burger', 'burger', 2050, 'Egy igazi Kozmosz-klasszikus: füstös babpogácsa mogyoróvajjal kent, házi sütésű zsemlében. Zöldségekkel (saláta, uborka, paradicsom, lilahagyma), ketchuppal, mustárral és egy kis csalamádéval megbolon', 'ecxmg2vrls.png\r\n'),
(18, 7, 'Gyros Burger', 'burger', 2050, 'Gyros fűszerezésű szójacsíkok házi sütésű zsemlében, vegán remulád szósszal nyakon öntve, zöldségekkel (saláta, uborka, paradicsom, lilahagyma).', 'yswh5jofu0.png'),
(19, 7, 'Szejtán Pörkölt Nokedlivel', 'főétel', 2500, 'Klasszikus, magyaros pörkölt házi készítésű szejtánból, nokedlivel.', 'hrgfdme7yj.png'),
(20, 7, 'Quesadilla', 'főétel', 2500, 'Ízletes, mexikói fűszerezésű kukoricás babragu házi, vegán sajtszószunkkal összesütve tortilla lapban.', 'qoist0y7pk.png'),
(21, 7, 'Spenótos Tészta', 'főétel', 2500, 'Fusilli tészta vegán fokhagymás, tejszínes, spenótos szószba forgatva, fenyőmaggal, napraforgómaggal reszelt vegán sajttal megszórva.\r\nGluténmentes opció választható!', 'szpyajfmod.png'),
(22, 7, 'Sült burgonya', 'köret', 1200, 'Sült burgonya fűszersóval meghintve - gluténmentes!', '954zx2ivh3.png'),
(23, 8, 'Lebbencs Leves', 'leves', 1390, 'Allergének: zeller', 'qypz0vd7o6.png'),
(24, 8, 'Zöldborsó Főzelék Gabonafasírttal', 'főzelék', 1690, 'Allergének: glutén ,szezám', '3qodgzke5p.png'),
(25, 8, 'Kithri, Sárgaborsó és Rizs, Zöldségekkel', 'főzelék', 2590, 'Allergének: zeller, mustármag', 'nlmythcbxg.png'),
(26, 8, 'Lasagne A’la Vermicelli', 'főétel', 2690, 'Allergének: glutén, zeller', 'rwuzymkg1s.png'),
(27, 8, 'Gabonafasírt', 'köret', 670, 'Allergének: nincs', 'ndpmlrj1ub.png\r\n'),
(28, 8, 'Rántott padlizsán', 'köret', 790, 'Allergének: nincs', 'xkr18nslif.png'),
(29, 9, 'Ázsiai burger', 'burger', 2650, 'vöröslencsés-édesburgonyás pogácsa, ananász chutney, kimchi, csíra', 'ow10lpycir.png'),
(30, 9, 'Élelmes burger', 'burger', 2650, 'gombás-babos pogácsa, élelmes szósz, rukkola, növényi sajt, zöldségek', 'zrn6pkcqyb.png'),
(31, 9, 'Smoker burger', 'burger', 2650, 'füstös feketebabos-barna rizses pogácsa, narancsos bbq szósz, karamellizált hagyma, saláta, növényi sajt', 'fok2y3rzus.png'),
(32, 9, 'Bolognai pizza (32cm)', 'pizza', 2950, 'paradicsomszósz, vörös lencseragu, növényi sajt, koktélparadicsom, friss bazsalikom', 'knm5dq628f.png'),
(33, 9, 'Gombás pizza (32cm)', 'pizza', 2850, 'paradicsomsósz, rizsmozzarella sajt, gomba, koktélparadicsom, lila hagyma, parmezán, friss petrezselyem', 'umzg2v81t4.png'),
(34, 9, '100% kókuszvíz (0,33l)', 'üditő', 850, '', '43loanpfzv.png'),
(35, 9, 'Green Cola (0,33l)', 'üditő', 750, '', 'sa42dpxqk9.png'),
(36, 10, 'Classic Burger', 'burger', 1600, 'hagymadarabok, csemegeuborka, ketchup, mustár (Kérlek, válassz hozzá zöldségpogácsát!)', '8xze70aybj.png'),
(37, 10, 'BBQ Burger', 'burger', 1600, 'hagymadarabok, csemegeuborka, BBQ szósz (Kérlek, válassz hozzá zöldségpogácsát!)', 'm94pqu1lb8.png'),
(38, 10, 'Epoch Burger', 'burger', 1600, '1 db EPOCH meat, jégsaláta, hagymadarabok, csemegeuborka, ezersziget öntet.', '3j0oa1pbzx.png'),
(39, 10, 'Big Band', 'burger', 2850, 'hagymadarabok, csemegeuborka, jégsaláta, mandulaszósz (Kérlek, válassz hozzá zöldségpogácsát!)', 'srwtc7yp6k.png'),
(40, 10, 'Gluténmentes* csicseri slapjack', 'gluténmentes', 2150, 'csicseri töltelék, jégsaláta, hagymadarabok, kígyóuborka, paradicsom, Istvánffi szósz. *Szeretnénk felhívni a figyelmedet, hogy a termék glutént is felhasználó üzemben készül, így a keresztszennyeződé', 'rwi9u6yczq.png'),
(41, 10, 'Gluténmentes* Epoch Slapjack', 'gluténmentes', 2150, 'EPOCH meat, jégsaláta, hagymadarabok, csemegeuborka, ezersziget öntet. * Szeretnénk felhívni a figyelmedet, hogy a termék glutént is felhasználó üzemben készül, így a keresztszennyeződés lehetősége fe', 'rtl93sm5u1.png'),
(42, 10, 'Kis burgonya', 'köret', 800, '', 'cya41bvpsi.png'),
(43, 10, 'Ketchup (50 ml)', 'szósz', 300, '', 'u1xy5qkosd.png'),
(44, 10, 'Ezersziget öntet (50 ml)', 'szósz', 300, '', 'jim4ukqglb.png'),
(45, 11, 'Burrito', 'mexikói', 2690, 'chilis bab, vegán sajt, vegán tejföl, paradicsom, lila hagyma, rizs', '43jpq6hntb.png'),
(46, 11, 'Chimichanga', 'mexikói', 2590, 'chilis bab, vegán sajt, vegán tejföl', 'tqod9kl7ey.png'),
(47, 11, 'Quesadillas', 'mexikói', 2590, 'chilis bab, vegán sajt, jalapeno paprika, vegán tejföl', '8d5m1se3h9.png'),
(48, 11, 'Nachos', 'mexikói', 1200, 'tortilla chips, jalapeno paprika, vegán sajtszósz', '2qosmkbeng.png'),
(50, 11, 'Brownie', 'desszert', 690, '', '25lfojcupz.png'),
(51, 11, 'Édesburgonya', 'köret', 1200, '', 'b0klypm9aj.png'),
(52, 11, 'Nuggets (4db)', 'köret', 1200, '', '9tpzogakf8.png'),
(53, 11, 'Nuggets (8db)', 'köret', 1800, '', '9tpzogakf8.png'),
(54, 11, 'Nuggets (12db)', 'köret', 2200, '', '9tpzogakf8.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `items` varchar(300) NOT NULL,
  `delivery_time` int(11) NOT NULL,
  `delivery_cost` int(11) NOT NULL,
  `full_cost` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `state` int(11) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `account_id`, `rest_id`, `items`, `delivery_time`, `delivery_cost`, `full_cost`, `payment_method`, `delivery_address`, `order_date`, `state`, `note`) VALUES
(32, 20, 11, 'Chimichanga;1;2590;Quesadillas;1;2590;Nachos;1;1200;', 30, 450, 6830, 0, '1200 Budapest, Murányi u. 10 ', '2022-05-24 11:23:28', 0, 'Érkezésnél hívjon a futár!'),
(33, 32, 1, 'Vegán Nemsonkás pizza (32cm);1;2590;Vegán NEMCSIRKE Nuggets pizza (32cm);1;3290;Vegán BBQ pizza (32cm);1;2590;', 60, 450, 8920, 2, '1200 Budapest, Ferenc utca 12 12-es kapucsengő', '2022-05-24 11:29:56', 0, ''),
(34, 33, 6, 'Babgulyás - 2,5 dl;1;990;Köles„túró\"gombóc szójajoghurtos öntettel;1;1600;', 35, 200, 2790, 0, '1300 Budapest, Murányi u. 10 2. emelet', '2022-05-24 11:35:08', 0, ''),
(35, 20, 7, 'Szejtán Pörkölt Nokedlivel;1;2500;Gyros Burger;1;2050;', 45, 0, 4550, 0, '1200 Budapest, Murányi u. 10 ', '2022-05-24 13:00:31', 0, ''),
(36, 20, 7, 'Gyros Burger;2;2050;Spenótos Tészta;10;2500;', 45, 0, 29100, 0, '1089 Budapest, Murányi u. 10 ', '2022-06-06 14:30:11', 0, '3-as csengő'),
(37, 20, 8, 'Rántott padlizsán;2;790;Gabonafasírt;2;670;', 35, 0, 2920, 0, '1204 Budapest, Utca 10 ', '2022-06-16 20:04:30', 0, ''),
(38, 20, 8, 'Kithri, Sárgaborsó és Rizs, Zöldségekkel;1;2590;Lebbencs Leves;2;1390;', 35, 0, 5370, 0, '1204 Budapest, Utca 10 ', '2022-06-16 20:32:47', 0, ''),
(39, 27, 6, 'Cézársaláta;1;2300;', 35, 200, 2500, 0, '1204 Budapest, Pacsirta u.157 ', '2022-09-21 11:32:33', 0, ''),
(40, 27, 6, 'Cézársaláta;1;2300;', 35, 200, 2500, 0, '15 bp, pacsirta ', '2022-09-25 16:33:32', 0, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `address` varchar(50) NOT NULL,
  `open_hours` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `delivery_time` int(11) NOT NULL,
  `rest_category` varchar(100) NOT NULL,
  `delivery_cost` int(11) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `description`, `address`, `open_hours`, `company`, `delivery_time`, `rest_category`, `delivery_cost`, `logo`) VALUES
(1, 'Donpepe - Üllői út', 'Tájékoztatjuk kedves megrendelőinket, hogy konyháink jelentős mennyiségben állati eredetű alapanyagokkal rendelkeznek.', '1185 Budapest, Üllői út 706.', 'Mindennap: 11 óra - 20 óra', 'Donpepe Kft.', 60, 'Olasz, Hamburger, Pizza, Leves', 450, 'donpepe.png'),
(6, 'Napfényes Étterem és Cukrászda', 'Otthonos vegán étterem helyi és nemzetközi ételekkel, pl. pizzával, falafellel, gulyással, továbbá kézműves italokkal.', '1053 Budapest, Ferenciek tere 2.', 'Mindennap: 11:30 - 21 óra', 'NAPFÉNYES ÉTTEREM Kft.', 35, 'Napi menü, Saláta, Pizza, Desszert, Pékáru', 200, 'napfenyes-etterem.png'),
(7, 'Kozmosz Vegán Étterem', 'A KOZMOSZ étterem megálmodóiként célunk a vegán életmód és étrend népszerűsítése, elérhetővé tétele. Ételeink kizárólag 100% növényi alapanyagokból készülnek.', '1067 Budapest, Hunyadi tér 11.', 'Mindennap: 11:30 - 21:00', 'Kozmosz Étterem Kft.', 45, 'Leves, Burger, Főétel, Desszert', 0, 'kozmosz-etterem.png'),
(8, 'Vega City', 'Növényi alapú ételek, például vegán burgerek és smoothie-k világos, modern környezetben felszolgálva.', '1053 Budapest, Múzeum krt. 23', 'Mindennap: 10 óra - 18 óra', 'Vegacity Kft.', 35, 'Krémleves, Főzelék, Egytálétel, Tészta, Smoothie', 0, 'vega-city.png'),
(9, 'Élelem Étterem', 'Mindenmentes vegán, nyers vegán étterem,100% növényi, és minőségi alapanyagok, mindez gluténmentes verzióban. Since 2014 :)', '1054 Budapest, Garibaldi utca 5.', 'Mindennap: 11 óra - 20 óra', 'Él-Elem-Étterem Kft.', 60, 'Napi menü, Pizza, Torta, Gyros', 850, 'elelem-etterem.png'),
(10, 'EPOCH Vegan Burger', 'Magyarország első vegán burgerezője. Házi üzemünkben készítjük Nektek szívvel lélekkel burgereink minden alkotóelemét, ...', '1053 Budapest, Királyi Pál utca 20.', 'Mindennap: 11 óra - 20 óra', 'EPOCH Vegan Burger Kft.', 40, 'Burger, Gluténmentes, Saláta, Desszert, Üdítő', 0, 'epoch-vegan-burger.png'),
(11, 'Las Vegan\'s', 'Magyarország első vegán food truck hamburgerezője. Burgerek, vegán nuggets, smoothiek. Rendelj menüt egész hétre ingyenes házhoz-szállítással! Vegán hamburgerező.', '1073 Budapest, Kazinczy utca 11.', 'Mindennap: 11 óra - 23 óra', 'Las Vegan\'s Kft.', 30, 'Saláta, Burger, Menü, Szendvics, Burrito', 450, 'las-vegans.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `stars` int(11) NOT NULL,
  `review_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `reviews`
--

INSERT INTO `reviews` (`id`, `account_id`, `rest_id`, `order_id`, `comment`, `stars`, `review_date`) VALUES
(53, 20, 11, 32, 'A chimichanga és a quesadillas nagyon finoman voltak elkészítve, mindenkinek csak ajánlani tudom! :)', 5, '2022-05-24 11:25:11'),
(54, 32, 1, 33, 'Ma a munkahelyen \"pizza partit\" rendeztünk. A kollégák pizzájával minden rendben volt (ezért a 3 csillag), viszont az én vegán pizzámmal sajnos nagyon nem.', 3, '2022-05-24 11:31:33'),
(55, 33, 6, 34, 'Nem vagyunk párommal igazán vegák, szeretjük a húst, de bevezettük, hogy időnként tartunk egy egy húsmentes hónapot. Meg voltunk elégedve az étellel és a kínálattal egyaránt.', 4, '2022-05-24 11:42:15'),
(56, 20, 7, 36, 'Finom volt az étel', 5, '2022-06-06 14:31:23'),
(57, 20, 8, 38, 'Nagyon finomak voltak az ételek és a kiszállítás is nagyon gyors volt! :)', 5, '2022-06-16 20:33:57'),
(58, 27, 6, 39, 'Good', 5, '2022-09-21 11:32:50');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT a táblához `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT a táblához `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
