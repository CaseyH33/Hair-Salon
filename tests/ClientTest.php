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

        function testSave()
        {
            $stylist_name = "Kevin";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();

            $name = "Stuart";
            $phone = "555-555-5555";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $phone, $stylist_id);
            $test_client->save();

            $result = Client::getAll();

            $this->assertEquals($test_client, $result[0]);
        }

        function testGetAll()
        {
            $name = "Bob";
            $phone = "555-555-5555";
            $stylist_id = 1;
            $test_client = new Client($name, $phone, $stylist_id);
            $test_client->save();

            $name2 = "Kevin";
            $phone2 = "444-444-4444";
            $test_client2 = new Client($name2, $phone2, $stylist_id);
            $test_client2->save();

            $result = Client::getAll();

            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function testDeleteAll()
        {
            $name = "Bob";
            $phone = "555-555-5555";
            $stylist_id = 1;
            $test_client = new Client($name, $phone, $stylist_id);
            $test_client->save();

            $name2 = "Kevin";
            $phone2 = "444-444-4444";
            $test_client2 = new Client($name2, $phone2, $stylist_id);
            $test_client2->save();

            Client::deleteAll();
            $result = Client::getAll();

            $this->assertEquals([], $result);
        }

    }
 ?>
