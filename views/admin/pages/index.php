<?php echo text_output($title, 'h1', 'page-head');?>
<p>
<?php echo anchor('extensions/nova_ext_url_parser/Manage/create', img($images['add']) .' '. 'Add Tag', array('class' => 'image'));?>
</p>


<?php if (!empty($models)): ?>
	  
	
	<table class="table100 zebra">
		<tbody>
		<?php foreach ($models as $model): ?>
			<tr class="alt"> 
				<td>
					<strong><?=$model->title?></strong><br />
					<span class="gray fontSmall">
						<strong><?=$model->url?></strong>
					</span>
				</td>
				<td class="col_75 align_right">
					<a href="#" myAction="delete" myID="<?php echo $model->id;?>" rel="facebox" class="image"><?php echo img($images['delete']);?></a>
					&nbsp;
					<?php echo anchor('extensions/nova_ext_url_parser/Manage/edit/'. $model->id, img($images['edit']), array('class' => 'image'));?>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
<?php else: ?>
	<?php echo text_output('No Tag found', 'h3', 'orange');?>
<?php endif;?>
