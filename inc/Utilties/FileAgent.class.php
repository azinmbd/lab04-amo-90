<?php
class FileAgent {
    // method to read the csv file contents
    public static function readFile() :string  {
        try {
            $fh = fopen(CSV_FILE, 'r');
            $fileContents = fread($fh,filesize(CSV_FILE));
            fclose($fh);
        } catch (Exception $fe) {
            echo $fe->getMessage();
        }
        
        return $fileContents;
    }

// method to rewrite the modified people into the csv file
public static function writeFile($people) : string {
    $fileContents = '';

    try {
        $fh = fopen(CSV_FILE, 'w');
        
        $header = "email,firstname,lastname,gender,address,city,country\n";
        fwrite($fh, $header);

        foreach ($people as $person) {
            $personData = array(
                $person->getEmail(),
                $person->getFirstname(),
                $person->getLastname(),
                $person->getGender(),
                $person->getAddress(),
                $person->getCity(),
                $person->getCountry()
            );

            $personData = array_map('html_entity_decode', $personData);
            $personData = array_map('trim', $personData);

            if (!empty(array_filter($personData))) {
                foreach ($personData as $key => $value) {
                    if (strpos($value, ',') !== false) {
                        $personData[$key] = '"' . str_replace('"', '""', $value) . '"';
                    }
                }
    
                fwrite($fh, implode(',', $personData) . PHP_EOL);
            }
        }

        // Close the file handle
        fclose($fh);

    } catch (Exception $fe) {
        echo $fe->getMessage();
    }

    return $fileContents;
}


}
?>