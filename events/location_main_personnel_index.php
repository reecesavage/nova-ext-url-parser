<?php 


$this->event->listen(['location', 'view', 'data', 'main', 'personnel_index'], function($event){

   

     $manager =  new \nova_ext_url_parser\Installer();
     
    
     if(isset($event['data']['manifest_header']))
     {
          $event['data']['manifest_header'] = $manager->urlparser($event['data']['manifest_header']);
     }

});

