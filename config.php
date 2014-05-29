<?php

class Config
{
    public $config = array();

    public function __construct()
    {
        $this->config = array(
            'key'      => '136d44191631c505c561330655c7c1b',
            'user_sign'    => '',
            'param'        => array(
                'group_id'           => '6310782',
                'status'             => 'upcoming',
                'sign'               => true,
                'country,city,state' => 'San+Francisco,CA',
            )
        );
    }

    public function getConfig()
    {
        return $this->config;
    }
}