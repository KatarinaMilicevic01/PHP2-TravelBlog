-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 06:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `akcija`
--

CREATE TABLE `akcija` (
  `idAkcija` int(11) NOT NULL,
  `tipAkcije` varchar(100) NOT NULL,
  `idOsoba` int(11) DEFAULT NULL,
  `idBlog` int(11) DEFAULT NULL,
  `idKomentar` int(250) DEFAULT NULL,
  `idPoruka` int(255) DEFAULT NULL,
  `vreme` timestamp NOT NULL DEFAULT current_timestamp(),
  `procitano` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akcija`
--

INSERT INTO `akcija` (`idAkcija`, `tipAkcije`, `idOsoba`, `idBlog`, `idKomentar`, `idPoruka`, `vreme`, `procitano`) VALUES
(1, 'Logovanje', 24, NULL, NULL, NULL, '2024-03-09 14:22:21', 1),
(2, 'Logovanje', 24, NULL, NULL, NULL, '2024-05-06 13:24:06', 1),
(4, 'Poruka', 1, NULL, NULL, 2, '2024-05-08 15:02:40', 1),
(5, 'Poruka', 1, NULL, NULL, 2, '2024-05-08 15:02:46', 1),
(8, 'Lajk', 25, 9, NULL, NULL, '2024-05-08 15:05:30', 1),
(10, 'Komentar', 24, 9, 20, NULL, '2024-05-08 15:06:13', 1),
(11, 'Lajk', 24, 21, NULL, NULL, '2024-05-08 15:06:55', 1),
(12, 'Komentar', 24, 23, 19, NULL, '2024-05-08 15:06:55', 1),
(13, 'Pregled bloga', 21, 22, NULL, NULL, '2024-05-08 16:09:14', 1),
(18, 'Pregled bloga', NULL, 23, NULL, NULL, '2024-05-14 17:16:39', 1),
(19, 'Registrovanje', 38, NULL, NULL, NULL, '2024-05-14 17:20:47', 1),
(39, 'Poruka', 38, NULL, NULL, 13, '2024-05-14 17:38:52', 1),
(40, 'Odjava', NULL, NULL, NULL, NULL, '2024-05-14 17:42:45', 1),
(42, 'Odjava', NULL, NULL, NULL, NULL, '2024-05-17 13:50:36', 1),
(45, 'Logovanje', 24, NULL, NULL, NULL, '2024-05-17 13:53:02', 1),
(46, 'Pregled bloga', 24, 23, NULL, NULL, '2024-05-17 13:56:49', 1),
(47, 'Pregled bloga', 24, 23, NULL, NULL, '2024-05-17 13:58:33', 1),
(48, 'Pregled bloga', 24, 23, NULL, NULL, '2024-05-17 13:59:37', 1),
(49, 'Pregled bloga', 24, 23, NULL, NULL, '2024-05-17 14:00:13', 1),
(50, 'Pregled bloga', 24, 23, NULL, NULL, '2024-05-17 14:01:09', 1),
(51, 'Pregled bloga', 24, 23, NULL, NULL, '2024-05-17 14:01:46', 1),
(52, 'Odjava', 24, NULL, NULL, NULL, '2024-05-17 14:05:18', 1),
(60, 'Logovanje', 24, NULL, NULL, NULL, '2024-05-17 14:09:31', 1),
(61, 'Pregled bloga', 24, 9, NULL, NULL, '2024-05-17 14:09:45', 1),
(69, 'Pregled bloga', 24, 9, NULL, NULL, '2024-05-17 14:17:15', 1),
(92, 'Pregled bloga', 24, 8, NULL, NULL, '2024-05-17 14:40:23', 1),
(95, 'Poruka', 24, NULL, NULL, 16, '2024-05-17 14:56:15', 1),
(96, 'Pregled bloga', 24, 8, NULL, NULL, '2024-05-17 14:56:28', 1),
(98, 'Pregled bloga', 24, 9, NULL, NULL, '2024-05-17 14:56:30', 1),
(100, 'Odjava', 24, NULL, NULL, NULL, '2024-05-17 14:59:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `idBlog` int(150) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `idSlika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`idBlog`, `naslov`, `opis`, `datum`, `idSlika`) VALUES
(7, 'Borovec iz mog ugla za skijanje i zimovanje', 'O skijanju u Bugarskoj čula sam (skoro) sve  najbolje. U nekoj od mojih analiza odnosa cene ski passa (30-35 evra), smeštaja (25+evra) i dužine staza (58km), upravo je Borovec bio prvi na listi. Samostalno sam bukirala preko interneta smeštaj, kolima lagano organizovala put, prošla sve staze, jela i pila u više mehana (kafana) i rešila da vam ovde sve saberem i usmerim vas uz što više saveta.', '2023-05-31', 9),
(8, 'Saranda ili Ksamil? Najbolje plaže i gde se smestiti', 'Leta 2020. letovala sam u Albaniji, pronašala smeštaj u Sarandi i više puta posetila Ksamil. Cilj mi je da vas ovim tekstom detaljno uputim gde da tražite smeštaj, da li je bolja Saranda ili Ksamil, koji deo Sarande je najbolji za smeštaj, gde se nalaze plaže u Sarandi, gde je glavno šetalište i za kraj informacije i fotografije najboljih plaža u toj regiji.', '2023-05-31', 10),
(9, 'Sarajevo i centralna Bosna kolima', 'Navigacija je pokazivala još 7 kilometara do Baščaršije dok smo i dalje vozili po planinskim predelima. Zapitah se da li je moguće da se sa planine direktno ulazi u centar, ispostaviće se, jedna od čari Sarajeva. Vožnja od Beograda preko Zvornika i Romanije jedna je od najnapornijih do sada. Ipak, sa prvim ćevapom i bosanskom kafom kao okrepom, čovek se od puta brzo odmori, a ni oni predeli na Romaniji nisu tako loši, šta više prelepi za fotografiju.</br>\r\nEvropski Jerusalim, spoj istoka i zapada, Baščaršija, planine, vedar narod i bosanski humor – kratke crte Sarajeva. Za vikend ili nešto duže? Odmah ću vam reći. Nikako samo vikend. Sarajevo može pružiti najmanje 3 dana boravka i obilaska, a ako se tome pridoda i okolina, lako se može napraviti čak i 7 dana.', '2023-06-02', 15),
(20, 'Atina – utisci sa produženog vikenda', 'Istorijsko nasleđe koje poseduje ovaj grad, jedinstveno je u Evropi. I dok je Rim muzej na otvorenom, Atinu je potrebno dosta detaljnije istražiti da bi do prave lepote došli. Grčka nije Austrija, ali ni mi nismo Nemačka, pa se sa Grcima po mentalitetu poprilično poklapamo, a iskreno da vam kažem, stvarno nas poštuju i vole (bez ikakve predrasude više puta se lično uverila u to). Razloga je puno da se odlučite za putovanje u Atinu. Ja sam je po prvi put u životu posetila krajem oktobra 2019. godine,  a na kraju sam bila više nego zadovoljna onime što grad pruža.', '2023-06-02', 28),
(21, 'Letovanje u Egiptu – Utisci iz Hurgade', 'Za početak, sve sabrano, mogu reći da ko jednom ode u Egipat, postaje razmaženi turista i verovatno niti jedno buduće letovanje neće biti isto. Razlog tome je definitivno all-inclusive opcija i miks izuzetnih izleta, a ako se na to doda i produžena sezona odnosno da možete otići u oktobru, novembru, prednosti je mnogo. Za početak, nekoliko bitnih saveta oko novca, a zatim ću vam opisati smeštaj i izlete.', '2023-06-02', 33),
(22, 'Ostrvo Madeira', 'Ovaj tekst pišem mesec dana nakon obilaska Madeire. Utisci su se slegli i u glavi dominiraju pejzaži planinskih vrhova, miks zelenila i posebnih vrsta cveća, visokih litica atlantske obale, uređenih gradića, sa posebnim naglaskom da je sve to tamo negde u okeanu. Madeira su irske litice i zelena polja premeštena negde daleko južno. Posle svega, nije mi najjasnije zašto se kod nas o Madeiri toliko malo, gotovo ni malo, ne priča. To moramo da promenimo.', '2023-06-02', 39),
(23, 'Lošinj – ostrvo na Jadranu koje morate posetiti', 'Praktično nepoznat u Srbiji, uz par asocijacija prijatelja “tamo je moj tata služio vojsku”, Mali Lošinj je za mene predstavljao veliki izazov, uz predosećaj da će ovo letovanje biti zaista drugačije. Treće ostrvo u nizu južno od Rijeke, banja na moru, istorijski važan, sredozemno obojen, sa meštanima i ugostiteljima izuzetne ljubaznosti, ostrvo Lošinj je neotkriveno blago, uz napomenu, da ukoliko ste ljubitelji dugih peščanih plaža, ovo mesto nije za vas.', '2023-06-02', 43),
(33, 'Planina Vlasic', 'Ovo je najlepsa planina na kojoj sam do sad bila.', '2024-05-17', 85);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKategorija` int(150) NOT NULL,
  `kategorija` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorija`, `kategorija`) VALUES
