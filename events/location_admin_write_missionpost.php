<?php
 

$this->event->listen(['location', 'view', 'data', 'admin', 'write_missionpost'], function($event){


  $id = (is_numeric($this->uri->segment(3))) ? $this->uri->segment(3) : false;
  $post = $id ? $this->posts->get_post($id) : null;
  
  

   $manager =  new \nova_ext_url_parser\Installer();
   
     
    if(isset($event['data']['mission_notes']))
     {
        foreach($event['data']['mission_notes'] as $key =>$value)
        {
          $event['data']['mission_notes'][$key]['notes'] = $manager->urlparser($value['notes']);
        }
     }
  
  switch($this->uri->segment(4)){
   
  case 'view':

          if(!empty($post))
  {
     $content = $post->post_content;

    
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
                  
                $query = $this->db->get_where('tag', array('title' => $search));
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

           $content= str_replace($key,$value,$post->post_content);
           $post->post_content=$content;
        }

        $event['data']['inputs']['content']['value'] = $content;
      }

  }


  break;

  
  }
  
});