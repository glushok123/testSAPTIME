<?php

require_once 'config/config.php';

$action = $_POST["action"];
$db = getDbInstance();


if ($action=="getfilm"){
    $res = $db->query("SELECT film_id, title FROM film");
    $json = '[';
    foreach ($res as $film)
    {
        $json = $json.'{"id":"'.$film["film_id"].'","title":"'.$film["title"].'"},';
    }
    $json = substr($json,0,-1);
    $json = $json.']';
    echo $json;
}

if ($action=="getkatfilm"){
    $id = $_POST["id"];
    $category_id = $db->query("SELECT category_id FROM film_category WHERE film_id = $id");
    $category_name = $db->query("SELECT name FROM category WHERE category_id = ".$category_id[0]['category_id']." ");
    echo $category_name[0]['name'];
}

else if ($action=="getacterfilm"){
    $id = $_POST["id"];
    $actors_id = $db->query("SELECT actor_id FROM film_actor WHERE film_id = $id");

    $json = '[';
    foreach ($actors_id as $actor_id)
    {
        $actor = $db->query("SELECT first_name, last_name FROM actor WHERE actor_id = ".$actor_id['actor_id']." ");
        foreach ($actor as $actor_info)
        {
            $json = $json.'{"id":"'.$actor_id["actor_id"].'","title":"'.$actor_info["first_name"]." ".$actor_info["first_name"].'"},';
        }
    }
    $json = substr($json,0,-1);
    $json = $json.']';
    echo $json;
}

else if ($action=="deleteactor"){
    $ida = $_POST["ida"];
    $idf = $_POST["idf"];
    $db->query("DELETE FROM `film_actor` WHERE actor_id = $ida AND film_id = $idf");

    echo $json;
}

else if ($action=="addactors"){
    $idf = $_POST["idf"];
    $actors_id = $db->query("SELECT * FROM actor");

    $json = '[';
    foreach ($actors_id as $actor_id)
    {
        $json = $json.'{"id":"'.$actor_id["actor_id"].'","title":"'.$actor_id["first_name"]." ".$actor_id["first_name"].'"},';
    }
    $json = substr($json,0,-1);
    $json = $json.']';
    echo $json;
}

else if ($action=="addactorinfilm"){

    $ida = $_POST["ida"];
    $idf = $_POST["idf"];
    $db->query("INSERT INTO `film_actor`(`actor_id`, `film_id`) VALUES (".$ida.", ".$idf.")");

}

else if ($action=="colactor"){
    $id = $_POST["id"];
    $colactor = $db->query("SELECT count(*) FROM film_actor WHERE film_id = $id");
    print_r($colactor[0]['count(*)']);
}