(1, 'Planina'),
(2, 'More'),
(3, 'Plaža'),
(4, 'Reka'),
(5, 'Muzej'),
(6, 'Azija'),
(7, 'Afrika'),
(8, 'Evropa'),
(9, 'Isplaniraj putovanje'),
(10, 'Ostrvo'),
(12, 'Pećina'),
(13, 'Jezero'),
(14, 'Nova kategorija'),
(15, 'Nova kategorij'),
(16, 'Nova katego'),
(17, 'Nova kat'),
(18, 'Proba');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija_blog`
--

CREATE TABLE `kategorija_blog` (
  `idKatBlog` int(150) NOT NULL,
  `idKategorija` int(11) NOT NULL,
  `idBlog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorija_blog`
--

INSERT INTO `kategorija_blog` (`idKatBlog`, `idKategorija`, `idBlog`) VALUES
(1, 1, 7),
(2, 8, 7),
(3, 2, 8),
(4, 3, 8),
(5, 8, 8),
(6, 8, 9),
(9, 8, 20),
(10, 2, 21),
(11, 3, 21),
(12, 7, 21),
(13, 2, 22),
(14, 3, 22),
(15, 8, 22),
(16, 10, 22),
(17, 2, 23),
(18, 3, 23),
(19, 8, 23),
(20, 10, 23),
(36, 1, 33),
(37, 8, 33);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idKomentar` int(200) NOT NULL,
  `komentar` text NOT NULL,
  `idBlog` int(11) NOT NULL,
  `idOsoba` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idKomentar`, `komentar`, `idBlog`, `idOsoba`, `datum`) VALUES
(1, 'Hvala na postavljenom tekstu. Planiram odlazak na Borovec i baš mi znači post!', 7, 1, '2023-05-31'),
(3, 'Da li je bezbedno putovati u Albaniji?', 8, 1, '2023-06-01'),
(5, 'Koje skijaliste je najpogodnije za decu?', 7, 1, '2023-06-01'),
(10, 'Uzivam u citanju tvojih blogova!!', 7, 1, '2023-06-02'),
(16, 'Hvala puno na preporukama i savetima, išao sam u Atinu i jako mi je značilo', 20, 4, '2023-06-04'),
(17, 'U dosta stvari se slažem sa vama.Što se tiče izleta meni je bio mnogo naporniji Luxor od Kaira. Posebno me iritrao put kroz grad Kena koji je uzasno prljav.', 21, 4, '2023-06-04'),
(18, 'Lep putopis, prelepo ostrovo. Jedino što nije tako lako dostupno, možda je zato i zadržalo svoju lepotu.', 22, 4, '2023-06-04'),
(19, 'To jе тамо близу Истри и може се и очекивати добра раја', 23, 24, '2023-06-04'),
(20, 'Koristio sam vozilo carts4rent-a i njihovu navigaciju super sam prosao u puti nisam nigde zalutao.', 9, 24, '2023-06-04'),
(22, 'Ovo je novi komentar.', 9, 25, '2024-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `lajk`
--

CREATE TABLE `lajk` (
  `idLike` int(200) NOT NULL,
  `idBlog` int(11) NOT NULL,
  `idOsoba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lajk`
--

INSERT INTO `lajk` (`idLike`, `idBlog`, `idOsoba`) VALUES
(2, 7, 2),
(4, 8, 1),
(11, 8, 4),
(13, 22, 4),
(14, 23, 24),
(18, 20, 24),
(19, 21, 24),
(22, 9, 24),
(23, 9, 25);

-- --------------------------------------------------------

--
-- Table structure for table `osoba`
--

CREATE TABLE `osoba` (
  `idOsoba` int(150) NOT NULL,
  `ime` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lozinka` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osoba`
--

INSERT INTO `osoba` (`idOsoba`, `ime`, `prezime`, `email`, `lozinka`, `idUloga`) VALUES
(1, 'Petar', 'Petrovic', 'petar@gmail.com', '5bc6e3a3eceed5eb15bad65f94e8b177', 2),
(2, 'Katarina', 'Milićević', 'katarina@gmail.com', '59dda66f74e8c549f1cffbdb83cd699c', 1),
(4, 'Miloš', 'Kostadinović', 'milos@gmail.com', 'b82753180960205a4a62feff9c0f93f5', 2),
(21, 'Ana', 'Nedeljkovic', 'ana@gmail.com', 'e4e0bc2ca5e8b32f7f80be62097cb973', 2),
(22, 'Ognjen', 'Milićević', 'ognjen@gmail.com', 'b8ffd1b3ee90589a0ab586cd3b82c82d', 2),
(24, 'Mika', 'Mikic', 'mika@gmail.com', '28b0717d03cf7ab20cc25dc743c60676', 2),
(25, 'Marko', 'Ilic', 'marko@gmail.com', '26c7c9089e23c14396410bbc6675dbdf', 2),
(26, 'Ana', 'Ilic', 'anaa@gmail.com', 'd55a637ab6a30ce122d1b9bcc4c7e3cc', 2),
(27, 'Ana', 'Ilic', 'ana2@gmail.com', 'd231c23d3a41bf25d6a725080785a996', 2),
(33, 'pera', 'peric', 'pera1@gmail.com', '121ddb8c34bbdae223bfc474c86ea90c', 2),
(38, 'Nikola', 'Nikolic', 'dzoni@gmail.com', 'a646e457db47ad218d6d9d3ce325878b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `podnaslov`
--

CREATE TABLE `podnaslov` (
  `idPodnaslov` int(150) NOT NULL,
  `podnaslov` varchar(150) NOT NULL,
  `podnaslovOpis` text NOT NULL,
  `idSlika` int(11) DEFAULT NULL,
  `idBlog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `podnaslov`
