<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();
    $app['debug'] = true;
    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll(), 'form_check' => false));
    });

    $app->get("/show_stylist_form", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll(), 'form_check' => true));
    });

    $app->post("/add_stylist", function() use ($app) {
        $stylist = new Stylist($_POST['name']);
        $stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll(), 'form_check' => false));
    });

    $app->post("/delete_stylists", function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll(), 'form_check' => false));
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients(), 'form_check' => false));
    });

    $app->get("/show_client_form", function() use ($app) {
        $stylist = Stylist::find($_GET['stylist_id']);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients(), 'form_check' => true));
    });

    $app->post("/add_client", function() use ($app) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($name, $phone, $stylist_id);
        $client->save();

        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients(), 'form_check' => false));
    });

    $app->get("/clients/{id}", function($id) use ($app) {
        $client = Client::find($id);
        $stylists = Stylist::getAll();
        return $app['twig']->render('client.html.twig', array('client' => $client, 'form_check' => false, 'stylists' => $stylists));
    });

    $app->get("/client_update_form", function() use ($app) {
        $client = Client::find($_GET['client_id']);
        $stylists = Stylist::getAll();
        return $app['twig']->render('client.html.twig', array('client' => $client, 'form_check' => true, 'stylists' => $stylists));
    });

    $app->patch("/update_client", function() use ($app) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $stylist_id = $_POST['stylist_id'];
        $client_id = $_POST['client_id'];
        $stylists = Stylist::getAll();

        $client = Client::find($client_id);
        $client->update($name, $phone, $stylist_id, $client_id);

        return $app['twig']->render('client.html.twig', array('client' => $client, 'form_check' => false, 'stylists' => $stylists));
    });

    return $app;

?>
