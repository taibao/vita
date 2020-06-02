<?php

    namespace Vitas\Wef\Databases;
    USE Vitas\Wef\Contracts\Databases\DB;

    class Oracle implements DB
    {
        private $type;

        public function __construct()
        {
            $this->type = 'oracle';
        }

        public function demo($t=0)
        {
            return 'oracle 操作的数据库 '.$this->type.":".$t;
        }

    }