--

INSERT INTO `podnaslov` (`idPodnaslov`, `podnaslov`, `podnaslovOpis`, `idSlika`, `idBlog`) VALUES
(1, 'Skijanje u Bugarskoj – kako i zašto?', 'Kada se kaže “skijanje u Bugarskoj” svima je najpre asocijacija skijalište Bansko. Tamo sam bezuspešno pravila svoje prve skijaške korake 2007. godine, ali se svega toga vrlo malo sećam, fino potisnuto, jer mi skijanje tad nikako nije išlo. Za Bansko važi priča da je dug red na gondoli, da celo mesto zapravo nije na stazi već u podnožju (Brzeće na steroidima) i onda me u tom izboru destinacija sve nekako vuklo ka borovima, odnosno Borovecu (ili kako ga stranci oslovljavaju Borovets). Uz to, informacija da se na vrhu nacionalnog parka Rila, gde je zapravo Borovec, nalazi i Musala, najviši vrh Balkana, dodatna je inspiracija za putovanje. Tu je negde u priči i skijalište Pamporovo, ali je dalje i kraće su staze, pa je ipak izbor pao na Borovec.', NULL, 7),
(2, 'Put do Boroveca (Borovca, Borovetsa)\r\n', 'Ja sam krenula iz Beograda i planiranje puta mi je izgledalo poprilično lagano, što se u praksi i pokazalo. Godinu pre sam išala na Jahorinu, iako je puno volim, put do tamo mi je jako naporan. To uopšte nije slučaj sa Bugarskom i Borovecom jer je 90% puta autoput. Onih 10% otpada na radove pri ulasku u Bugarsku (20ak minuta vožnje) i kasnije skretanje sa autoputa kod Dupnice do Boroveca.</br></br>\r\nMapa kaže da mi je Beograd – Borovec skoro 500 km i da mi efektivno treba oko 5 sati i 40 minuta, bez stajanja na granici i pauza. Dečko i ja smo prvu pauzu napravili u Pirotu, iako nešto nismo bili posebno umorni, bili smo gladni i piškilo nam se, a toaleta od Niša do granice nigde (čisto da znate). Ali ispalo je fino. Izbor kafana u Pirotu je jako fin. Zaista bi bilo šteta ne svratiti, kad malo bolje porazmislim.</br></br>\r\nNa granicu smo došli oko 18 sati, gužve nije bilo, samo kamioni (koje naravno zaobilazimo) samo nam je Gugl mapa u realnom vremenu pokazivala crvenilo i gužvu, ali to je bila varka upravo zbog kamiondžija, sve je išlo lagano i bukvalno smo bili sami na granici (24. januar oko 18h). OBAVEZNO kupite vinjetu na ulasku, mada je idealno da uradite to unapred preko sajta da vam se bugarska u radnji kod granice ne bi ugradila 300 dinara.</br></br>\r\nNajlošiji deo puta je odmah posle granice, radovi gde Bugari nikako da završe svoj deo puta, ali napreduju. Srećom nema gužve, pa brzo ide. Nakon toga je autoput praktično sve do Sofije i dalje ka jugu, gde pratite skretanje za Blagoevgrad. Verujem da ste već vozili ovom trasom, ali ako niste, bez brige, sve je lagano. Kad prođete predgrađe Sofije i one Sovjetske solitere nastavljate samo autoputem sve do Dupnice gde se silazi sa autoputa. Nigde nikad nećete videti skretanje za Borovec, već se tu i tamo pojavljuje Samokov, mesto pre Boroveca. Ta deonica puta koji nije autoput je sjajna, put je perfektan, samo se blago penjete, bez krivina. Nemate osećaj uopšte da ćete otići na neku planinu, sve do mesta Samokov, koji neodoljivo podseća na neka mala Ruska mesta koja sam videla u obilasku Sibira. Tu vam je market Bila i Lidl, ako vam šta treba i već odatle se vide prelepe staze skijališta Borovec.', 11, 7),
(3, 'Borovec – skijalište i ski staze', 'Ono što vas sigurno najviše zanima. Biću vrlo precizna u opsima i ispričati detalje koje retko gde možete pronaći. Najpre, Borovec kao širi kompleks se sastoji od čak 3 skijališta: Sitjakovo, Jastrebec i Markudžik.</br></br>\r\nZa razliku od Kopaonika koji nekako ide u širinu, Borovec ide u visinu. I dok vam je Sitjakovo na 1.300-1.600 mnv, Markudžik je na 2.200-2.500 mnv, što je zaist wow! Jastrebec je na 1.440 – 2.050 mnv, gledano od kraja do početka staze. Prednost ovoga je što kad ima magle, uvek će barem jedno skijalište biti u upotrebi, za razliku od Kopaonika kada je magla svuda je magla. Nama je jedan dan ovaj visoki Markudžik bio neupotrebljiv i zbog magle i zbog -15 stepeni, pa smo vozili Sitjakovo. Jastrebec je na vrhu bio malo u magli, ali veći deo staze bio sjajan za vožnju.', 12, 7),
(4, 'Skijalište Sitjakovo', 'Sitjakovo je u samom centru Boroveca, i ako se recimo smestite u hotelu Rila, imaćete pogled na tu stazu. Sitjakovo ima nekoliko plavih, 3 crvene i jednu crnu ali je mana što jedna plava staza seče crvene, pa ako vozite crvene, moraćete da pazite na početnike u jednom delu. Ovo nije savršeno rešeno i delom podseća na Jahorinu, ali može završiti posao, posebno ako ste početnik, ima sjajnih blagih staza u blizini koje se ne seku sa crvenim.', NULL, 7),
(5, 'Skijlište Markudžik', 'Markudžik, najviše skijalište od svih je posebna priča. Do njega vozi retro gondola koja nas je oduševila, sve dok nam se dupe nije smrzlo na plastici iz 1970. godine. Tu bi mogli da ulože, zaista, jer sada je više atrakcija nego što je ozbiljno, ali radi posao. Fascinantno je da na preko 2.200 do 2.500 imate jedno potpuno zasebno skijalište, gde ima i plavih čak i zelenih staza, ali i crvenih i crnih. Taj deo planine ima nisko rastinje, što je kontrast od borova i svega ostalog što postoji u okolini. Interesantno je za skijanje i ima nekoliko barova i restorana, ali treba pratiti vremensku prognozu. Svakako je doživljaj na Balkanu skijati na skoro 2.500 mnv, što je prednost Boroveca.', NULL, 7),
(6, 'Skijlište Markudžik', 'Markudžik, najviše skijalište od svih je posebna priča. Do njega vozi retro gondola koja nas je oduševila, sve dok nam se dupe nije smrzlo na plastici iz 1970. godine. Tu bi mogli da ulože, zaista, jer sada je više atrakcija nego što je ozbiljno, ali radi posao. Fascinantno je da na preko 2.200 do 2.500 imate jedno potpuno zasebno skijalište, gde ima i plavih čak i zelenih staza, ali i crvenih i crnih. Taj deo planine ima nisko rastinje, što je kontrast od borova i svega ostalog što postoji u okolini. Interesantno je za skijanje i ima nekoliko barova i restorana, ali treba pratiti vremensku prognozu. Svakako je doživljaj na Balkanu skijati na skoro 2.500 mnv, što je prednost Boroveca.', NULL, 7),
(7, 'Skijalište Jastrebec', 'Jastrebec je skijalište između Sitjakova i Markudžika i karakteristično je po tome što ima “samo” 3 crvene staze koje su jako duge. Pravo uživanje za iskusnije skijaše. Ja sam je spuštao sa 2-3 pauze. Na sredini recimo, kada se dođe, ne vidi se gore kraj, dole početak. Moram priznati da mi je ovaj deo skijališta bio omiljen. Mana je što postoji praktično samo jedan kafić-restoran koji je sjajan, ali malo deru po ušima.', NULL, 7),
(8, 'Šta ima Saranda što nema Ksamil?', 'Saranda je veliko mesto, mene lično podseća na Kušadasi u Turskoj. Nije mali ribarski gradić, nije malo autentično mesto kao recimo Polihrono u Grčkoj, već je veliko mesto, praktično grad na samoj obali Jonskog mora.</br></br>\r\nPre svega ogromno šetalište, koje je posebna atrakcija u večernjim satima. Restorani, prodavnice, kafići, na samom šetalištu i u samoj blizini. To u Ksamilu ne postoji. Ko voli te večernje aktivnosti obavezno neka bira Sarandu. Pošto smo obišli nakon toga i Himaru, Valonu, a pre Valone i Drač, mogu slobodno reći da po ovom kriterijumu i svi ovi pomenuti dolaze u obzir, sa time što sam Himaru i Valonu (zajedno sa Boršom i Dhermijem) opisala u posebnom tekstu.</br></br>\r\nŠta još ima Saranda, što nedostaje Ksamilu: veliki izbor restorana, hotela, prosto veće mesto – veći izbor. Imam utisak i da je bolja situacija sa parkingom, koliko god da je haotičan i u Sarandi.', 13, 8),
(9, 'Šta to ima Ksamil što nema Saranda?', 'Ksamil mogu opisati kao neplanski napravljeno naselje, veličine sela, koja ima nekoliko prelepih plaža, više restorana, smeštaj i ništa više od toga.</br></br>\r\nU Ksamilu osim što imate izbor od 3-4 prelepe plaže, gde god da ste smešteni u Ksamilu, možete do njih pešaka.</br>\r\nAko pak rešite da se smestite u Ksamilu, a da uveče dolazite u Sarandu, računajte da je to skoro nemoguća misija, zato što je saobraćaj u večernjim satima ka Sarandi, odnosno kroz Sarandu do glavnog šetališta, užasan. Može se desiti da putujete i 45 minuta, do sat vremena, samo kroz gužvu u Sarandi. Ako dolazite u septembru, naravno, druga priča. Ljudi ovde letuju čak i početkom oktobra.</br></br>\r\nAko želite samo plažu, bez večernjih aktivnosti, nije vam potrebno mnogo restorana ili često spremate hranu u apartmanu, onda je Ksamil bolja opcija.', 14, 8),
(10, 'Baščaršija i ćevapi', 'Gde god da se u Sarajevu nađeš, pitaćete da li si probao ćevape u Baščaršiji. 100 Sarajslija, 100 različitih mišljenja gde su najbolji ćevapi. Neko će reći Mrkva, drugi Ferhatović, treći Hodžić i svi su upravo u Baščaršiji. I ako sam taman pomislila da je to taj magični trougao, dobijam nove preporuke: Željo i Zmaj. Ali to ostaje za neku narednu posetu Sarajevu. Miks 5 ćevapa i sudžukice uz priloge i jedno piće izađe oko 400-500 dinara. </br></br>\r\nBaščaršija predstavlja samo srce Sarajeva. Kroz kvart starih kućica sagrađenih u vreme Osmanlijskog carstva i dan danas uspešno živi taj dug starih vremena. Kazandžiluk ulica je tek posebna priča. Ne preterano ljubazni prodavci, ali neverovatno živopisne tezge.\r\nUlicu dalje su svi oni pomenuti ćevapi, bosanska kafa, mlevena, tucana, pite, burek, sirnica, ratluci. Na momente potpuni dejavu Istanbula koji smo Milana i ja posetili 2 meseca ranije. Čak smo naleteli i na kunefe u kafeu Nebo.', 16, 9),
(11, 'Šta još videti u Sarajevu', 'Nama je vreme u Sarajevu brzo proletelo, jer smo jedan dan izdvojili za odlazak van Sarajeva. Neke lokacije su nam ostale sačuvane za prvo naredni obilazak i na osnovu svih informacija koje imam, itekako su vredne posete. To su pre svega vrelo Bosne, vodopad Skakavac, kao restoran na pretposlednjem spratu Avaz Tornja. Tome moram da pridodam i ćevape kod Želja i Zmaja, kako bi kompletirao sve vodeće sarajevske ćevabdžinice. ', NULL, 9),
(12, 'Šta videti van Sarajeva', 'Spontana prikupljanje informacija o lepim lokalitetima u našem regionu me još prošle godine navodilo na Bosnu i Hercegovinu. Reke, planine, jezera, većim delom upravo brdsko-planinski predeli, sa hladnijim severom i nešto toplijim morskim vazduhom u južnom delu Hercegovine. A tek okolina Bihaća na zapadu.. ali da krenemo od istoka i okoline Sarajeva.</br></br>\r\nPut nas je dalje vodio ka Jajcu, čuvenom vodopadu, mlincima i Plivskom jezeru. Jajce je stari kraljevski grad, izgrađen još u 14. veku. Ime je dobilo po brdu jajastog oblika. Vrlo je posebne arhitekture, a oduvek je bilo na važnoj raskrsnici puteva Sarajevo – Zagreb, odnosno Banja Luka – Dalmacija.</br></br>\r\nJajce je posebno poznato po vodopadu Plive, na ušću u reku Vrbas. Vodopad je moguće videti sa vidikovca iznad ili prići uz plaćanje ulaznice od 4 marke. Vodopad je nekada bio visok 30 metara ali je zbog zemljotresa i posledica rata trenutna visina 22 metra. U okolini sve pršti od Jugonostalgije. Prodaju se zastave nekadašnje republike i Titove slike.', 17, 9),
(13, 'U kom delu grada tražiti smeštaj?', 'Mogu vam najpre reći u kom delu grada da NE tražite smeštaj: Okolina trga Omonija, Exarcheia, Politechnio, severozapadna strana dela Psiri. To su jako stari i polunapušteni delovi grada koji deluju po malo sablasno i nisu nešto gde se treba kretati. Mala analiza hotela na Bukingu je pokazala da su najjeftiniji hoteli u neposrednoj blizini trga Omonija. Dokaz dovoljan. Ali, nemojte da vas bilo šta obeshrabri, itekako ima šta da se vidi u Atini i jako je beznedna za sve tipove kretnja, u bilo koje doba dana ili noći (ok, svakako izbeći Omoniju i Monastiraki metro stanicu).</br></br>\r\nAtina svakako ima lepših delova, kao na primer: Koukaki (idealno da se smestite tu negde, eventualno i malo desno na mapi), Filopapou, Kolonaki (potencijalno najskuplji deo), Pangrati (vrlo simpatičan, 2 stanice udaljem metroom od centra) i generalno što više idete na severoistok, imaćete jako lepe i sređene ulice, ali nećete imati “walking friendly” distancu, već ćete morati koristiti metro, bus ili Uber. Sve navedeno možete pretražiti po imenima na mapi Atine.', 29, 20),
(14, ' Akropolj i Partenon', 'Akropolj je brdo, a Partenon čuvena Antička građevina na istom. Definitivno lokacija broj jedan u Atini, najstarija tačka Atine. Dnevna ulaznica iznosi 20 evra za pomenutu lokaciju, ili 30 evra za još 5 tačaka u gradu. Na putu do centralne tačke, proćićete i pored još nekih lepih stvari.</br></br>\r\nPartenon na brdu Akropolis, predstavlja prvu asocijaciju i simbol Atine. Neću vas daviti istorijom, ali hoću zanimljivostima. Nekada je Partenon imao krov, koji je sa unutrašnje strane bio ofarban u plavo. Ova čuvena antička građevina bila je simbol slobode, ili ropstva. Kako je ko osvajao Atinu, prisvajao je Partenon. U prvim trenucima Pravoslavlja pretvaran je u crkvu, a u vreme Otomanskog carstva u džamiju. Jedno vreme je čak predstavljao i barutanu, kada je u 17. veku doživeo ekspoliziju i urušavanje. Dosta je istorije i zanimljivosti. Mnogo važna građevina na jako lepom mestu.', 30, 20),
(15, 'Likavitos', 'Likavitos je brdo preko puta Akropolja, čiji je vrh za nekih 100 metara viši, što mu daje neverovatnu poziciju za pogled čak do Pireja na jugu. Do vrha se može stići na više načina: pešaka, liftom (koji nije jeftin) i Uberom koji može biti vrlo povoljan, zavisno odakle dolazite. Ne plaća se ulaz na sam vrh i solidno je pristupačno popiti kafu u restoranu. Mana: u zimskom periodu je sunce jako nisko pa je veći deo panorame ka Egeju kao u magli.', 31, 20),
(16, 'Benaki muzej', 'Po mom skromnom mišljenju Benaki je ispred mnogih poznatijih muzeja u Atini. Ulaznica košta 9 evra i jako je lepo, korak po korak, prikazana istorija Atine i cele Grčke. Mislili smo da će nam biti dovoljno 45 minuta, ostali smo sat i trideset. Bonus savet: iza muzeja, uzbrdo, nalazi se deo grada Kolinaki, gde se nalaze jako lepi ekskluzivni kafići gde možete popiti kafu.', NULL, 20),
(17, 'Olimpion', 'Još jedno Antičko zdanje, koje je u punoj funkciji bilo samo 100 godina. Danas prilagođeno i sređeno deluje atraktivno za fotografisanje. Zamak Olimpijskog Zevsa, ili skraćeno Olimpion, nalazi se u samom centru, pored centralnog parka, na 10 minuta od trga Sintagma. Ulaznica je uključena u cenu ako ste na Akropolju kupili onu od 30 evra, a ukoliko niste, pojedinačna karta iznosi 5 evra.', 32, 20),
(18, 'Koliko novca da ponesete u Egipat?', 'Znam da vas to jako zanima, jer ipak, sve je uključeno u cenu i realno nema nekih skrivenih troškova, ali ću vam dati nekoliko detalja koji će vam sigurno značiti. Najpre, računajte da je egipatska turistička viza jedna čista formalnost koja se dobija na aerodromu, a poenta cele priče je da vam naplate neku vrstu turističke takse koja košta 25 dolara (ili evra, šta ponesete). Cena je po osobi.</br></br>\r\nAko makar i minimalno volite da ste na internetu (povremeno) odmah na aerodromu kupite mobilnu karticu (sim internet karticu, koju god) i za to će vam trebati 10-15 evra. Zašto je pametno da to uradite na aerodromu? Većina ljudi se žali na hotelski internet.Nikako ne doplaćivati za hotelski internet, jer je podjednako loš kao i besplatni, samo se može koristiti više aplikacija.</br</br>\r\nPo izlasku sa aerodroma ćete ubrzo shvatiti da se na svakom koraku traži bakšiš, a sa time će vas upoznati momci koji ubacuju kofere u kombi ili autobus. I tokom celog puta, bakšiš će vam biti manje više stalno potreban.Toaleti se van rizorta na ekskurzijama gotovo svuda plaćaju, i dobro je imati 5 funti po osobi za tu svrhu, jer ne vraćaju kusur. Da skratim priču, kada sve saberete, zavisno koliko ste izdašni, za bakšiš će vam trebati 10-20 dolara (evra). Konstantno pominjem obe valute jer su jednako zastupljene gde god da krenete. Egipćani ne vole evre, jer sitni evri u međusobnoj trgovini unutar zemlje nisu validni, zato više vole dolare. Meni su njihove novčanice jako simpatične, pa preporučujem da neku uzmete kao suvenir.</br></br>\r\nNajveća stavka dodatnog troška su izleti, o čemu ću posebno pisati. Kreću se od 30 do 70 evra, ako idete preko naših agencija koje imaju svoje partnere u Egiptu, i generalno vredi dati novac za to, jer je svaki izlet avantura za sebe (i pamćenje). ', 34, 21),
(19, 'Koliko novca da ponesete u Egipat?', 'Znam da vas to jako zanima, jer ipak, sve je uključeno u cenu i realno nema nekih skrivenih troškova, ali ću vam dati nekoliko detalja koji će vam sigurno značiti. Najpre, računajte da je egipatska turistička viza jedna čista formalnost koja se dobija na aerodromu, a poenta cele priče je da vam naplate neku vrstu turističke takse koja košta 25 dolara (ili evra, šta ponesete). Cena je po osobi.</br></br>\r\nAko makar i minimalno volite da ste na internetu (povremeno) odmah na aerodromu kupite mobilnu karticu (sim internet karticu, koju god) i za to će vam trebati 10-15 evra. Zašto je pametno da to uradite na aerodromu? Većina ljudi se žali na hotelski internet.Nikako ne doplaćivati za hotelski internet, jer je podjednako loš kao i besplatni, samo se može koristiti više aplikacija.</br</br>\r\nPo izlasku sa aerodroma ćete ubrzo shvatiti da se na svakom koraku traži bakšiš, a sa time će vas upoznati momci koji ubacuju kofere u kombi ili autobus. I tokom celog puta, bakšiš će vam biti manje više stalno potreban.Toaleti se van rizorta na ekskurzijama gotovo svuda plaćaju, i dobro je imati 5 funti po osobi za tu svrhu, jer ne vraćaju kusur. Da skratim priču, kada sve saberete, zavisno koliko ste izdašni, za bakšiš će vam trebati 10-20 dolara (evra). Konstantno pominjem obe valute jer su jednako zastupljene gde god da krenete. Egipćani ne vole evre, jer sitni evri u međusobnoj trgovini unutar zemlje nisu validni, zato više vole dolare. Meni su njihove novčanice jako simpatične, pa preporučujem da neku uzmete kao suvenir.</br></br>\r\nNajveća stavka dodatnog troška su izleti, o čemu ću posebno pisati. Kreću se od 30 do 70 evra, ako idete preko naših agencija koje imaju svoje partnere u Egiptu, i generalno vredi dati novac za to, jer je svaki izlet avantura za sebe (i pamćenje). ', 35, 21),
(20, 'Izleti u Egiptu i Hurgadi i kako ih odabrati?', 'Najpre pitanje, da li su vam potrebni izleti? Ovo je vrlo lično pitanje i zavisi definitivno od toga da li na putovanje dolazite sa decom ili bez dece. U slučaju da ste par bez dece, svaka organizacija oko izleta će biti lakša, jer mnogi izleti kreću u ranim jutarnjim časovima (2-5 ujutru) a neki traju i po ceo dan. Takođe, ako dolazite u Egipat na 7 dana i želite samo da odmarate, možda ćete otići na eventualno jedan izlet.</br></br>\r\nNajvažnije je znati da su izleti u Egiptu jedan izuzetan doživljaj i mnogi zbog izleta čak i dolaze. Na našem sedmodnevnom putovanju, iako nismo planirali, ipak smo se oduličili za 3 izleta. Rezultat cele priče je da smo bili jako zadovoljni doživljajem, ali smo 7. dana na polasku imali osećaj da nam neko stopira letovanje kad je najbolje. Tri izleta je definitivno teško uklopiti u 7 dana odmora, osim ako niste ni malo ljubitelj sunčanja i plaže. Ako pak dolazite na 10 dana, 3 izleta će vam biti “laganica” a imaćete možda prostora i za više, jer su neki izleti pravo uživanje. ', 36, 21),
(21, 'Luxor', 'Najskuplji izlet je definitivno Luxor, 70 evra po osobi je cena koju nude naše domaće agencije, a doživljaj izuva iz cipela u svakom smislu, sa ranim polaskom.Vožnja traje oko 5-6 sati sa jednom većom pauzom, a celo putovanje je izuzetan doživljaj, obzirom da se većim delom vozi kroz pustinju sve do doline reke Nil. Samo deo oko Nila je zapravo naseljen i tu je tek poseban doživljaj iz autobusa videti kako lokalno stanovništvo živi.', NULL, 21),
(22, 'Hram Karnak', 'Hram Karnak je nešto što se ne propušta, ako dolazite u Egipat. Neverovatan drevni egipatski grad, kao da je do pre 100 godina postojao. Više izuzetnih lokacija za fotografisanje. Kažu da je u julu i avgustu pakao, a nama je u oktobru bilo oko 32 stepena, sasvim podnošljivo. Tu nailazimo i na najveći problem Egipta zapravo, a to su neverovatno naporni prodavci suvenira, koji su nas saletali na izlazu iz hrama. Ovo će nas pratiti celog dana, tako da smo bili spremni na to, uz napomenu da inače u resortima gde ste smešteni ovih scena zaista nema. ', 37, 21),
(23, 'Beduinsko selo', 'Drugo jutro zaredom buđenje pre 5, sa ranim polaskom, ali sa dobrim razlogom: da se izlazak sunca dočeka u pustinji nadomak Hurgade. Dalje smo produžili ka Beduinskom selu, što je, moram priznati, poseban doživljaj. Jahanje kamila smo preskočili ali napravili sjajne fotografije zbog dobrog položaja sunca. Poseban doživljaj su i deca beduina koja se konstantno bila oko nas, ali za razliku od prodavaca suvenira, nisu ni malo naporni, šta više jako slatki i simpatični. ', 38, 21),
(24, 'Šta obići na ostrvu', 'Važno je znati da se na Madeiru ne dolazi primarno zbog kupanja i plaža. Voda je tokom cele godine za 5-6 stepeni hladnija nego recimo voda u Jadranu u sred leta. Takođe, može se desiti i da ima većih talasa, obzirom da je u pitanju ostrvo u okeanu. Ključni razlog dolaska na Madeiru svakako mora biti priroda koja se tu nalazi.</br></br>\r\nIstraživanje ostrva je najbolje podeliti u više dana. Postoje jednodnevne ture u svakoj agenciji, gde svaki dan možete ovići različitu stranu ostrva (istok, zapad, sever, jug) za oko 25 evra po danu. Na svakoj strani ostrva se nalazi po nešto i mislim da vredi dati svaki dan po 25 evra kako bi videli sve. Povoljnija opcija je iznajmiti auto, 35+ evra dnevno, i krenuti po ostrvu. Putevi su odlični, puno je tunela, ali je generalno infrastruktura perfektna i godinama ispred onoga što imamo u Srbiji.', 40, 22),
(25, 'Ponta de Sao Lourenco', 'Na istoku smo obišli Ponta de Sao Lourenco, prelepe litice sa pogledom od koga mi se nije odvajalo. Nalazi se na 30 minuta vožnje kolima i u osnovi može biti tačka za 30-60 minuta zadržavanja. Ipak, ako volite da pešačite, savetujem da izdvojite polovinu dana i da od te tačke ispešačite 2 kilometara odlično stazom do kranjeg istoka ostrva. Mi smo uklopili ovu varijantu od 60 minuta, ali bih već na narednom odlasku izdvojio polovinu dana, ili šta više, ceo dan za to.', 41, 22),
(26, 'Pico do Arieiro i Pico Ruivo', 'Dva najviša vrha na ostrvu smo najpre obišli kolima na sat vremena i rešili da naredni dan bukiramo celodnevnu pešačku turu. Ovi vrhovi su u centralnom delu ostrva i do njih se stiže za 30-40 minuta od centra Funšala.</br></br>\r\nAko volite planinarenje i hajking na visini, preporuka je da ovo bude obavezna dnevna tura, čija je cena oko 35 evra. Najpre se dolazi do vrha Arieiro, koji se nalazi na 1881. mnv i odatle kreće vrhom, sa neverovatnim pejzažem, do narednog vrha Ruivo. ', 42, 22),
(27, 'O ostrvu', 'Lošinjski arhipelag, skup više ostrva, spada u oblast Kvarner, u severnom Jadranu, između Dalmacije i Istre.</br</br>\r\nNa ostrvu dominantnu ulogu ima grad Mali Lošinj koji van sezone broji oko 10.000 stanovnika, u sezoni do 3 puta više. Na 4 kilometara od Malog Lošinja nalazi se i Veli Lošinj. Obratite pažnju sad, Veli je u stvari manji, broji praktično 5 puta manje stanovnika i najviše podseća na lepo sređenu ribarsku luku, dok je ipak Mali Lošinj dominantniji na ostrvu.</br></br>\r\nSeverna strana ostrva okrenuta je ka obali, planinskim vencima i Velebitu, ostrvima Rab i Pag. Južna strana ostrva je praktično “otvorenija” i okrenuta ka Italiji. Razlika je u vetrovima, temperaturi mora, jačini talasa. Od severne do južne strane ostrva stižete za samo 20 minuta pešačenja i ovo je fenomen koji me je najviše zaintrigirao da ostrvo posetim.', 44, 23),
(28, 'Kako doći do Malog Lošinja', 'Idealno i jedino moguće je doći kolima jer direktnih bus i avio linija iz Srbije nema. Prvi pogled na mapu govori da je Mali Lošinj poprilično daleko, ipak, detaljnija razrada puta, a i ono što sam praktično kolima prošla, svrstavaju ovaj put u red vrlo lakih i interesantnih za vožnju.</br></br>\r\nPlan puta će posebno odgovarati ljudima iz Vojvodine i okoline Beograda, jer dobra veza auto puta vodi sve do Rijeke. Zadržavanje na granici je bilo minimalno (oko 20 minuta) i bez posebnih stresova. Deonica do Zagreba je izuzetno lagana, bezbedna i na trenutke vrlo dosadna za vožnju. Deonica Zagreb – Rijeka za mene najlepši auto put kojim sam vozio, primarno zbog velikog broja mostova i tunela, traje sat i po.</br></br>\r\nRijeka je praktično vremenski najbliže more Beogradu, do koga se, bez pauze, stiže za malo manje od 6 sati. Tu se završava autoput, ali se nastavlja izuzetan regionalni put sa novim asfaltom, preko Krčkog mosta za ostrvo Krk, do trajektne luke Valbinska (raspored linija), gde se trajektom dolazi do mesta Merag na ostrvu Cres, i dalje sve magistralnim, prelepim novim asfaltom južno do ostrva Lošinj (povezan mostićem sa ostrvom Cres), do Malog Lošinja.', 45, 23),
(29, 'Centar, luka, kurs', 'Centar grada je prelep, u mediteranstkom stilu i sve je u polukrugu od 10 minuta hoda. Tu se nalaze restorani, kafići, poslastičare (posebno obratiti pažnju), prodavnice sa garderobom. U tom delu je i gradska luka koja je izuzetno čista i mirna, odakle kreću brodići (tzv. barke) za obližnje ekskurzije.</br></br>\r\nNoćni život je vrlo diskutabilan, praktično da i ne postoji. Iako postoje dve diskoteke, mesto nije poznato po noćnim izlascima. Dominiraju klasični kafići i dva noćna bara, čisto kao osveženje, ali ni približno provodu u Srbiji.</br></br>\r\nU Malom Lošinju se nalazi i više megamarketa: Konzum, Plodine i Lidl, smešteni su na 15 minuta od centra, u pravcu zapada, na brdu.</br></br>\r\nMenjačnice i kurs u Lošinju su uvek lošiji u odnosu na veće gradove i redovni kurs. U momentu našeg boravka kurs je u mestu iznosio 7.2 kune za jedan evro, u Velom Lošinju 7.3, dok je zvanični kurs bio blzu 7.4. Na 500 evra to je 10 evra razlike, tako da se kursom ne morate opterećivati.', 46, 23),
(33, 'Neki naslov', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 84, 30),
(34, 'Neki naslov', '666666666666666666666666666666666666666', 77, 30),
(38, 'Neki naslov', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 81, 30),
(39, 'Neki naslov', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 82, 30);

