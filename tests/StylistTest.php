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

        function testSave()
        {
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $result = Stylist::getAll();

            $this->assertEquals($test_stylist, $result[0]);
        }

        function testGetAll()
        {
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $name2 = "Kevin";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            $result = Stylist::getAll();

            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function testDeleteAll()
        {
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $name2 = "Kevin";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            Stylist::deleteAll();
            $result = Stylist::getAll();

            $this->assertEquals([], $result);
        }

        function testFind()
        {
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $name2 = "Kevin";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            $result = Stylist::find($test_stylist->getId());

            $this->assertEquals($test_stylist, $result);
        }

        function testUpdate()
        {
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $new_name = "Stuart";

            $test_stylist->update($new_name);

            $this->assertEquals("Stuart", $test_stylist->getName());
        }

        function testDelete()
        {
            $name = "Bob";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $name2 = "Kevin";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            $test_stylist->delete();

            $this->assertEquals([$test_stylist2], Stylist::getAll());
        }
    }
 ?>
