<?php 

$this->event->listen(['location', 'view', 'data', 'admin', 'manage_missiongroups'], function($event){
      
    
     $manager =  new \nova_ext_url_parser\Installer();
   
    
     if(isset($event['data']['groups']))
     {
        foreach($event['data']['groups'] as $key =>$value)
        {
          $event['data']['groups'][$key]['desc'] = $manager->urlparser($value['desc']);
        }
     }

     
    
});
