<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Model Class
 *
 * This class object is the User Db model class.
 *
 * @package		Wanghaoran
 * @author		Wanghaoran
 * @table       12306_user
 * @subpackage	Libraries
 * @category	Libraries
 * @since		Version 1.0
 */

class User_model extends CI_Model {

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    /**
     * Check Email Repeat From Register Page.
     *
     * @access public
     */
    public function check_email_repeat()
    {
        $query = $this -> db -> get_where('user', array('account' => $this -> input -> post('email')));
        if($query -> row_array()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Insert Usre From Register Page.
     *
     * @access public
     */
    public function insert_from_register()
    {
        $this -> load -> helper('date');
        $data = array(
            'account' => $this -> input -> post('account'),
            'password' => md5($this -> input -> post('password')),
            'password_question' => $this -> input -> post('passwordQuestion'),
            'password_answer' => $this -> input -> post('passwordAnswer'),
            'register_time' => now(),
        );
        return $this -> db -> insert('user', $data);
    }

    /**
     * Check Login Stats From Login Page.
     *
     * @access public
     */
    public function check_login_from_login()
    {
        $where = array();
        $where['account'] = $this -> input -> post('account');
        $where['password'] = md5($this -> input -> post('password'));
        $query = $this -> db -> get_where('user', $where);
        if($result = $query -> row_array()){
            $this -> set_member_session($result['id']);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Set Member SESSION ID After Success Login
     *
     * @access private
     */
    private function set_member_session($mid){
        $this -> session -> set_userdata('UID', $mid);
    }

    /**
     * Get Member Info
     *
     * @access private
     */
    public function get_user_info($uid)
    {
        $query = $this -> db -> get_where('user', array('id' => $uid));
        return $query -> row_array();
    }

}

/* End of file User_model.php */
/* Location: ./home/models/User_model.php */