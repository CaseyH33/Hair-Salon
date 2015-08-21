<?php

    class Client
    {
        private $name;
        private $phone;
        private $stylist_id;
        private $id;

        function __construct($name, $phone, $stylist_id, $id=null)
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->stylist_id = $stylist_id;
            $this->id= $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }


    }

?>
