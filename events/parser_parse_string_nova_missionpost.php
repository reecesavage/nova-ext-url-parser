<?php 

$this->event->listen(['parser', 'parse_string', 'output', 'write', 'missionpost'], function($event){

   
   $post= $this->input->post('content');

 if(!empty($post))
  {

      
     $content =$postContent= $post;

    
     $i=0;
     $contentArray=[];
     while($i==0)
     {
       $text=substr($content, strpos($content, "[") + 1); 
      if(!empty($text))
     {
        $finalText=explode(']', $text);
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
                  $url= $model->url.$title;
                  $finalArray["[$value]"]="<a href=$url>$display</a>";
                }

               
            }
      }
     

      if(!empty($finalArray))
      {
        foreach ($finalArray as $key => $value) {

           $content= str_replace($key,$value,$post);
           $post=$content;
        }
 
          $event['output'] = str_replace($postContent,$content,$event['output']); 
      }

  }
});