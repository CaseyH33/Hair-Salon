<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function testGetName()
        {
            $name = "Stuart";
            $phone = "555-555-5555";
            $stylist_id = 1;
            $test_client = new Client($name, $phone, $stylist_id);

            $result = $test_client->getName();

            $this->assertEquals($name, $result);
        }

        function testGetPhone()
        {
            $name = "Stuart";
            $phone = "555-555-5555";
            $stylist_id = 1;
            $test_client = new Client($name, $phone, $stylist_id);

            $result = $test_client->getPhone();

            $this->assertEquals($phone, $result);
        }

        function testGetStylistId()
        {
            $name = "Stuart";
            $phone = "555-555-5555";
            $stylist_id = 1;
            $test_client = new Client($name, $phone, $stylist_id);

            $result = $test_client->getStylistId();

            $this->assertEquals($stylist_id, $result);
        }

        function testId()
        {
            $name = "Stuart";
            $phone = "555-555-5555";
            $stylist_id = 1;
            $id = 1;
            $test_client = new Client($name, $phone, $stylist_id, $id);

            $result = $test_client->getId();

            $this->assertEquals($id, $result);
        }

    }
 ?>
