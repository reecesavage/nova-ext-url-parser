<?php 
  
$this->event->listen(['parser', 'parse_string', 'output', 'write', 'newsitem'], function($event){



 $manager =  new \nova_ext_url_parser\Installer();

      if(isset($event['data']['email_content']))
     {   
      $oldContent= $event['data']['email_content'];
          $event['data']['email_content'] = $manager->urlparser($event['data']['email_content']);

          $event['output'] = str_replace($oldContent,$event['data']['email_content'],$event['output']); 


     }
  
});