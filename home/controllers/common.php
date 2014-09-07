<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 12306 Common Class
 *
 * This class object is the Common Page class.
 *
 * @package		Wanghaoran
 * @author		Wanghaoran
 * @subpackage	Libraries
 * @category	Libraries
 * @since		Version 1.0
 */

class Common extends CI_Controller {

    /**
     * Register Page for Common controller.
     *
     * @access public
     */
    public function register()
    {
        $this -> load -> view('common/register');
    }

    /**
     * Check Register Method for Common controller.
     *
     * @access public
     */
    public function checkregister()
    {

        $this -> load -> model('user_model');
        if($this -> user_model -> insert_from_register()){
            $data = array(
                'title' => '恭喜您，注册成功！',
                'description' => '恭喜您已经成为会员，现在将跳转至会员登录页',
                'second' => 3,
                'url' => $this->config->base_url() . 'login',
            );
            $this -> load -> view('public/success_redirect', $data);
        }else{
            $data = array(
                'title' => '抱歉，注册失败',
                'description' => '请检查您提交的数据，稍后再试！',
                'second' => 2,
                'url' => $this->config->base_url() . 'register',
            );
            $this -> load -> view('public/error_redirect', $data);
        }
    }

    /**
     * Check Email Repeat for Common controller.
     *
     * @access public
     */
    public function checkemailrepeat()
    {
        $this -> load -> model('user_model');
        if($this -> user_model -> check_email_repeat()){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    /**
     * The terms of service Page for Common controller.
     *
     * @access public
     */
    public function serviceterms()
    {
        $this -> load -> view('common/serviceterms');
    }

    /**
     * Login Page for Common controller.
     *
     * @access public
     */
    public function login()
    {
        $this -> load -> view('common/login');
    }

    /**
     * Check Login for Common controller.
     *
     * @access public
     */
    public function checklogin()
    {
        $this -> load -> model('user_model');
        if($this -> user_model -> check_login_from_login()){
            $data = array(
                'title' => '恭喜您，登录成功！',
                'description' => '您已登录成功，现在跳转至会员中心首页',
                'second' => 3,
                'url' => $this->config->base_url() . 'member',
            );
            $this -> load -> view('public/success_redirect', $data);
        }else{
            $data = array(
                'title' => '抱歉，登录失败',
                'description' => '账号或密码错误，请您检查并重新输入',
                'second' => 2,
                'url' => $this->config->base_url() . 'login',
            );
            $this -> load -> view('public/error_redirect', $data);
        }
    }

    /**
     * Login Out for Common controller.
     *
     * @access public
     */
    public function logout()
    {
        $this->session->sess_destroy();
        $data = array(
            'title' => '退出成功！',
            'description' => '您已成功退出会员中心，现在将跳转至首页',
            'second' => 3,
            'url' => $this->config->base_url(),
        );
        $this -> load -> view('public/success_redirect', $data);
    }

    /**
     * Exec Reservation Query.
     *
     * @access public
     */
    public function get_reservation()
    {

        $result = array();

        $date = $this -> input -> post('date');
        $start_name = $this -> input -> post('start_name');
        $end_name = $this -> input -> post('end_name');
        $purpose = $this -> input -> post('purpose');

        /*
         *
         * https://kyfw.12306.cn/otn/leftTicket/queryT?leftTicketDTO.train_date=2014-09-08&leftTicketDTO.from_station=BJP&leftTicketDTO.to_station=CQW&purpose_codes=ADULT
         *
         */

        $url = 'https://kyfw.12306.cn/otn/leftTicket/queryT?leftTicketDTO.train_date=' . $date . '&leftTicketDTO.from_station=' . $start_name . '&leftTicketDTO.to_station=' . $end_name . '&purpose_codes=' . $purpose;
        $header = array(
            'Host: kyfw.12306.cn',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:31.0) Gecko/20100101 Firefox/31.0',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3',
            'Connection: keep-alive',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $output = curl_exec($ch);
        if(!$output){
            $result['state'] = 'error';
        }else{
            $result['state'] = 'success';
        }
        $json_arr = json_decode($output, true);
//        var_dump($json_arr);
        $result['data'] = $json_arr['data'];
        echo json_encode($result);
    }

    /**
     * Exec Left Tickets Query.
     *
     * @access public
     */
    public function get_lefttickets()
    {

        $result = array();

        $date = $this -> input -> post('date');
        $start_name = $this -> input -> post('start_name');
        $end_name = $this -> input -> post('end_name');
        $purpose = $this -> input -> post('purpose');

        $url = 'https://kyfw.12306.cn/otn/lcxxcx/query?purpose_codes=' . $purpose . '&queryDate=' . $date . '&from_station=' . $start_name . '&to_station=' . $end_name;

        $header = array(
            'Host: kyfw.12306.cn',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:31.0) Gecko/20100101 Firefox/31.0',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3',
            'Connection: keep-alive',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $output = curl_exec($ch);
        if(!$output){
            $result['state'] = 'error';
        }else{
            $result['state'] = 'success';
        }
        $json_arr = json_decode($output, true);
        $result['data'] = $json_arr['data'];
        echo json_encode($result);
    }

}

/* End of file common.php */
/* Location: ./home/controllers/common.php */