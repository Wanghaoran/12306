<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * News Model Class
 *
 * This class object is the News Db Model class.
 *
 * @package		Wanghaoran
 * @author		Wanghaoran
 * @table       12306_user
 * @subpackage	Libraries
 * @category	Libraries
 * @since		Version 1.0
 */

class News_model extends CI_Model {

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
     * Get All News
     *
     * @access public
     */
    public function get_all_news()
    {
        $query = $this -> db -> get('news');
        return $query -> result_array();
    }

    /**
     * Get A News
     *
     * @access public
     */
    public function get_new($id)
    {
        $query = $this -> db -> get_where('news', array('id' => $id), 1);
        return $query -> row_array();
    }


    /**
     * click_num Add
     *
     * @access private
     */
    public function click_num_add($id)
    {

        $query = $this -> db -> get_where('news', array('id' => $id), 1);
        $result = $query -> row_array();
        $data = array(
            'click_num' => $result['click_num'] + 1,
        );
        $this -> db -> where('id', $id);
        $this -> db -> update('news', $data);
    }

}

/* End of file News_model.php */
/* Location: ./home/models/News_model.php */