-- --------------------------------------------------------

--
-- Table structure for table `poruka`
--

CREATE TABLE `poruka` (
  `idPoruka` int(150) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `poruka` text NOT NULL,
  `idOsoba` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `procitano` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poruka`
--

INSERT INTO `poruka` (`idPoruka`, `naslov`, `poruka`, `idOsoba`, `datum`, `procitano`) VALUES
(2, 'Skijalista', 'Koja su najbolja skijalista u Evropi za decu i pocetnike?', 1, '2023-06-01', 1),
(3, 'Krit', 'Da li si bila na Kritu? Ukoliko jesi, da li mogla podeliti svoja iskustva?', 1, '2023-06-01', 1),
(4, 'Kampovanje', 'Da li si posecivala kamp naselja i da li imas neku preporuku?', 1, '2023-06-01', 1),
(5, 'Pohvala', 'Obozavam da citam tvoje blogove, inspirisu me i daju mi ideje za nova putovanja', 1, '2023-06-01', 1),
(13, 'Neki naslov', 'Oovo je moja poruka za tebe', 38, '2024-05-14', 1),
(16, 'Neki naslov', 'Ovo je poruka probe1111111111111', 24, '2024-05-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `idSlika` int(150) NOT NULL,
  `putanja` varchar(150) NOT NULL,
  `alt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`idSlika`, `putanja`, `alt`) VALUES
