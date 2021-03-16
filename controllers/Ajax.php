<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Ajax controller
 *
 * @package		Nova
 * @category	Controller
 * @author		Anodyne Productions
 * @copyright	2013 Anodyne Productions
 */
class __extensions__nova_ext_url_parser__Ajax extends CI_Controller {
	
	/**
	 * Variable to store all the information about template regions
	 */
	protected $_regions = array();
	
	public function __construct()
	{
		parent::__construct();
		
		// load the resources
		$this->load->database();
		$this->load->library('session');

		
		// check to see if they are logged in
		Auth::is_logged_in();
		
		// set and load the language file needed
		$this->lang->load('app', $this->session->userdata('language'));
		
		// set the template file
		Template::$file = '_base/template_ajax';
		
		// set the module
		Template::$data['module'] = 'core';
		
		// set the default regions
		$this->_regions['content'] = false;
		$this->_regions['controls'] = false;
	}


	 public function del_tag()
    {
       
            
            
            $head = sprintf(
                lang('fbx_head'),
                ucwords(lang('actions_delete')),
                'Tag'
            );
            
            // data being sent to the facebox
            $data['header'] = $head;
             


            
            $data['id'] = $this->uri->segment(5, 0, true);
           
            
            $data['text'] = sprintf(
                lang('fbx_content_del_entry'),
                'Tag',                 
                ''
            );
            
           
            
            // input parameters
            $data['inputs'] = array(
                'submit' => array(
                    'type' => 'submit',
                    'class' => 'hud_button',
                    'name' => 'submit',
                    'value' => 'submit',
                    'content' => ucwords(lang('actions_submit')))
            );
            
           
            

            $this->_regions['content'] = Location::ajax('/../extensions/nova_ext_url_parser/views/admin/pages/del_tag', null, null, $data);
            $this->_regions['controls'] = form_button($data['inputs']['submit']).form_close();
            
            Template::assign($this->_regions);
            
            Template::render();
        
    }
}
