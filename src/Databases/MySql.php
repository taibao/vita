<?php

    namespace Vitas\Wef\Databases;


    class MySql
    {
        private $type;

        public function __construct()
        {
            $this->type = 'mysql';
        }

        public function demo()
        {
            return 'mysql 操作的数据库 '.$this->type;
        }

    }