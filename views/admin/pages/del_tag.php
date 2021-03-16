<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php echo text_output($header, 'h2');?>

<?php echo text_output($text);?>

<?php echo form_open('extensions/nova_ext_url_parser/Manage/index/delete/'. $id);?>
	<?php echo form_hidden('id', $id);?>