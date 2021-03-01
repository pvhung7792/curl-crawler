<?php

require_once '../Application/Core/Model.php';

/**
 * Class PageData
 * Model to connect with page_data_tb table from database
 */

class PageData extends Model
{
    private $table = "page_data_tb";

    /**
     * @param array $data
     * @return bool
     *
     * Create query to insert in to page_data_tb table
     */

    public function store($data)
    {
        //Create array data to insert
        $arrayData = "'".$data['link']."','".$data['title']."','".$data['date']."','".$data['content']."')";
        $sql = 'INSERT INTO '.$this->table.' (link, title, date, content) VALUES('.$arrayData;

        $dB = self::getInstance();
        //insert data to table
        if(!$dB->query($sql))
        {
            echo "Unable to insert data!";
            exit();
        }
        return true;
    }
}

