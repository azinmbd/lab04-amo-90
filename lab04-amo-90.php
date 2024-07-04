<?php

require_once("./inc/Config.inc.php");

require_once("./inc/Entities/Person.class.php");

require_once("./inc/Utilties/Page.class.php");
require_once("./inc/Utilties/FileAgent.class.php");
require_once("./inc/Utilties/Validation.class.php");
require_once("./inc/Entities/Book.class.php");

page::header();

// reading the csv file content
$fileContents = FileAgent::readFile();
// getting the people from the contetn
$peopleData = Book::readPeople($fileContents);
$people = $peopleData['p'];
$csvHeader = $peopleData['h'];

$totalPeople = count($people);

// index of current user
$index = isset($_POST['Index']) ? (int)$_POST['Index'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // notifications
    $errors = Validation::validate($_POST);
    $success = Validation::validateSuccess($_POST);
    
    // post requests
    if (isset($_POST['previous'])) {
        $index = ($index - 1 + $totalPeople) % $totalPeople;
    }
    
    if (isset($_POST['next'])) {
        $index = ($index + 1) % $totalPeople;
    }
    
    if (isset($_POST['save'])) {
        if (empty($errors)) {
            $people = Book::savePeople($_POST, $people);
            $fileContents = FileAgent::writeFile($people, $csvHeader);
            Page:: showSuccess($success);
        }else {
            Page:: showError($errors);
        }
    }

    if (isset($_POST['delete'])) {
        $people = Book::deletePerson($_POST, $people);
        $fileContents = FileAgent::writeFile($people, $csvHeader);
        Page:: showSuccess($success);
    }

}

Page::form($people[$index], $index);
?>