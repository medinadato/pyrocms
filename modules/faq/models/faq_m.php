<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * FAQ model
 * 
 * @author      Renato Medina
 * @link	http://blog.mdnsolutions.com
 * @package 	PyroCMS
 * @subpackage  FAQ Module
 * @category	module class
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 */
class Faq_m extends MY_Model
{

    /**
     * Constructor method
     *
     * @access public
     * @return void
     */
    function __construct()
    {
        parent::__construct();
    }

    public function create_faq($data)
    {
        return $this->insert($data, TRUE);
    }

    public function get_all_faqs()
    {
        return $this->order_by("{$this->_table}.order", 'ASC')
                        ->get_all();
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function published_faqs($id = false)
    {
        $this->db->where('published', 'yes');
        return $this->order_by("{$this->_table}.order", 'ASC');
//                        ->get_many_by('category_id', $id);
    }

    public function update_order($id, $order)
    {
        return $this->update($id, array("{$this->_table}.order" => $order), TRUE);
    }

}

/* End of file faq_m.php */
/* Location: ./addons/modules/faq/models/faq_m.php */