<?php 


$this->event->listen(['location', 'view', 'data', 'main', 'main_join_2'], function($event){

      $manager =  new \nova_ext_url_parser\Installer();
     
    
     if(isset($event['data']['msg']))
     {
          $event['data']['msg'] = $manager->urlparser($event['data']['msg']);
     }


});
