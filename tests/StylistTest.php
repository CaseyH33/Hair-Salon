<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function testGetName()
        {
            $name = "Bob";
            $test_stylist = new Stylist($name);

            $result = $test_stylist->getName();

            $this->assertEquals($name, $result);
        }

        function testGetId()
        {
            $name = "Bob";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            $result = $test_stylist->getId();

            $this->assertEquals(true, is_numeric($result));
        }
    }
 ?>
