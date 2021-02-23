<?php 

function preg_substr($start, $end, $str) // Regular expression      
{      
    // echo $start;
    $temp = preg_split($start, $str);    
    // var_dump($temp[1]);  
    $content = preg_split($end, $temp[1]);      
    // var_dump($content[0]);
    return $content[0];      

}    

function multi_preg_substr($start, $end, $str) // Regular expression      
{      
    $content = [];
    $temp = preg_split($start, $str);   
    // echo $str;
    // echo $start; 
    // echo $end;
    // echo count($temp);
    for($i =1; $i < count($temp); $i++){
        $content[] = strip_tags($temp[$i]);
        // echo strip_tags($temp[$i]);
    }
    // var_dump($content);
    return $content;      

}  
// --------------------------------------------- chua dung den
function str_substr($start, $end, $str) // string split       
{      

    $temp = explode($start, $str, 2);      
    $content = explode($end, $temp[1], 2);      

    return $content[0];      
}

function writelog($str)
{
  @unlink("log.txt");
  $open=fopen("log.txt","a" );
  fwrite($open,$str);
  fclose($open);
} 

//---------------------------------------------------------




    if($_POST['URL']){
        $ch = curl_init();//I have removed it from here
        curl_setopt($ch, CURLOPT_URL,$_POST['URL']);// This will do
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $str = curl_exec($ch);
        curl_close($ch);
        //---------------------example-------------------
        // $str = file_get_contents($_POST['URL']);
        // $str = mb_convert_encoding($str, "utf-8");
        // writelog($str);

        //regex for title
        $regexTitle = '/class="title-detail">/';

        //Get title
        $title = preg_substr($regexTitle,'</h1>',$str);
        echo $title;

        //get only article content
        $article = preg_substr('/class="fck_detail/',"/article>/",$str);

        //regex for content
        $startContentRegex = '/class="Normal">/';
        // $endContentRegex = '/'.'p'.'>/';
        $endContentRegex = '/</p>/';

        //get content
        $content = multi_preg_substr($startContentRegex,$endContentRegex,$article);
        foreach($content as $cont){
            echo $cont."<br><br>";
        }

        //regex for date
        $startDateRegex = '/class="date">/';
        $endDateRegex = '/span>/';

        //Get date
        $date = preg_substr($startDateRegex,$endDateRegex,$str);
        echo $date;

        // echo("Title: " . preg_substr($regexTitle,'<h1>',$str));
        // echo("Content: " . multi_preg_substr($regexContent,"</p>",$str));
        echo("<br>");
        $imgurl=str_substr('var imageSrc = “','”',$str);
        
        // echo '<img src=”'.getImage($imgurl,”,'img', array('jpg')).'"';  
    }

?>
