<?php

class Book {
    public static function readPeople($book) : array {
        // email,firstname,lastname,gender,address,city,country
        $people = [];
        $lines = explode("\n", $book);
    
        if (!empty($lines)) {
            //saving header
            $headerLine = $lines[0];
            $headers = explode(",", $headerLine);
            
            for ($i = 1; $i < count($lines); $i++) { 
                $cols = explode(",", $lines[$i]);
    
                if (count($cols) === count($headers)) {
                    try {
                        $person = new Person();
    
                        $person->setEmail(htmlentities(trim($cols[0])));
                        $person->setFirstname(htmlentities(trim($cols[1])));
                        $person->setLastname(htmlentities(trim($cols[2])));
                        $person->setGender(htmlentities(trim($cols[3])));
                        $person->setAddress(htmlentities(trim($cols[4])));
                        $person->setCity(htmlentities(trim($cols[5])));
                        $person->setCountry(htmlentities(trim($cols[6])));
    
                        $people[] = $person;
    
                    } catch (Exception $pe) {
                        Page::showError($pe->getMessage());
                    }
                } 
            }
        }
    
        return ['h' => $headers, 'p' => $people];
    }
    


    public static function deletePerson($_post, $people) {
        $modifiedPeople = array();
        $emailDeleted = false; 
        // Reoving the person from people array
        foreach ($people as $person) {
            if ($person->getEmail() === $_post['email']) {
                $emailDeleted = true;
                continue;
            }
            $modifiedPeople[] = $person;
        }
    
        return $modifiedPeople;
    }
    
    


    public static function savePeople($_post, $people) {
        $modifiedPeople = array();
        $emailModified = false; 
        // modifying the person's information
        foreach ($people as $person) {
            if ($person->getEmail() === $_post['email']) {
                $person->setEmail(trim($_post['email']));
                $person->setFirstname(trim($_post['firstname']));
                $person->setLastname(trim($_post['lastname']));
                $person->setGender(trim($_post['gender']));
                $person->setAddress(trim($_post['address']));
                $person->setCity(trim($_post['city']));
                $person->setCountry(trim($_post['country']));
                $emailModified = true; 
            }
            $modifiedPeople[] = $person;
        }
        
        // If email is modified, add the modified person as a new entry
        if (!$emailModified) {
            $newPerson = new Person(); 
            $newPerson->setEmail(trim($_post['email']));
            $newPerson->setFirstname(trim($_post['firstname']));
            $newPerson->setLastname(trim($_post['lastname']));
            $newPerson->setGender(trim($_post['gender']));
            $newPerson->setAddress(trim($_post['address']));
            $newPerson->setCity(trim($_post['city']));
            $newPerson->setCountry(trim($_post['country']));
            
            $modifiedPeople[] = $newPerson; 
        }
    
        return $modifiedPeople;
    }
    
    
    
}

?>