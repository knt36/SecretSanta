-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: secretSanta
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `gift`
--

DROP TABLE IF EXISTS `gift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giftName` varchar(255) DEFAULT NULL,
  `giftPrice` double DEFAULT NULL,
  `giftNote` varchar(255) DEFAULT NULL,
  `giftLocation` varchar(255) DEFAULT NULL,
  `giftId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `giftId_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gift`
--

LOCK TABLES `gift` WRITE;
/*!40000 ALTER TABLE `gift` DISABLE KEYS */;
INSERT INTO `gift` VALUES (147,'Tactical Flashlight',64.95,'I will pay for the extra. O.o...... If you ask Judha for advice he can probably recommend a better one follow his advice.','http://www.bhphotovideo.com/bnh/controller/home?O=&sku=1120411&gclid=Cj0KEQiAvuWyBRDO_Yzhpv_4nvEBEiQANBdXMo5ckEyR1UXnG4NHbXk6YPwWmpwLe1HdksdvxEiE3X8aAqyU8P8HAQ&is=REG&ap=y&m=Y&A=details&Q=',33),(152,'Skechers Sport Womens Appeal Fashion Sneaker	',51.95,'I WANT THIS THE MOST! Color: Black/White Size: 6.5 E AS IN ELEPHANT','http://www.amazon.com/Skechers-Womens-Appeal-Fashion-Sneaker/dp/B00FOS0XBE/ref=sr_1_1?s=apparel&ie=UTF8&qid=1448672206&sr=1-1&nodeID=679337011&keywords=memory+foam&refinements=p_89%3ASkechers%2Cp_72%3A2661618011%2Cp_n_size_browse-vebin%3A1285133011%2Cp_n_',41),(153,'Makeup Brushes for Professional-Home kit-12 pieces-Good affordable W/pouch-Best eye shadows liner-Foundation-Concealer-Blush-Lips face top rated cute goat hair-Eco',11.97,'I want this 2nd most. I know it would be extra, but I can pay the difference!','http://www.amazon.com/gp/product/B00CTBW5NS?psc=1&redirect=true&ref_=ox_sc_act_title_1&smid=A18XWRKQ29O26O',41),(156,'Speedo Rapid Spliced Jammer',75,'So, the reason for $75 high price range is because I wanted to get 2, black/red & black/purple size 32. Once again, I will pay the difference over $60. If only getting 1, get the black/purple.','http://www.swimoutlet.com/p/speedo-rapid-spliced-jammer-30018/',43),(158,'Ikee Design Acrylic Jewelry & Cosmetic Storage Display Boxes Two Pieces Set (a.k.a. makeup organizer)',20.23,'','http://www.amazon.com/Ikee-Design-Acrylic-Jewelry-Cosmetic/dp/B00DUJEWDE/ref=zg_bs_3743871_1',44),(160,'CLINIQUE Dramatically Different Moisturizing Gel ITEM 789727 ',26,'SIZE 4.2 oz Pump','http://www.sephora.com/dramatically-different-moisturizing-gel-P122900?skuId=789727',44),(161,'Home-it nail polish holder nail polish storage Acrylic 5 Step Counter Display Nail Polish Organizer Holds up 60 Bottles',13.99,'','http://www.amazon.com/Home-storage-Acrylic-Counter-Organizer/dp/B00GBCPM6I/ref=cm_cd_al_qh_dp_t',44),(162,'bareMinerals bareMinerals Original Foundation Broad Spectrum SPF 15',28,'ITEM 747410  SIZE 0.28 oz COLOR Medium Beige - for medium skin with neutral undertones','http://www.sephora.com/bareminerals-original-foundation-broad-spectrum-spf-15-P61003?skuId=747410',44),(166,'Pile-lined Parka ',60,'Size: 4; Color: Burgundy; Dark Blue or Black are also good','http://www.hm.com/us/product/85521?article=85521-E',42),(167,'Parka',50,'Size: 4; Color: Dark Blue or Black','http://www.hm.com/us/product/83898?article=83898-C#article=83898-C',42),(168,'Kat Von D Everlasting Liquid Lipstick',20,'ITEM 1705011  SIZE 0.22 oz COLOR Exorcism - ripe blackberry','http://www.sephora.com/everlasting-love-liquid-lipstick-P384954?skuId=1705011&icid2=Bestsellers_Makeup_sku_grid_P384954_image',44),(170,'Women Sweater Knit Top and Jogger Sleep Set Santa',25,'Size: Medium','http://www.target.com/p/women-s-sweater-knit-top-jogger-sleep-set-santa/-/A-21482547#prodSlot=_1_20',42),(171,'Women Sweater Knit Top and Jogger Sleep Set Gingerbread Man ',25,'Size: Medium','http://www.target.com/p/women-s-sweater-knit-top-jogger-sleep-set-gingerbread-man/-/A-21485190#prodSlot=_1_7',42),(172,'Funny print Socks',10,'Size: Small or 6','Anywhere',42),(173,'White 3D Printer Filament ',22.98,'Yup','http://www.amazon.com/gp/aw/d/B00J0GMMP6/ref=pd_aw_fbt_328_img_3?ie=UTF8&refRID=1ZJRGN7C75S9GSJH961J',33),(175,'Maxim Original Korean Coffee - 100pks',22.99,'Delicious','http://www.amazon.com/Maxim-Original-Korean-Coffee-100pks/dp/B005GV9RZC',33),(177,'Lenovo x230t Keyboard Back lit	',24.88,'Shipped from Arizona seems good.	','http://www.ebay.com/itm/KEYBOARD-IBM-BACKLIT-T530-T430-T430s-X230-X130e-W530-04X1353-0C02034-V130020CS3-/331713424985?hash=item4d3ba92e59:g:Lr0AAOSwkZhWT5ol',33),(182,'Viva Labs The Finest Organic Extra Virgin Coconut Oil, 16 Ounce',12,'3rd most','http://www.amazon.com/Viva-Labs-Finest-Organic-Coconut/dp/B00DS842HS/ref=sr_1_8?ie=UTF8&qid=1448761366&sr=8-8&keywords=oil',41),(183,'ArtNaturals Enhanced Vitamin C Serum with Hyaluronic Acid 1 Oz - Top Anti Wrinkle, Anti Aging & Repairs Dark Circles, Fades age spots & Sun Damage - 20%',10.95,'4th most','http://www.amazon.com/ArtNaturals-Enhanced-Vitamin-Serum-Hyaluronic/dp/B012Q4M3DO/ref=zg_bs_beauty_19',41),(184,'Burts Bees Everyday Essential Beauty Kit',8.39,'5th most','http://www.amazon.com/Burts-Bees-Everyday-Essential-Beauty/dp/B004EDWMBO/ref=zg_bs_beauty_39',41),(185,'Compression pants',15,'Size Large','http://www.amazon.com/Tesla-Mens-Compression-Baselayer-Pants/dp/B016MUVV5Y/ref=pd_sim_200_1?ie=UTF8&dpID=415gwaUAvjL&dpSrc=sims&preST=_AC_UL160_SR160%2C160_&refRID=0CCP1VV7XKBRF6EDZ22K',40),(186,'One Punch man sweater ',21.36,'Size Large','http://www.amazon.com/Coolchange-Comics-Letter-Long-Sleeve-T-Shirt/dp/B0181W47XE/ref=sr_1_3?ie=UTF8&qid=1448764589&sr=8-3&keywords=onepunch+man+shirt',40),(187,'Sneaker',35.94,'Size 11','http://www.express.com/clothing/men/cap-toe-canvas-sneaker/pro/4532879/cat1710001?crossSellId=0307216',40),(190,'Madden Girl Westmount Combat Boot',49.94,'Size: 8.5 | Color: Taupe','http://www.dsw.com/shoe/madden+girl+westmount+combat+boot?prodId=dsw12prod7280191',45),(191,'Restricted Carson Bootie',59.95,'Size: 8.5 | Color: Taupe','http://www.dsw.com/shoe/restricted+carson+bootie?prodId=352229',45),(192,'[GIFT 3A] China Glaze Nail Polish Road Trip Ready 6pc Full Set ',25.99,'There are two sets to this gift. Both are nail polishes. So, if you choose to buy this, please remember to purchase the other set.','http://www.amazon.com/China-Glaze-Nail-Palish-Ready/dp/B00RDB1ULW/ref=sr_1_1?ie=UTF8&qid=1448770506&sr=8-1&keywords=china+glaze+road+trip+collection',45),(193,'[GIFT 3B] Essie Nail Polish FLOWERISTA Spring 2015 Collection Set of 6 Full Size Bottles',29.99,'There are two sets to this gift. Both are nail polishes. So, if you choose to buy this, please remember to purchase the other set.','http://www.ebay.com/itm/Essie-Nail-Polish-FLOWERISTA-Spring-2015-Collection-Set-of-6-Full-Size-Bottles-/121603660257?hash=item1c502499e1:g:PeYAAOSwBLlU8ydG',45),(194,'Indigo Rd. Slaire Western Bootie',49.95,'Size 8.5 | Color: Black','http://www.dsw.com/shoe/indigo+rd.+slaire+western+bootie?prodId=339328',45),(195,'Dress Pants',48.93,'34x32 W:L (Black)','http://www.express.com/clothing/men/modern-producer-stretch-cotton-dress-pant/pro/3832691/cat700001',40),(196,'Watch',51.31,'','http://www.amazon.com/Timex-Reader-Black-Leather-T2N794/dp/B0078QGSDC/ref=swr_wa_1_ses',40),(197,'SEVENTEEN HIP PACK',24.99,'','http://shop.herschelsupply.com/collections/hip-packs/products/seventeen-hip-pack-black-black',46),(202,'Portable Speakers',24.99,'','http://www.amazon.com/dp/B00GUTY3DK',47),(208,'BALLISTIC ARMY BELT',35,'','http://www.chromeindustries.com/us/en/ballistic-army-belt',46),(209,'GPX HC221B Compact CD Player Stereo Home Music System with AM/FM Tuner',34.71,'','Amazon',49),(210,'Essie Winter Collection (nail polish)',51,'If winter collection is no longee available, any set will be fine. Thank you. ','Essie.com',49),(211,'Candles',18,'Prices vary','Anthropologie',49),(212,'Tresor Perfumed Body Lotion',46,'','Lancome-usa.com',49),(213,'Game of Thrones Monopoly',52.68,'Prices vary','Amazon',49),(214,'Swimming Cap',8,'White Color, if you only get 1 Jammer, get me this also lol','http://www.swimoutlet.com/p/speedo-long-hair-silicone-cap-3620/?q=1',43),(215,'Speedo Vanquisher 2',14,'Silver/Blue Color','http://www.swimoutlet.com/p/speedo-vanquisher-20-mirrored-goggle-13161/?q=1',43),(216,'Displayport Cable',10,'','http://www.amazon.com/Cable-Rankie%C2%AE-Plated-DisplayPort-Resolution/dp/B00YOP0T7G/ref=sr_1_4?s=pc&ie=UTF8&qid=1448814800&sr=1-4&keywords=displayport+cable',43),(217,'**Kat Von D Everlasting Liquid Lipstick**!!',20,'(Color: Nosferatu - blood crimson) sold out online but might be in stores :D','http://www.sephora.com/everlasting-love-liquid-lipstick-P384954?skuId=1705037&icid2=Bestsellers_Makeup_sku_grid_P384954_image',44),(223,'mike giant black straps',41.31,'','http://www.wingedstore.com/components/mike-giant-black-straps-448.html',51),(224,'Z-light portable desk lamp',49.99,'hi:D','http://www.thinkgeek.com/product/ilsk/',51),(225,'handmade sateen succulent cushion- blue echeveria',54,'','http://www.dotandbo.com/collections/the-amado/handmade-sateen-succulent-cushion-blue-echeveria?lb=anon&utm_source=google&utm_medium=pla&utm_campaign=pla_v1&utm_term=104291514077&utm_content=89394&db_unit=pla&db_cdesc=t&db_terms=cpc&db_class=c&db_vref1=g&g',51),(226,'RAVPower 3-Port External Battery Pack Power Bank',49.99,'','http://www.amazon.com/dp/B012NIQG5E?psc=1',51),(227,'Roku SE Streaming Media Player',54.8,'','http://www.amazon.com/Roku-Streaming-Media-Player-Black/dp/B017RTM19O/ref=sr_1_6?s=electronics&ie=UTF8&qid=1448841957&sr=1-6&keywords=roku',51),(228,'Wireless Headphone',27.99,'','http://www.amazon.com/Rebelite-Headphones-Conference-Hands-Free-Microphone/dp/B00O2RN0L8/ref=sr_1_2?s=electronics&ie=UTF8&qid=1448847066&sr=1-2&keywords=rebelite+bluetooth+headphone&refinements=p_85%3A2470955011',47),(229,'Trolling Gift',7.02,'Surprise me!','Anywhere, anything, nothing is fine too',47),(230,'Guitar Clip',5.19,'I will cover any overage.','http://www.amazon.com/gp/product/B005PGGU9O?keywords=guitar%20clip&qid=1448850949&ref_=sr_1_2&sr=8-2',33),(231,'ZFOsportsÂ® - 40LBS ADJUSTABLE WEIGHTED VEST',56.39,'','Amazon',46),(232,'Men s Vito Fashion Sneaker',49.99,'Size 9,5 charcoal gray color, or navy, or polo black','Amazon',46),(233,'Masahiro, Deba, Betsussen, 180mm, Import from Japan',95,'I shall give you the rest of the money ','Amazon',46);
/*!40000 ALTER TABLE `gift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (10,'Sign Up and create your wish list-es ss....','Site Updated','2015-11-24 04:11:33'),(11,'November 30, 2015 On Monday at 11:59 pm','Due Date','2015-11-24 04:11:13'),(12,'The price for gifts is now $60.','Price For Gifts','2015-11-24 04:11:57'),(13,'November 29, 2015 , Sunday @ Noon -in response for cyber Monday','NEW DUE DATE','2015-11-24 12:11:38'),(14,'If you want to be surprised, you can place down a general gift. Just make sure if it is cloths, write down your size and preferences. ','General Gifts Allowed','2015-11-28 04:11:35'),(15,'They are now links and more compact :D ','Gift List Locations Update','2015-11-28 08:11:17'),(19,'Will occur at 10 pm 11/29/2015','Shuffling TIME!','2015-11-29 05:11:24'),(20,'Shuffling extended to 11:59 pm','Waiting On Someone','2015-11-29 10:11:33'),(21,'The Last Person Has Not Completed His List.','Delay...','2015-11-30 12:11:50');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secretSanta`
--

DROP TABLE IF EXISTS `secretSanta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secretSanta` (
  `idsecretSanta` int(11) NOT NULL AUTO_INCREMENT,
  `secretName` varchar(200) DEFAULT NULL,
  `giftReq` int(11) DEFAULT '-1',
  `firstName` varchar(200) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `avatar` tinytext,
  `status` int(11) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `numGifts` int(11) DEFAULT '0',
  `giverAssigned` int(11) DEFAULT '-1',
  `sex` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsecretSanta`),
  UNIQUE KEY `idsecretSanta_UNIQUE` (`idsecretSanta`),
  UNIQUE KEY `secretName_UNIQUE` (`secretName`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secretSanta`
--

LOCK TABLES `secretSanta` WRITE;
/*!40000 ALTER TABLE `secretSanta` DISABLE KEYS */;
INSERT INTO `secretSanta` VALUES (33,'ChocoCoconut',1,'Khoi','Tran','admin1',1,'pz3vex',5,-1,'male'),(40,'Dark',1,'Brian','Wong','6',NULL,'temp12345',5,46,'male'),(41,'KitKat',1,'Lydia','Lam','6',NULL,'hellokhoi',5,-1,'female'),(42,'Snickers',1,'Susan','Luong','3',NULL,'abc123',5,-1,'female'),(43,'cocoa',1,'Chandra','Raharja','chandra',NULL,'Idk1182000',4,-1,'male'),(44,'Ferrero Rocher',1,'Jamie','Nguyen','5',NULL,'password123',6,-1,'female'),(45,'Cadbury',1,'Laura','Nguyen','3',NULL,'almond',5,40,'female'),(46,'Beng Beng',1,'Judha','Nugroho','3',NULL,'compaq7',5,45,'male'),(47,'totallynotadmin',1,'Freddy','Mintarja','2',NULL,'8red1ymi',3,-1,'male'),(49,'Reeses',1,'Marylinn','Mach','2',NULL,'056939386',5,-1,'female'),(51,'Mr.goodbar',1,'David','Nghe','david',NULL,'E3mvtqaclcr',5,-1,'male');
/*!40000 ALTER TABLE `secretSanta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-30  0:48:04
