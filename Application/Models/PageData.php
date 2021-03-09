<?php
namespace Models;
use Core\Model;
use Exception;
/**
 * Class PageData
 * Model to connect with page_data_tb table from database
 */

class PageData extends Model
{
    private $table = "page_data_tb";
    private $dB;

    public function connectDb()
    {
        $this->dB = self::getInstance();
    }

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

        $this->connectDb();
        //insert data to table

        return $this->dB->query($sql);
    }
}

