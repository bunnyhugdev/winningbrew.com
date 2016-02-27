-- MySQL dump 10.13  Distrib 5.7.10, for Linux (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `styles`
--

DROP TABLE IF EXISTS `styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_instructions` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=520 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `styles`
--

LOCK TABLES `styles` WRITE;
/*!40000 ALTER TABLE `styles` DISABLE KEYS */;
INSERT INTO `styles` VALUES (265,'beer','1','Standard American Beer','1A','American Light Lager',NULL,NULL,NULL),(266,'beer','1','Standard American Beer','1B','American Lager',NULL,NULL,NULL),(267,'beer','1','Standard American Beer','1C','Cream Ale',NULL,NULL,NULL),(268,'beer','1','Standard American Beer','1D','American Wheat Beer',NULL,NULL,NULL),(269,'beer','2','International Lager','2A','International Pale Lager',NULL,NULL,NULL),(270,'beer','2','International Lager','2B','International Amber Lager',NULL,NULL,NULL),(271,'beer','2','International Lager','2C','International Dark Lager',NULL,NULL,NULL),(272,'beer','3','Czech Lager','3A','Czech Pale Lager',NULL,NULL,NULL),(273,'beer','3','Czech Lager','3B','Czech Premium Pale Lager',NULL,NULL,NULL),(274,'beer','3','Czech Lager','3C','Czech Amber Lager',NULL,NULL,NULL),(275,'beer','3','Czech Lager','3D','Czech Dark Lager',NULL,NULL,NULL),(276,'beer','4','Pale Malty European Lager','4A','Munich Helles',NULL,NULL,NULL),(277,'beer','4','Pale Malty European Lager','4B','Festbier',NULL,NULL,NULL),(278,'beer','4','Pale Malty European Lager','4C','Helles Bock',NULL,NULL,NULL),(279,'beer','5','Pale Bitter European Beer','5A','German Leichtbier',NULL,NULL,NULL),(280,'beer','5','Pale Bitter European Beer','5B','Kolsch',NULL,NULL,NULL),(281,'beer','5','Pale Bitter European Beer','5C','German Helles Exportbier',NULL,NULL,NULL),(282,'beer','5','Pale Bitter European Beer','5D','German Pils',NULL,NULL,NULL),(283,'beer','6','Amber Malty European Lager','6A','Marzen',NULL,NULL,NULL),(284,'beer','6','Amber Malty European Lager','6B','Rauchbier',NULL,NULL,NULL),(285,'beer','6','Amber Malty European Lager','6C','Dunkles Bock',NULL,NULL,NULL),(286,'beer','7','Amber Bitter European Beer','7A','Vienna Lager',NULL,NULL,NULL),(287,'beer','7','Amber Bitter European Beer','7B','Altbier',NULL,NULL,NULL),(288,'beer','7','Amber Bitter European Beer','7C','Kellerbier','The entrant must specify whether the entry is a Pale Kellerbier (based on Helles) or an Amber Kellerbier (based on Marzen). The entrant may specify another type of Kellerbier based on other base styles such as Pils, Bock, Schwarzbier, but should supply a style description for judges. ',NULL,NULL),(289,'beer','7','Amber Bitter European Beer','7C-pale','Kellerbier: Pale Kellerbier',NULL,NULL,NULL),(290,'beer','7','Amber Bitter European Beer','7C-amber','Kellerbier: Amber Kellerbier',NULL,NULL,NULL),(291,'beer','8','Dark European Lager','8A','Munich Dunkel',NULL,NULL,NULL),(292,'beer','8','Dark European Lager','8B','Schwarzbier',NULL,NULL,NULL),(293,'beer','9','Strong European Beer','9A','Doppelbock','The entrant will specify whether the entry is a pale or a dark variant.',NULL,NULL),(294,'beer','9','Strong European Beer','9B','Eisbock',NULL,NULL,NULL),(295,'beer','9','Strong European Beer','9C','Baltic Porter',NULL,NULL,NULL),(296,'beer','10','German Wheat Beer','10A','Weissbier',NULL,NULL,NULL),(297,'beer','10','German Wheat Beer','10B','Dunkles Weissbier',NULL,NULL,NULL),(298,'beer','10','German Wheat Beer','10C','Weizenbock','The entrant will specify whether the entry is a pale or a dark version.',NULL,NULL),(299,'beer','11','British Bitter','11A','Ordinary Bitter',NULL,NULL,NULL),(300,'beer','11','British Bitter','11B','Best Bitter',NULL,NULL,NULL),(301,'beer','11','British Bitter','11C','Strong Bitter',NULL,NULL,NULL),(302,'beer','12','Pale Commonwealth Beer','12A','British Golden Ale',NULL,NULL,NULL),(303,'beer','12','Pale Commonwealth Beer','12B','Australian Sparkling Ale',NULL,NULL,NULL),(304,'beer','12','Pale Commonwealth Beer','12C','English IPA',NULL,NULL,NULL),(305,'beer','13','Brown British Beer','13A','Dark Mild',NULL,NULL,NULL),(306,'beer','13','Brown British Beer','13B','British Brown Ale',NULL,NULL,NULL),(307,'beer','13','Brown British Beer','13C','English Porter',NULL,NULL,NULL),(308,'beer','14','Scottish Ale','14A','Scottish Light',NULL,NULL,NULL),(309,'beer','14','Scottish Ale','14B','Scottish Heavy',NULL,NULL,NULL),(310,'beer','14','Scottish Ale','14C','Scottish Export',NULL,NULL,NULL),(311,'beer','15','Irish Beer','15A','Irish Red Ale',NULL,NULL,NULL),(312,'beer','15','Irish Beer','15B','Irish Stout',NULL,NULL,NULL),(313,'beer','15','Irish Beer','15C','Irish Extra Stout',NULL,NULL,NULL),(314,'beer','16','Dark British Beer','16A','Sweet Stout',NULL,NULL,NULL),(315,'beer','16','Dark British Beer','16B','Oatmeal Stout',NULL,NULL,NULL),(316,'beer','16','Dark British Beer','16C','Tropical Stout',NULL,NULL,NULL),(317,'beer','16','Dark British Beer','16D','Foreign Extra Stout',NULL,NULL,NULL),(318,'beer','17','Strong British Ale','17A','British Strong Ale',NULL,NULL,NULL),(319,'beer','17','Strong British Ale','17B','Old Ale',NULL,NULL,NULL),(320,'beer','17','Strong British Ale','17C','Wee Heavy',NULL,NULL,NULL),(321,'beer','17','Strong British Ale','17D','English Barleywine',NULL,NULL,NULL),(322,'beer','18','Pale American Ale','18A','Blonde Ale',NULL,NULL,NULL),(323,'beer','18','Pale American Ale','18B','American Pale Ale',NULL,NULL,NULL),(324,'beer','19','Amber and Brown American Beer','19A','American Amber Ale',NULL,NULL,NULL),(325,'beer','19','Amber and Brown American Beer','19B','California Common',NULL,NULL,NULL),(326,'beer','19','Amber and Brown American Beer','19C','American Brown Ale',NULL,NULL,NULL),(327,'beer','20','American Porter and Stout','20A','American Porter',NULL,NULL,NULL),(328,'beer','20','American Porter and Stout','20B','American Stout',NULL,NULL,NULL),(329,'beer','20','American Porter and Stout','20C','Imperial Stout',NULL,NULL,NULL),(330,'beer','21','IPA','21A','American IPA',NULL,NULL,NULL),(331,'beer','21','IPA','21B','Specialty IPA','Entrant must specify a strength (session, standard, double); if no strength is specified, standard will be assumed. Entrant must specify specific type of Specialty IPA from the library of known types listed in the Style Guidelines, or as amended by the BJCP web site; or the entrant must describe the type of Specialty IPA and its key characteristics in comment form so judges will know what to expect. Entrants may specify specific hop varieties used, if entrants feel that judges may not recognize the varietal characteristics of newer hops. Entrants may specify a combination of defined IPA types (e.g., Black Rye IPA) without providing additional descriptions. Entrants may use this category for a different strength version of an IPA defined by its own BJCP subcategory (e.g., session-strength American or English IPA) except where an existing BJCP subcategory already exists for that style (e.g., double [American] IPA). ',NULL,NULL),(332,'beer','21','IPA','21B-belgian','Specialty IPA: Belgian IPA',NULL,NULL,NULL),(333,'beer','21','IPA','21B-black','Specialty IPA: Black IPA',NULL,NULL,NULL),(334,'beer','21','IPA','21B-brown','Specialty IPA: Brown IPA',NULL,NULL,NULL),(335,'beer','21','IPA','21B-red','Specialty IPA: Red IPA',NULL,NULL,NULL),(336,'beer','21','IPA','21B-rye','Specialty IPA: Rye IPA',NULL,NULL,NULL),(337,'beer','21','IPA','21B-white','Specialty IPA: White IPA',NULL,NULL,NULL),(338,'beer','22','Strong American Ale','22A','Double IPA',NULL,NULL,NULL),(339,'beer','22','Strong American Ale','22B','American Strong Ale',NULL,NULL,NULL),(340,'beer','22','Strong American Ale','22C','American Barleywine',NULL,NULL,NULL),(341,'beer','22','Strong American Ale','22D','Wheatwine',NULL,NULL,NULL),(342,'beer','23','European Sour Ale','23A','Berliner Weisse',NULL,NULL,NULL),(343,'beer','23','European Sour Ale','23B','Flanders Red Ale',NULL,NULL,NULL),(344,'beer','23','European Sour Ale','23C','Oud Bruin',NULL,NULL,NULL),(345,'beer','23','European Sour Ale','23D','Lambic',NULL,NULL,NULL),(346,'beer','23','European Sour Ale','23E','Gueuze',NULL,NULL,NULL),(347,'beer','23','European Sour Ale','23F','Fruit Lambic','The type of fruit used must be specified. The brewer must declare a carbonation level (low, medium, high) and a sweetness level (low/none, medium, high).',NULL,NULL),(348,'beer','24','Belgian Ale','24A','Witbier',NULL,NULL,NULL),(349,'beer','24','Belgian Ale','24B','Belgian Pale Ale',NULL,NULL,NULL),(350,'beer','24','Belgian Ale','24C','Biere de Garde','Entrant must specify blond, amber, or brown biere de garde. If no color is specified, the judge should attempt to judge based on initial observation, expecting a malt flavor and balance that matches the color.',NULL,NULL),(351,'beer','25','Strong Belgian Ale','25A','Belgian Blond Ale',NULL,NULL,NULL),(352,'beer','25','Strong Belgian Ale','25B','Saison','The entrant must specify the strength (table, standard, super) and the color (pale, dark).',NULL,NULL),(353,'beer','25','Strong Belgian Ale','25C','Belgian Golden Strong Ale',NULL,NULL,NULL),(354,'beer','26','Trappist Ale','26A','Trappist Single',NULL,NULL,NULL),(355,'beer','26','Trappist Ale','26B','Belgian Dubbel',NULL,NULL,NULL),(356,'beer','26','Trappist Ale','26C','Belgian Tripel',NULL,NULL,NULL),(357,'beer','26','Trappist Ale','26D','Belgian Dark Strong Ale',NULL,NULL,NULL),(358,'beer','27','Historical Beer','27-gose','Historical Beer: Gose',NULL,NULL,NULL),(359,'beer','27','Historical Beer','27-ky','Historical Beer: Kentucky Common',NULL,NULL,NULL),(360,'beer','27','Historical Beer','27-Lichtenhainer','Historical Beer: Lichtenhainer',NULL,NULL,NULL),(361,'beer','27','Historical Beer','27-london-brown','Historical Beer: London Brown Ale',NULL,NULL,NULL),(362,'beer','27','Historical Beer','27-piwo','Historical Beer: Piwo Grodziskie',NULL,NULL,NULL),(363,'beer','27','Historical Beer','27-pre18-lager','Historical Beer: Pre-Prohibition Lager',NULL,NULL,NULL),(364,'beer','27','Historical Beer','27-pre18-porter','Historical Beer: Pre-Prohibition Porter',NULL,NULL,NULL),(365,'beer','27','Historical Beer','27-roggenbier','Historical Beer: Roggenbier',NULL,NULL,NULL),(366,'beer','27','Historical Beer','27-sahti','Historical Beer: Sahti',NULL,NULL,NULL),(367,'beer','28','American Wild Ale','28A','Brett Beer','The entrant must specify either a base beer style (Classic Style, or a generic style family) or provide a description of the ingredients/specs/desired character. The entrant must specify if a 100% Brett fermentation was conducted. The entrant may specify the strain(s) of Brettanomyces used.',NULL,NULL),(368,'beer','28','American Wild Ale','28B','Mixed-Fermentation Sour Beer','The entrant must specify a description of the beer, identifying the yeast/bacteria used and either a base style or the ingredients/specs/target character of the beer.',NULL,NULL),(369,'beer','28','American Wild Ale','28C','Wild Specialty Beer','Entrant must specify the type of fruit, spice, herb, or wood used. Entrant must specify a description of the beer, identifying the yeast/bacteria used and either a base style or the ingredients/specs/target character of the beer. A general description of the special nature of the beer can cover all the required items.',NULL,NULL),(370,'beer','29','Fruit Beer','29A','Fruit Beer','The entrant must specify a base style, but the declared style does not have to be a Classic Style. The entrant must specify the type(s) of fruit used. Soured fruit beers that are not lambics should be entered in the American Wild Ale category.',NULL,NULL),(371,'beer','29','Fruit Beer','29B','Fruit and Spice Beer','The entrant must specify a base style; the declared style does not have to be a Classic Style. The entrant must specify the type of fruit and spices, herbs, or vegetables (SHV) used; individual SHV ingredients do not need to be specified if a well-known blend of spices is used (e.g., apple pie spice).',NULL,NULL),(372,'beer','29','Fruit Beer','29C','Specialty Fruit Beer','The entrant must specify a base style; the declared style does not have to be a Classic Style. The entrant must specify the type of fruit used. The entrant must specify the type of additional fermentable sugar or special process employed.',NULL,NULL),(373,'beer','30','Spiced Beer','30A','Spice, Herb, or Vegetable Beer','The entrant must specify a base style, but the declared style does not have to be a Classic Style. The entrant must specify the type of spices, herbs, or vegetables used, but individual ingredients do not need to be specified if a well-known spice blend is used (e.g., apple pie spice, curry powder, chili powder). ',NULL,NULL),(374,'beer','30','Spiced Beer','30B','Autumn Seasonal Beer','The entrant must specify a base style, but the declared style does not have to be a Classic Style. The entrant must specify the type of spices, herbs, or vegetables used; individual ingredients do not need to be specified if a well-known blend of spices is used (e.g., pumpkin pie spice). The beer must contain spices, and may contain vegetables and/or sugars.',NULL,NULL),(375,'beer','30','Spiced Beer','30C','Winter Seasonal Beer','The entrant must specify a base style, but the declared style does not have to be a Classic Style. The entrant must specify the type of spices, sugars, fruits, or additional fermentables used; individual ingredients do not need to be specified if a well-known blend of spices is used (e.g., mulling spice).',NULL,NULL),(376,'beer','31','Alternative Fermentables Beer','31A','Alternative Grain Beer','The entrant must specify a base style, but the declared style does not have to be a Classic Style. The entrant must specify the type of alternative grain used.',NULL,NULL),(377,'beer','31','Alternative Fermentables Beer','31B','Alternative Sugar Beer','The entrant must specify a base style, but the declared style does not have to be a Classic Style. The entrant must specify the type of sugar used.',NULL,NULL),(378,'beer','32','Smoked Beer','32A','Classic Style Smoked Beer','The entrant must specify a Classic Style base beer. The entrant must specify the type of wood or smoke if a varietal smoke character is noticeable.',NULL,NULL),(379,'beer','32','Smoked Beer','32B','Specialty Smoked Beer','The entrant must specify a base beer style; the base beer does not have to be a Classic Style. The entrant must specify the type of wood or smoke if a varietal smoke character is noticeable. The entrant must specify the additional ingredients or processes that make this a specialty smoked beer',NULL,NULL),(380,'beer','33','Wood Beer','33A','Wood-Aged Beer','The entrant must specify the type of wood used and the char level (if charred). The entrant must specify the base style; the base style can be either a classic BJCP style (i.e., a named subcategory) or may be a generic type of beer (e.g., porter, brown ale). If an unusual wood has been used, the entrant must supply a brief description of the sensory aspects the wood adds to beer. ',NULL,NULL),(381,'beer','33','Wood Beer','33B','Specialty Wood-Aged Beer','The entrant must specify the additional alcohol character, with information about the barrel if relevant to the finished flavor profile. The entrant must specify the base style; the base style can be either a classic BJCP style (i.e., a named subcategory) or may be a generic type of beer (e.g., porter, brown ale). If an unusual wood or ingredient has been used, the entrant must supply a brief description of the sensory aspects the ingredients adds to the beer.',NULL,NULL),(382,'beer','34','Specialty Beer','34A','Clone Beer','The entrant must specify the name of the commercial beer being cloned, specifications (vital statistics) for the beer, and either a brief sensory description or a list of ingredients used in making the beer. Without this information, judges who are unfamiliar with the beer will have no basis for comparison.',NULL,NULL),(383,'beer','34','Specialty Beer','34B','Mixed-Style Beer','The entrant must specify the styles being mixed. The entrant may provide an additional description of the sensory profile of the beer or the vital statistics of the resulting beer.',NULL,NULL),(384,'beer','34','Specialty Beer','34C','Experimental Beer','The entrant must specify the special nature of the experimental beer, including the special ingredients or processes that make it not fit elsewhere in the guidelines. The entrant must provide vital statistics for the beer, and either a brief sensory description or a list of ingredients used in making the beer. Without this information, judges will have no basis for comparison.',NULL,NULL),(385,'mead','M1','Traditional Mead','M1A','Dry Mead','Entrants MUST specify carbonation level and strength. Sweetness is assumed to be DRY in this category. Entrants MAY specify honey varieties.',NULL,NULL),(386,'mead','M1','Traditional Mead','M1B','Semi-Sweet Mead','Entrants MUST specify carbonation level and strength. Sweetness is assumed to be SEMI-SWEET in this category. Entrants MAY specify honey varieties.',NULL,NULL),(387,'mead','M1','Traditional Mead','M1C','Sweet Mead','Entrants MUST specify carbonation level and strength. Sweetness is assumed to be SWEET in this category. Entrants MAY specify honey varieties.',NULL,NULL),(388,'mead','M2','Fruit Mead','M2A','Cyser','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MAY specify the varieties of apple used; if specified, a varietal character will be expected. Products with a relatively low proportion of honey are better entered as a Specialty Cider. A spiced cyser should be entered as a Fruit and Spice Mead. A cyser with other fruit should be entered as a Melomel. A cyser with additional ingredients should be entered as an Experimental Mead.',NULL,NULL),(389,'mead','M2','Fruit Mead','M2B','Pyment','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MAY specify the varieties of grape used; if specified, a varietal character will be expected. A spiced pyment (hippocras) should be entered as a Fruit and Spice Mead. A pyment made with other fruit should be entered as a Melomel. A pyment with other ingredients should be entered as an Experimental Mead.',NULL,NULL),(390,'mead','M2','Fruit Mead','M2C','Berry Mead','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MUST specify the varieties of fruit used. A mead made with both berries and non-berry fruit (including apples and grapes) should be entered as a Melomel. A berry mead that is spiced should be entered as a Fruit and Spice Mead. A berry mead containing other ingredients should be entered as an Experimental Mead. ',NULL,NULL),(391,'mead','M2','Fruit Mead','M2D','Stone Fruit Mead','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MUST specify the varieties of fruit used. A stone fruit mead that is spiced should be entered as a Fruit and Spice Mead. A stone fruit mead that contains non-stone fruit should be entered as a Melomel. A stone fruit mead that contains other ingredients should be entered as an Experimental Mead.',NULL,NULL),(392,'mead','M2','Fruit Mead','M2E','Melomel','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MUST specify the varieties of fruit used. A melomel that is spiced should be entered as a Fruit and Spice Mead. A melomel containing other ingredients should be entered as an Experimental Mead. Melomels made with either apples or grapes as the only fruit source should be entered as a Cyser or Pyment, respectively. Melomels with apples or grapes, plus other fruit should be entered in this category, not Experimental Mead.',NULL,NULL),(393,'mead','M3','Spiced Mead','M3A','Fruit and Spice Mead','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MUST specify the types of spices used, (although well-known spice blends may be referred to by common name, such as apple pie spices). Entrants MUST specify the types of fruits used. If only combinations of spices are used, enter as a Spice, Herb, or Vegetable Mead. If only combinations of fruits are used, enter as a Melomel. If other types of ingredients are used, enter as an Experimental Mead.',NULL,NULL),(394,'mead','M3','Spiced Mead','M3B','Spice, Herb or Vegetable Mead','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MUST specify the types of spices used (although well-known spice blends may be referred to by common name, such as apple pie spices).',NULL,NULL),(395,'mead','M4','Specialty Mead','M4A','Braggot','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MAY specify the base style or beer or types of malt used. Products with a relatively low proportion of honey should be entered as an Alternative Sugar Beer.',NULL,NULL),(396,'mead','M4','Specialty Mead','M4B','Historical Mead','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MUST specify the special nature of the mead, providing a description of the mead for judges if no such description is available from the BJCP.',NULL,NULL),(397,'mead','M4','Specialty Mead','M4C','Experimental Mead','Entrants MUST specify carbonation level, strength, and sweetness. Entrants MAY specify honey varieties. Entrants MUST specify the special nature of the mead, whether it is a combination of existing styles, an experimental mead, or some other creation. Any special ingredients that impart an identifiable character MAY be declared.',NULL,NULL),(398,'cider','C1','Standard Cider and Perry','C1A','New World Cider','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 categories). If OG is substantially above typical range, entrant should explain, e.g., particular variety of apple giving high-gravity juice.',NULL,NULL),(399,'cider','C1','Standard Cider and Perry','C1B','English Cider','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (dry through medium-sweet, 4 levels). Entrants MAY specify variety of apple for a single varietal cider; if specified, varietal character will be expected. ',NULL,NULL),(400,'cider','C1','Standard Cider and Perry','C1C','French Cider','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (medium to sweet only, 3 levels). Entrants MAY specify variety of apple for a single varietal cider; if specified, varietal character will be expected. ',NULL,NULL),(401,'cider','C1','Standard Cider and Perry','C1D','New World Perry','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 categories).',NULL,NULL),(402,'cider','C1','Standard Cider and Perry','C1E','Traditional Perry','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 categories). Entrants MUST state variety of pear(s) used.',NULL,NULL),(403,'cider','C2','Specialty Cider and Perry','C2A','New England Cider','Entrants MUST specify if the cider was barrel-fermented or aged. Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 levels).',NULL,NULL),(404,'cider','C2','Specialty Cider and Perry','C2B','Cider with Other Fruit','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 categories). Entrants MUST specify all fruit(s) and/or fruit juice(s) added.',NULL,NULL),(405,'cider','C2','Specialty Cider and Perry','C2C','Applewine','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 levels).',NULL,NULL),(406,'cider','C2','Specialty Cider and Perry','C2D','Ice Cider','Entrants MUST specify starting gravity, final gravity or residual sugar, and alcohol level. Entrants MUST specify carbonation level (3 levels).',NULL,NULL),(407,'cider','C2','Specialty Cider and Perry','C2E','Cider with Herbs/Spices','Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 categories). Entrants MUST specify all botanicals added. If hops are used, entrant must specify variety/varieties used.',NULL,NULL),(408,'cider','C2','Specialty Cider and Perry','C2F','Specialty Cider/Perry','Entrants MUST specify all ingredients. Entrants MUST specify carbonation level (3 levels). Entrants MUST specify sweetness (5 categories).',NULL,NULL);
/*!40000 ALTER TABLE `styles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-27  6:26:45
