<?php 
require_once './Utility/Basetable/Table.php';


class page_data_tb extends Table 
{
    protected $table = "page_data_tb";

    public function store($data)
    {
        $arrayData = "'".$data['link']."','".$data['title']."','".$data['date']."','".$data['content']."')";
        $sql = 'INSERT INTO '.$this->table.' (link, title, date, content) VALUES('.$arrayData;
        if($this->dbConnect->query($sql)==false)
        {
            echo "Unable to insert data!";
            exit();
        }
    }
}

?>