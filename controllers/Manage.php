<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH . 'core/libraries/Nova_controller_admin.php';

class __extensions__nova_ext_url_parser__Manage extends Nova_controller_admin
{
    public function __construct()
    {
        parent::__construct();
     

        $this->ci = & get_instance();

        $this->ci->load->model('settings_model', 'settings');
        $this->_regions['nav_sub'] = Menu::build('adminsub', 'manageext');
        //$this->_regions['nav_sub'] = Menu::build('sub', 'sim');
        

        
    }






    public function index()
    {
          Auth::check_access('site/settings');
        $data['title'] = 'Manage Tags';
    


          

        if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
        {

             $id = $this->input->post('id', true);
         $id = (is_numeric($id)) ? $id : false;


         $query = $this->db->delete('tag', array('id' => $id));
        $this->dbutil->optimize_table('tag');
        $delete= $query;
        if ($delete > 0)
        {
                     
                        $message = sprintf(
                                    lang('flash_success'),
                                    'Tag',
                                    lang('actions_deleted'),
                                    ''
                                );


                        $flash['status'] = 'success';
                        $flash['message'] = text_output($message);

                        $this->_regions['flash_message'] = Location::view('flash', $this->skin, 'admin', $flash);
                    }
        }

        $data['images'] =
        ['add' => array(
                'src' => Location::img('icon-add.png', $this->skin, 'admin'),
                'alt' => ucfirst(lang('actions_add')),
                'title' => ucfirst(lang('actions_add')),
                'class' => 'image inline_img_left'),

        'delete' => array(
                'src' => Location::img('icon-delete.png', $this->skin, 'admin'),
                'alt' => lang('actions_delete'),
                'title' => ucfirst(lang('actions_delete')),
                'class' => 'image'),
        'edit' => array(
                'src' => Location::img('icon-edit.png', $this->skin, 'admin'),
                'alt' => lang('actions_edit'),
                'title' => ucfirst(lang('actions_edit')),
                'class' => 'image'),
       ]; 

        $this->db->from('tag');
        
        $query = $this->db->get();
        $data['models']= $query->result();
        
        $this->_regions['title'] .= 'Manage Tags';


         $this->_regions['javascript'] .= $this->extension['nova_ext_url_parser']->inline_js('custom', 'admin', $data);
        $this->_regions['content'] = $this->extension['nova_ext_url_parser']
            ->view('index', $this->skin, 'admin', $data);

        Template::assign($this->_regions);
        Template::render();
    }


   

     public function create()
     {
          Auth::check_access('site/settings');

            $data['title'] = 'Create Tag';


      if (isset($_POST['submit']) && $_POST['submit'] == 'Submit')
        {
            
            $dataArray['title']=$_POST['title'];
            $dataArray['url']=$_POST['url'];
            $insert = $this->db->insert('tag', $dataArray);
        
            $this->dbutil->optimize_table('tag');
            
        if($insert)
        {
              $message = sprintf(lang('flash_success') ,
            // TODO: i18n...
            'Question Added successfully', '', '');

            $flash['status'] = 'success';
            $flash['message'] = text_output($message);

            $this->_regions['flash_message'] = Location::view('flash', $this->skin, 'admin', $flash);
        }

            

        }

           $this->_regions['title'] .= 'Create Tag';

        

           $this->_regions['content'] = $this->extension['nova_ext_url_parser']
            ->view('create', $this->skin, 'admin', $data);

        Template::assign($this->_regions);
        Template::render();

    }



      public function edit()
    {
         Auth::check_access('site/settings');

            $data['title'] = 'Update Tag';

        $id = $this->uri->segment(5);


         
      if (isset($_POST['submit']) && $_POST['submit'] == 'Submit')
        {
           
            
                $dataArray['title']=$_POST['title'];
                $dataArray['url']=$_POST['url'];


                $this->db->where('id', $id);
        $query = $this->db->update('tag', $dataArray);
        
        $this->dbutil->optimize_table('tag');


       



             $message = sprintf(lang('flash_success') ,
            // TODO: i18n...
            'Tag Updated successfully', '', '');

            $flash['status'] = 'success';
            $flash['message'] = text_output($message);

            $this->_regions['flash_message'] = Location::view('flash', $this->skin, 'admin', $flash);

        }

         $query = $this->db->get_where('tag', array('id' => $id));
        $data['model'] = ($query->num_rows() > 0) ? $query->row() : false;

           $this->_regions['title'] .= 'Update Tag';


           $this->_regions['content'] = $this->extension['nova_ext_url_parser']
            ->view('update', $this->skin, 'admin', $data);

        Template::assign($this->_regions);
        Template::render();
    }


}