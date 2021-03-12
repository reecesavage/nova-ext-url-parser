<?php 


$this->event->listen(['location', 'view', 'data', 'main', 'sim_missions_groups_all'], function($event){
    
       $manager =  new \nova_ext_url_parser\Installer();
   
      if(isset($event['data']['groups']))
     {
        foreach($event['data']['groups'] as $key =>$value)
        {
          $event['data']['groups'][$key]['desc'] = $manager->urlparser($value['desc']);
        }
     }
     
    
});

