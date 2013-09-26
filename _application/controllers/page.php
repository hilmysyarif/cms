<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
    public function view($pagename="home.html")
    {
        
        // html heading configuration file are stored in html extension 
        // with json format
        
        $filename = "./_application/views/config/" . $pagename;
         
        if(file_exists($filename)){
            
            $file = file_get_contents($filename);    
            
        }else{
            
            // load 404 configuration
            $filename = "./_application/views/config/404.html";
            $file = file_get_contents($filename);
            $pagename = "404.html";
            
        }
        
        $data = array();
        $data = (array) json_decode($file,true);
        $data['pagename'] = $pagename;
        
        $this->load->library('navigation');
        
        $data['nav']= $this->navigation->load();
        
        $this->load->view("html_head",$data);
        $this->load->view("content_head.php",$data);
        $this->load->view("templates/$pagename",$data);
        $this->load->view("footer",$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */