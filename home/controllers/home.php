<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 12306 Home Class
 *
 * This class object is the Homepage class.
 *
 * @package		Wanghaoran
 * @author		Wanghaoran
 * @subpackage	Libraries
 * @category	Libraries
 * @since		Version 1.0
 */

class Home extends CI_Controller {

	/**
	 * Home Page for Index controller.
	 *
	 * @access public
	 */
	public function index()
	{
		$this->load->view('home/home');
	}

    /**
     * Reservation Page for Index controller.
     *
     * @access public
     */
    public function reservation()
    {
        $this -> load -> helper('date');
        $this->load->view('home/reservation');
    }

    /**
     * Left Tickets Query Page for Index controller.
     *
     * @access public
     */
    public function lefttickets()
    {
        $this -> load -> helper('date');
        $this->load->view('home/lefttickets');
    }

    /**
     * News Page for Index controller.
     *
     * @access public
     */
    public function newslist()
    {
        $this -> load -> model('news_model');
        $news_result = $this -> news_model -> get_all_news();
        $data = array(
            'list' => $news_result,
        );
        $this->load->view('home/newslist', $data);
    }

    /**
     * News Info Page for Index controller.
     *
     * @access public
     */
    public function news($id)
    {
        $this -> load -> model('news_model');
        $new_result = $this -> news_model -> get_new($id);
        $this -> news_model -> click_num_add($id);
        if(!$new_result){
            show_404();
        }
        $this->load->view('home/news', $new_result);
    }

    /**
     * Question Page for Index controller.
     *
     * @access public
     */
    public function question()
    {
        $this->load->view('home/question');
    }


}

/* End of file home.php */
/* Location: ./home/controllers/home.php */