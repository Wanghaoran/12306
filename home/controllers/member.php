<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 12306 Member Class
 *
 * This class object is the Member Page class.
 *
 * @package		Wanghaoran
 * @author		Wanghaoran
 * @subpackage	Libraries
 * @category	Libraries
 * @since		Version 1.0
 */
class Member extends CI_Controller {

    /**
     * Reote Function for Member controller.
     *
     * Use : Check session
     *
     * @access public
     */
    public function _remap($method, $params = array())
    {

        if($this -> session -> userdata('UID')){
            return call_user_func_array(array($this, $method), $params);
        }else{
            $this -> load -> helper('url');
            redirect($this -> config -> base_url() . 'login');
        }
    }

    public function index()
    {
        $this -> load -> model('user_model');
        $this -> load -> helper('date');
        $user_result = $this -> user_model -> get_user_info($this -> session -> userdata('UID'));
        $data = array();
        $data['user'] = $user_result;
        $this->load->view('member/index', $data);
    }
}

/* End of file member.php */
/* Location: ./home/controllers/member.php */