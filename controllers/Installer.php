<?php
namespace nova_ext_url_parser;


class Installer {



function __construct() {

  


    $this->ci =& get_instance();


   // $this->install();

  }

  

  public function urlparser($description=null)
  {
       if(!empty($description))
  {
     $content = $description;

     
     $i=0;
     $contentArray=[];
     while($i==0)
     {
       $text=substr($content, strpos($content, "[") + 1); 
      if(!empty($text))
     {
        $finalText=explode(']', $text,2); 
        if(isset($finalText[0]))
        {     
             $contentArray[]=$finalText[0]; 
              $content = isset($finalText[1])?$finalText[1]:'';
        }else {
           $i=1;
        }
        
     }else {
      $i=1;
     }
     }
    
      $finalArray=[];
      if(!empty($contentArray))
      {
            foreach($contentArray as $value)
            {
               $explode=explode('|', $value);
               $search= isset($explode[0])?$explode[0]:'';
               $title = isset($explode[1])?$explode[1]:'';
               $display = isset($explode[2])?$explode[2]:$title;
                  
                $query = $this->ci->db->get_where('tag', array('title' => $search));
                $model = ($query->num_rows() > 0) ? $query->row() : false;
                 if(!empty($model))
                {
                  if(empty($model->post_url))
                  {
                     $url= $model->url.$title;
                  }else {
                    
                       $url= $model->url.$title."/".$model->post_url;
                  }

                  if(empty($model->is_new_tab))
                  {
                    $finalArray["[$value]"]="<a href=$url>$display</a>";
                  }else {
                     $finalArray["[$value]"]="<a target='_blank' href=$url>$display</a>";
                  }
                  
                }

               
            }
      }

      if(!empty($finalArray))
      {
        foreach ($finalArray as $key => $value) {

           $content= str_replace($key,$value,$description);
           $description=$content;
        }

        return $content;
      }

  }

  return $description;
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
      $table= $this->ci->db->dbprefix.'tag';

       $this->ci->db->query("CREATE TABLE `$table` (
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
        'menu_name' => 'URL Parser',
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
