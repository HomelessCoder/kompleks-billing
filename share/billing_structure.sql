-- MySQL dump 10.13  Distrib 5.7.42, for Linux (x86_64)
--
-- Host: 192.168.71.2    Database: billing
-- ------------------------------------------------------
-- Server version	5.0.67-log

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `vgroups`
--

DROP TABLE IF EXISTS `vgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vgroups` (
  `vg_id` int(11) NOT NULL auto_increment,
  `c_limit` bigint(20) NOT NULL default '0',
  `d_limit` bigint(20) NOT NULL default '0',
  `d_clear` date default NULL,
  `login` varchar(63) default NULL,
  `pass` varchar(128) default NULL,
  `status` int(11) default NULL,
  `blk_req` int(11) default '0',
  `blocked` int(11) default '0',
  `descr` text,
  `balance` double default '0',
  `tar_id` int(11) default NULL,
  `id` int(11) default NULL,
  `modified` int(11) default '0',
  `b_limit` int(11) default NULL,
  `b_check` int(11) default '0',
  `b_notify` int(11) default NULL,
  `off_time` datetime default NULL,
  `bill_active` double default '0',
  `acc_on` tinyint(4) default '0',
  `acc_ondate` datetime default '0000-00-00 00:00:00',
  `acc_offdate` datetime default '0000-00-00 00:00:00',
  `traff_type` int(11) default '3',
  `depth` double default '0',
  `allownoip` int(11) default '0',
  `tel_pin` varchar(32) default NULL,
  `changed` int(11) default '0',
  `shape` int(11) default '0',
  `use_aon` int(1) default '0',
  `zc_table` int(11) default '0',
  `zc_record_id` int(11) default '0',
  `zc_balance` double default '0',
  `zc_type` int(11) default '0',
  `prev_c_limit` bigint(40) default '0',
  `acc_onplandate` date default NULL,
  `comments` varchar(250) NOT NULL default '',
  `wrong_active` tinyint(3) NOT NULL default '0',
  `wrong_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `operator` tinyint(1) default '0',
  `use_as` tinyint(1) default '0',
  `max_sessions` int(11) default '1',
  `archive` tinyint(4) default '0',
  `oper_code` varchar(64) default NULL,
  `vat_free` tinyint(4) default '0',
  `ignore_user_block` tinyint(4) default '0',
  `kod_1c` varchar(10) default NULL,
  `cu_id` int(11) default NULL,
  PRIMARY KEY  (`vg_id`),
  UNIQUE KEY `ulogin` (`id`,`login`),
  KEY `id` (`id`),
  KEY `tar_id` (`tar_id`),
  KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=5987 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `acc_list`
--

DROP TABLE IF EXISTS `acc_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_list` (
  `uid` int(11) NOT NULL default '0',
  `vg_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`vg_id`),
  UNIQUE KEY `uid` (`uid`,`vg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `uid` int(11) NOT NULL auto_increment,
  `login` varchar(32) default NULL,
  `pass` varchar(32) default NULL,
  `ipaccess` tinyint(1) default '0',
  `type` int(3) default '1',
  `balance` double NOT NULL default '0',
  `depth` double default '0',
  `descr` text,
  `name` varchar(255) default NULL,
  `phone` varchar(32) default NULL,
  `fax` varchar(32) default NULL,
  `agrm_num` varchar(64) default NULL,
  `agrm_date` varchar(64) default NULL,
  `email` varchar(128) default NULL,
  `kod_1c` varchar(10) default NULL,
  `bill_delivery` tinyint(4) default '1',
  `category` tinyint(4) default '2',
  `bank_name` varchar(100) default NULL,
  `branch_bank_name` varchar(100) default NULL,
  `treasury_name` varchar(100) default NULL,
  `treasury_account` varchar(100) default NULL,
  `bik` varchar(64) default NULL,
  `settl` varchar(64) default NULL,
  `corr` varchar(64) default NULL,
  `kpp` varchar(32) default NULL,
  `inn` varchar(40) default NULL,
  `ogrn` varchar(30) default NULL,
  `okpo` varchar(30) default NULL,
  `okved` varchar(30) default NULL,
  `gen_dir_u` char(100) default NULL,
  `gl_buhg_u` varchar(100) default NULL,
  `kont_person` varchar(100) default NULL,
  `act_on_what` varchar(100) default NULL,
  `fa_index` varchar(7) default NULL,
  `country` varchar(64) default NULL,
  `city` varchar(64) default NULL,
  `street` varchar(64) default NULL,
  `bnum` varchar(10) default NULL,
  `bknum` varchar(10) default NULL,
  `apart` varchar(10) default NULL,
  `addr` varchar(128) default NULL,
  `region` varchar(64) default NULL,
  `district` varchar(64) default NULL,
  `settle_area` varchar(64) default NULL,
  `yu_index` varchar(7) default NULL,
  `country_u` varchar(64) default NULL,
  `city_u` varchar(64) default NULL,
  `street_u` varchar(64) default NULL,
  `bnum_u` varchar(10) default NULL,
  `bknum_u` varchar(10) default NULL,
  `apart_u` varchar(10) default NULL,
  `addr_u` varchar(128) default NULL,
  `region_u` varchar(64) default NULL,
  `district_u` varchar(64) default NULL,
  `settle_area_u` varchar(64) default NULL,
  `b_index` varchar(7) default NULL,
  `country_b` varchar(64) default NULL,
  `city_b` varchar(64) default NULL,
  `region_b` varchar(64) default NULL,
  `district_b` varchar(64) default NULL,
  `settle_area_b` varchar(64) default NULL,
  `street_b` varchar(64) default NULL,
  `bnum_b` varchar(10) default NULL,
  `bknum_b` varchar(10) default NULL,
  `apart_b` varchar(10) default NULL,
  `addr_b` varchar(128) default NULL,
  `pass_sernum` varchar(20) default NULL,
  `pass_no` varchar(30) default NULL,
  `pass_issuedate` varchar(20) default NULL,
  `pass_issuedep` varchar(200) default NULL,
  `pass_issueplace` varchar(240) default NULL,
  `birthdate` varchar(20) default NULL,
  `birthplace` varchar(240) default NULL,
  `last_mod_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `wrong_active` tinyint(4) NOT NULL default '0',
  `wrong_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `diplomat` tinyint(4) NOT NULL default '2',
  `resident` tinyint(4) NOT NULL default '1',
  `agrm_type` tinyint(4) NOT NULL default '1',
  `oksm` int(11) NOT NULL default '643',
  `okato` varchar(32) NOT NULL default '0',
  `public_agree` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4368 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agreements_list`
--

DROP TABLE IF EXISTS `agreements_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agreements_list` (
  `uid` int(11) NOT NULL default '0',
  `operator` int(5) NOT NULL default '0',
  `number` varchar(64) default NULL,
  `date` date default NULL,
  PRIMARY KEY  (`uid`,`operator`),
  KEY `uid` (`uid`),
  KEY `operator` (`operator`),
  KEY `number` (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) default NULL,
  `type` int(11) default '0',
  `mapfile` varchar(32) default NULL,
  `licdev` varchar(8) NOT NULL default '',
  `flush` int(11) default '600',
  `timer` int(11) default '30',
  `descr` text,
  `nfport` int(11) default '0',
  `na_ip` varchar(20) default NULL,
  `lastcontact` datetime NOT NULL default '0000-00-00 00:00:00',
  `grmodified` int(11) default '0',
  `hour` datetime default NULL,
  `tproxy` int(11) default '0',
  `adm_notify` int(11) default '0',
  `rlogverb` int(11) default '0',
  `raccport` int(11) default '0',
  `rauthport` int(11) default '0',
  `na_db` varchar(32) default 'billing',
  `na_username` varchar(32) default 'billinguser',
  `na_pass` varchar(32) default 'billingpassword',
  `lbctcd_parity` int(11) default '2',
  `tel_ats` int(11) default '1',
  `lbctcd_com_speed` int(11) default '1',
  `lbctcd_stop_bits` int(11) default '1',
  `lbctcd_num_data_bits` int(11) default '1',
  `lbctcd_com_name` varchar(32) NOT NULL default '',
  `lbctcd_data_file` varchar(255) NOT NULL default '',
  `lbctcd_cr_data_file` varchar(255) NOT NULL default '',
  `remulate` tinyint(4) default '0',
  `remulate_on_naid` int(11) default '0',
  `cdr_file_path` varchar(255) NOT NULL default '',
  `conference_file_path` varchar(255) default NULL,
  `create_cdr_file_hh` int(11) default '0',
  `create_cdr_file_mm` int(11) default '0',
  `create_conf_file_hh` int(11) default '0',
  `create_conf_file_mm` int(11) default '0',
  `prefix_1` char(64) NOT NULL default '',
  `prefix_2` char(64) NOT NULL default '',
  `prefix_3` char(64) NOT NULL default '',
  `prefix_4` char(64) NOT NULL default '',
  `prev_month` tinyint(4) NOT NULL default '0',
  `raddrpool` tinyint(1) NOT NULL default '0',
  `ignorelocal` tinyint(1) NOT NULL default '0',
  `eapcertpassword` varchar(255) NOT NULL default '',
  `service_name` varchar(255) default 'Услуга доступа в интернет',
  `session_lifetime` int(11) NOT NULL default '86400',
  `session_losttime` int(11) NOT NULL default '-1',
  `radius_auth` int(11) default '127',
  `eapcertdir` varchar(200) default NULL,
  `p_eapcertdir` varchar(200) default NULL,
  `p_eapcertpassword` varchar(25) default NULL,
  `check_user_cert` tinyint(4) default '0',
  `use_mppe` tinyint(2) default '2',
  `recalc_date` date default NULL,
  `recalc_act` tinyint(4) default '0',
  `save_stat_addr` tinyint(1) default '0',
  `local_as_num` int(11) default '0',
  `acc_only` tinyint(1) default '0',
  `compatible` tinyint(1) default '1',
  `ivox_depth` int(11) default '35',
  `max_radius_timeout` int(11) NOT NULL default '86400',
  `tel_direction_mode` tinyint(4) default '0',
  `heap_tarifs` tinyint(4) NOT NULL default '0',
  `rad_stop_expired` tinyint(4) NOT NULL default '0',
  `failed_calls` tinyint(4) NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usergroups`
--

DROP TABLE IF EXISTS `usergroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroups` (
  `group_id` int(11) NOT NULL auto_increment,
  `description` text,
  `name` varchar(64) default NULL,
  `fiz_kvit` tinyint(1) default '0',
  `promise_allow` tinyint(1) NOT NULL default '0',
  `promise_max` double NOT NULL default '0',
  `promise_min` double NOT NULL default '0',
  `promise_rent` tinyint(1) NOT NULL default '0',
  `promise_till` int(3) NOT NULL default '30',
  `promise_limit` double NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usergroups_staff`
--

DROP TABLE IF EXISTS `usergroups_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroups_staff` (
  `group_id` int(11) default '0',
  `uid` int(11) default '0',
  UNIQUE KEY `group_id` (`group_id`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifs` (
  `tar_id` int(11) NOT NULL auto_increment,
  `includes` int(11) NOT NULL default '0',
  `above` int(11) NOT NULL default '0',
  `rent` int(11) NOT NULL default '0',
  `block_rent` int(11) NOT NULL default '0',
  `descr` varchar(255) default NULL,
  `rent_mode` int(1) NOT NULL default '0',
  `type` int(2) NOT NULL default '0',
  `use_includes` int(11) NOT NULL default '1',
  `free_seconds` int(11) NOT NULL default '0',
  `conf_above` int(11) NOT NULL default '0',
  `call_mode` int(11) NOT NULL default '0',
  `act_block` int(11) NOT NULL default '2',
  `round_seconds` int(11) NOT NULL default '0',
  `cat_number` int(11) NOT NULL default '0',
  `incoming_cost` int(11) NOT NULL default '0',
  `redirect_cost` int(11) NOT NULL default '0',
  `ivr_charge` int(11) NOT NULL default '0',
  `voicemail_charge` int(11) NOT NULL default '0',
  `opcall_charge` int(11) NOT NULL default '0',
  `cat_number_ivox` int(11) NOT NULL default '0',
  `cat_number_incoming` int(11) NOT NULL default '0',
  `emptycall_charge` int(11) NOT NULL default '0',
  `local_round_seconds` int(11) default NULL,
  `local_free_seconds` int(11) default NULL,
  `shape` int(11) NOT NULL default '0',
  `archive` tinyint(4) default '0',
  `cat_number_ivox_per` int(11) NOT NULL default '0',
  `price_plan` tinyint(4) default '0',
  `voip_block_local` tinyint(4) default '0',
  `dyn_route` tinyint(4) NOT NULL default '0',
  `reverse_incoming` tinyint(4) NOT NULL default '0',
  `unavaliable` tinyint(1) NOT NULL default '0',
  `traff_limit` int(11) NOT NULL default '0',
  `traff_limit_per` int(11) NOT NULL default '0',
  `rent_multiply` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`tar_id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=1377 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bills` (
  `record_id` int(10) unsigned NOT NULL auto_increment,
  `vg_id` int(10) unsigned default NULL,
  `pay_date` datetime NOT NULL,
  `sum` double default NULL,
  `bill_num` char(32) default NULL,
  `mod_person` int(11) default '0',
  `bill_descr` varchar(200) default NULL,
  `is_order` tinyint(4) NOT NULL default '0',
  `order_id` int(11) default NULL,
  `remote_date` datetime default NULL,
  `cancel_date` datetime default NULL,
  `status` tinyint(4) NOT NULL default '0',
  `receipt` varchar(36) default NULL,
  PRIMARY KEY  (`record_id`),
  UNIQUE KEY `mod_person` (`mod_person`,`receipt`),
  KEY `order_id` (`order_id`),
  KEY `remote_date` (`remote_date`),
  KEY `receipt` (`receipt`),
  KEY `pay_date` (`pay_date`)
) ENGINE=MyISAM AUTO_INCREMENT=117956 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-10 21:50:28
