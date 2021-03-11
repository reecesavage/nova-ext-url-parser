<?php
namespace nova_ext_url_parser;


class Installer {



function __construct() {

  


    $this->ci =& get_instance();


   // $this->install();

  }

 public function install() {



    $this->ci->load->model('menu_model');


    $expectedLink = 'extensions/nova_ext_url_parser/Manage/index';
    $cat = $this->ci->menu_model->get_menu_category( 'manageext' );
   
    if ( $cat === false ) {
      // Add the category and the menu items
      $insertCat = $this->ci->menu_model->add_menu_category( [
        'menucat_menu_cat' => 'manageext',
        'menucat_name' => 'Manage Extensions',
        'menucat_type' => 'adminsub',
        'menucat_order' => 7
      ] );

      }


     $table= $this->ci->db->table_exists('tag');
     if(empty($table))
     {
       $this->ci->db->query("CREATE TABLE `nova_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` text DEFAULT NULL,
   `post_url` varchar(255) DEFAULT NULL,
  `is_new_tab` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
     }


      // Add item
  
     
      $query = $this->ci->db->get_where('menu_items', array('menu_name' => 'Url Parser'));
    $item = ($query->num_rows() > 0) ? $query->row() : false;   
      if($item==false){
      $insertItem = $this->ci->menu_model->add_menu_item( [
        'menu_name' => 'Url Parser',
        'menu_group' => 0,
        'menu_order' => 0,
        'menu_sim_type' => 1,
        'menu_link' => $expectedLink,
        'menu_link_type' => 'onsite',
        'menu_need_login' => 'none',
        'menu_use_access' => 'y',
        'menu_access' => 'site/settings',
        'menu_access_level' => 0,
        'menu_display' => 'y',
        'menu_type' => 'adminsub',
        'menu_cat' => 'manageext',
      ] );
    }
    
  }

}    