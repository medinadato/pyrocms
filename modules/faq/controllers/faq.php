<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * FAQ public controller
 * 
 * @author      Renato Medina
 * @link	http://blog.mdnsolutions.com
 * @package 	PyroCMS
 * @subpackage  FAQ Module
 * @category	module class
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 */
class Faq extends Public_Controller
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
        $this->load->model('faq_m');
        $this->lang->load('faq');

        $this->template
                ->set_breadcrumb(lang('breadcrumb_base_label'), '/')
                ->append_css('module::faq.css')
                ->append_js('module::faq_public.js');
    }

    public function _remap($method)
    {
        $this->index();
    }

    /**
     * index method
     *
     * @access public
     * @return void
     */
    public function index()
    {
        //get faq's
        $questions = $this->faq_m->get_all_faqs();

        $this->template
                ->set_breadcrumb(lang('faq_home_title'))
                ->set('questions', $questions)
                ->build('index');
    }

    public function view($slug = FALSE)
    {
        if (!$slug) {
            redirect('faq');
        } else {
            $faqs = $this->faq_m->published_faqs();

            $this->template
                    ->set_breadcrumb(lang('faq_home_title'), 'faq')
                    ->set_breadcrumb($col->title)
                    ->set('faqs', $faqs)
                    ->set('title', $col->title)
                    ->build('view', $this->data);
        }
    }

}

/* End of file controllers/faq.php */