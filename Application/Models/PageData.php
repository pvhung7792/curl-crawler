<?php
require_once '../Application/Core/Table.php';


class PageData extends Table
{
    private $table = "page_data_tb";

    public function store($data)
    {
        //Create array data to insert
        $arrayData = "'".$data['link']."','".$data['title']."','".$data['date']."','".$data['content']."')";
        $sql = 'INSERT INTO '.$this->table.' (link, title, date, content) VALUES('.$arrayData;

        //insert data to table
        if(!$this->dbConnect->query($sql))
        {
            echo "Unable to insert data!";
            exit();
        }

        return true;
    }
}