(9, '1685489476___borovec.jpg', 'Borovec skijalište'),
(10, '1685493119___SarandaSetaliste.jpg', 'Šetalište u Sarandi'),
(11, '1685497925___boroput.jpg', 'Pred sam ulazak u Borovec'),
(12, '1685498284___zicara-yastrebec.jpg', 'Žičara Yastrebec'),
(13, '1685499440___panoramaSaranda.jpg', 'Panorama Saranda'),
(14, '1685499781___panoramaKsamil.jpg', 'Panorama Ksamil'),
(15, '1685663874___Sarajevo.jpg', 'Sarajevo'),
(16, '1685664338___Bascarsija.jpg', 'Autorka bloga u Baščaršiji'),
(17, '1685665239___jajce.jpg', 'Autorka bloga u Jajcu'),
(28, '1685671551___Atina.jpg', 'Atina'),
(29, '1685684127___panoramaAtina.jpg', 'Panorama sa Akropolja'),
(30, '1685684409___akropolj.jpg', 'Partenon na Akropolju'),
(31, '1685684522___Likavitos.jpg', 'Likavitos'),
(32, '1685684707___olimpion.jpg', 'Olimpion'),
(33, '1685684934___Egipat.jpg', 'Egipat'),
(34, '1685685357___Egipat-15.jpg', 'Znamenitosti Egipta u dolini Kraljeva'),
(35, '1685685358___Egipat-15.jpg', 'Znamenitosti Egipta u dolini Kraljeva'),
(36, '1685685513___Egipat-06.jpg', 'Ronjenje i korali'),
(37, '1685685775___Egipat-22.jpg', 'Karnak'),
(38, '1685685885___Egipat-11.jpg', 'Beduinsko selo'),
(39, '1685686448___madeira.jpg', 'Madeira'),
(40, '1685686631___Madeira13.jpg', 'Stare kuće na ostrvu'),
(41, '1685686785___madeira5.jpg', 'Litice istočne obale'),
(42, '1685686880___Madeira03.jpg', 'Fascinantni vrhovi'),
(43, '1685697148___FeaturedMaliLosinj.jpg', 'Pogled na Mali Lošinj'),
(44, '1685858257___VLosinjRovenska2.jpg', 'Rovenska luka – Veli Lošinj'),
(45, '1685858451___Srakane.jpg', 'Ostrvo Vele Srakane'),
(46, '1685858983___MLosinjLuka.jpg', 'Pogled na luku'),
(56, '1715613418___911_targa_1.jpg', 'alt neke slike'),
(58, '1715613785___banner.jpg', 'novi'),
(59, '1715614380___banner.jpg', 'vdvdfsvds'),
(60, '1715614406___banner.jpg', 'vdvdfsvds'),
(70, '1715698825___bike1.jfif', 'novi alt'),
(73, '1715699461___bike2.jfif', 'novi alt'),
(74, 'bmw_logo.png', 'alt neke slike'),
(75, 'bmw_logo.png', 'alt neke slike'),
(77, '1715701850___car.png', 'alt neke slike'),
(81, '1715703742___focus_1.jpg', 'alt neke slike'),
(82, '1715704952___focus_1.jpg', 'alt neke slike'),
(84, '1715705055___bike1.jfif', 'alt neke slike'),
(85, '1715960428___IMG-20210118-WA0001.jpg', 'Vlasic'),
(86, '1715960461___IMG-20210118-WA0001.jpg', 'Vlasic');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(10) NOT NULL,
  `uloga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `uloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akcija`
--
ALTER TABLE `akcija`
  ADD PRIMARY KEY (`idAkcija`),
  ADD KEY `idOsoba` (`idOsoba`),
  ADD KEY `IdBlog` (`idBlog`),
  ADD KEY `idKomentar` (`idKomentar`),
  ADD KEY `idPoruka` (`idPoruka`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idBlog`),
  ADD KEY `idSlika` (`idSlika`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKategorija`);

--
-- Indexes for table `kategorija_blog`
--
ALTER TABLE `kategorija_blog`
  ADD PRIMARY KEY (`idKatBlog`),
  ADD KEY `idKategorija` (`idKategorija`),
  ADD KEY `idBlog` (`idBlog`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idKomentar`),
  ADD KEY `idBlog` (`idBlog`),
  ADD KEY `idOsoba` (`idOsoba`);

