<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * FAQ details file
 * 
 * @author      Renato Medina
 * @link	http://blog.mdnsolutions.com
 * @package 	PyroCMS
 * @subpackage  FAQ Module
 * @category	module class
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 */
class Module_Faq extends Module
{

    /**
     *
     * @var string 
     */
    public $version = '1.0.0';

    /**
     * 
     * @return array 
     */
    public function info()
    {
        return array(
            'name' => array(
                'en' => 'FAQ'
            ),
            'description' => array(
                'en' => 'Manage frequently asked questions.'
            ),
            'frontend' => TRUE,
            'backend' => TRUE,
            'menu' => 'content',
            'author' => 'Renato Medina',
            'sections' => array(
                'faqs' => array(
                    'name' => 'faq_questions_title',
                    'uri' => 'admin/faq',
                    'shortcuts' => array(
                        array(
                            'name' => 'faq_create_title',
                            'uri' => 'admin/faq/create',
                            'class' => 'add'
                        ),
                    ),
                ),
            ),
        );
    }

    /**
     * 
     * @return boolean
     */
    public function install()
    {

        $this->dbforge->drop_table('faqs');

        $tbl_faqs = $this->db->dbprefix('faqs');

        $faqs = "
			CREATE TABLE `{$tbl_faqs}` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `question` varchar(255) DEFAULT NULL,
			  `answer` text DEFAULT NULL,
			  `published` enum('yes', 'no'),
			  `order` int DEFAULT '0',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
		";

        return $this->db->query($faqs);
    }

    /**
     * 
     * @return boolean
     */
    public function uninstall()
    {
        return $this->dbforge->drop_table('faqs');
    }

    /**
     * 
     * @param type $old_version
     * @return boolean
     */
    public function upgrade($old_version)
    {
        // Your Upgrade Logic
        return true;
    }

    public function help()
    {
        // Return a string containing help info
        // You could include a file and return it here.
        return "Some Help Stuff";
    }

}

/* End of file details.php */