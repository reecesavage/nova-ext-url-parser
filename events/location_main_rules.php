<?php 


$this->event->listen(['location', 'view', 'data', 'main', 'main_rules'], function($event){

      $manager =  new \nova_ext_url_parser\Installer();
     
    
     if(isset($event['data']['message']))
     {
          $event['data']['message'] = $manager->urlparser($event['data']['message']);
     }


});

