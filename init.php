<?php 

$this->require_extension('jquery');

require_once dirname(__FILE__) . '/controllers/Installer.php';
$manager = ( new \nova_ext_url_parser\Installer() )->install();


require_once dirname(__FILE__).'/events/location_main_index.php';
require_once dirname(__FILE__).'/events/location_main_news.php';
require_once dirname(__FILE__).'/events/location_main_contact.php';
require_once dirname(__FILE__).'/events/location_main_credits.php';
require_once dirname(__FILE__).'/events/location_main_join.php';
require_once dirname(__FILE__).'/events/location_main_join2.php';
require_once dirname(__FILE__).'/events/location_main_sim_viewpost.php';
require_once dirname(__FILE__).'/events/location_admin_write_missionpost.php';
require_once dirname(__FILE__).'/events/parser_parse_string_nova_missionpost.php';
