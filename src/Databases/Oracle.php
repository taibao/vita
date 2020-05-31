<?php

    namespace Vitas\Wef\Databases;


    class Oracle
    {
        private $type;

        public function __construct()
        {
            $this->type = 'oracle';
        }

        public function demo()
        {
            return 'oracle 操作的数据库 '.$this->type;
        }

    }