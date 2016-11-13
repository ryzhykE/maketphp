<?php

namespace App;

class CSV
{
    use TSingleton;

    public function __construct($csv) {
        if (file_exists($csv)) {
            $this->csvFile = $csv;
        }
        else throw new \Exception("Файл \"$csv\" не найден");
    }

    public function setCSV( $csv) {
        $handle = fopen($this->csvFile, "a");

        foreach ($csv as $value) {
            fputcsv($handle, explode(";", $value), ";");
        }
        fclose($handle);
    }
}