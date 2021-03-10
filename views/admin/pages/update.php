<?php echo text_output($title, 'h1', 'page-head');?>


<p>
<?php echo anchor('extensions/nova_ext_url_parser/Manage/index','« Back to Nova Url Parser', array('class' => 'image'));?>
</p>

<?php echo form_open("extensions/nova_ext_url_parser/Manage/edit/$model->id");?>

	        <p>
				<kbd>Title</kbd>
				<input type="text" name="title" value="<?=$model->title?>" required >	
			</p>

			 <p>
				<kbd>Url</kbd>
				<input type="text" name="url" value="<?=$model->url?>"  required >	
			</p>
           
				

             	<br>
			<button name="submit" type="submit" class="button-main" value="Submit"><span>Submit</span></button>

            
      
<?php echo form_close(); ?>







