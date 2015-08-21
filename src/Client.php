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

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, phone, stylist_id) VALUES ('{$this->getName()}', '{$this->getPhone()}', {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients ORDER BY name;");
            $clients = array();
            foreach($returned_clients as $client)
            {
                $name = $client['name'];
                $phone = $client['phone'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($name, $phone, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }


    }

?>
