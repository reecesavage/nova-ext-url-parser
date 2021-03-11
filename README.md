# nova-ext-url-parser
Allows Nova to Parse tags that are translated into web links on the front end.



DROP TABLE IF EXISTS `nova_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nova_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `post_url` varchar(255) DEFAULT NULL,
  `is_new_tab` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