--
-- Indexes for table `lajk`
--
ALTER TABLE `lajk`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `idBlog` (`idBlog`),
  ADD KEY `idOsoba` (`idOsoba`);

--
-- Indexes for table `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`idOsoba`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idUloga` (`idUloga`);

--
-- Indexes for table `podnaslov`
--
ALTER TABLE `podnaslov`
  ADD PRIMARY KEY (`idPodnaslov`),
  ADD KEY `idSlika` (`idSlika`),
  ADD KEY `idBlog` (`idBlog`);

--
-- Indexes for table `poruka`
--
ALTER TABLE `poruka`
  ADD PRIMARY KEY (`idPoruka`),
  ADD KEY `idOsoba` (`idOsoba`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`idSlika`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akcija`
--
ALTER TABLE `akcija`
  MODIFY `idAkcija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `idBlog` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKategorija` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategorija_blog`
--
ALTER TABLE `kategorija_blog`
  MODIFY `idKatBlog` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentar` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `lajk`
--
ALTER TABLE `lajk`
  MODIFY `idLike` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `osoba`
--
ALTER TABLE `osoba`
  MODIFY `idOsoba` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `podnaslov`
--
ALTER TABLE `podnaslov`
  MODIFY `idPodnaslov` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `poruka`
--
ALTER TABLE `poruka`
  MODIFY `idPoruka` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `idSlika` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `idUloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akcija`
--
ALTER TABLE `akcija`
  ADD CONSTRAINT `akcija_ibfk_1` FOREIGN KEY (`IdBlog`) REFERENCES `blog` (`idBlog`),
  ADD CONSTRAINT `akcija_ibfk_2` FOREIGN KEY (`idOsoba`) REFERENCES `osoba` (`idOsoba`),
  ADD CONSTRAINT `akcija_ibfk_3` FOREIGN KEY (`idPoruka`) REFERENCES `poruka` (`idPoruka`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akcija_ibfk_4` FOREIGN KEY (`idKomentar`) REFERENCES `komentar` (`idKomentar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akcija_ibfk_5` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`idBlog`);

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`);

--
-- Constraints for table `kategorija_blog`
--
ALTER TABLE `kategorija_blog`
  ADD CONSTRAINT `kategorija_blog_ibfk_1` FOREIGN KEY (`idKategorija`) REFERENCES `kategorija` (`idKategorija`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategorija_blog_ibfk_2` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`idBlog`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`idBlog`) ON DELETE CASCADE;

--
-- Constraints for table `lajk`
--
ALTER TABLE `lajk`
  ADD CONSTRAINT `lajk_ibfk_1` FOREIGN KEY (`idOsoba`) REFERENCES `osoba` (`idOsoba`) ON DELETE CASCADE,
  ADD CONSTRAINT `lajk_ibfk_2` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`idBlog`) ON DELETE CASCADE;

--
-- Constraints for table `osoba`
--
ALTER TABLE `osoba`
  ADD CONSTRAINT `osoba_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloga` (`idUloga`);

--
-- Constraints for table `podnaslov`
--
ALTER TABLE `podnaslov`
  ADD CONSTRAINT `podnaslov_ibfk_1` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`);

--
-- Constraints for table `poruka`
--
ALTER TABLE `poruka`
  ADD CONSTRAINT `poruka_ibfk_1` FOREIGN KEY (`idOsoba`) REFERENCES `osoba` (`idOsoba`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
