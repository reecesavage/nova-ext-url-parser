<?php echo text_output($title, 'h1', 'page-head');?>


<p>
<?php echo anchor('extensions/nova_ext_url_parser/Manage/index','« Back to Url Parser', array('class' => 'image'));?>
</p>

<?php echo form_open("extensions/nova_ext_url_parser/Manage/edit/$model->id");?>

	        <p>
				<kbd>Title</kbd>
				<input type="text" name="title" value="<?=$model->title?>" required >	
			</p>

			 <p>
				<kbd>URL</kbd>
				<input type="text" name="url" value="<?=$model->url?>"  required >	
			</p>

			<p>
				<kbd>Post URL</kbd>
				<input type="text" name="post_url" value="<?=$model->post_url?>">	
			</p>

			<p>
				<kbd>New Tab</kbd>
				<input type="checkbox" name="is_new_tab" <?=($model->is_new_tab==1)?'checked':''?> value="1">	
			</p>
           
				

             	<br>
			<button name="submit" type="submit" class="button-main" value="Submit"><span>Submit</span></button>

            
      
<?php echo form_close(); ?>







