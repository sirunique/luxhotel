<?php
 $table = array("Alayande"=>"Femi", "micheal"=>"fisayo", "oyetoro"=>"kazeem");
 print_r($table);
echo" <br/> <br/><br/>";
 $username = array_keys($table);
 print_r($username);

 echo" <br/> <br/><br/>";
 $password = array_values($table);
 print_r($password);

 echo" <br/> <br/><br/>";
   echo $username[0] . $password[0];

   echo" <br/> <br/><br/>";
   foreach ($table as $key => $value) {
       echo $key. "and". $value ."</br>";
   }

   echo" <br/> <br/><br/>";
   while($details = each($table))
   {
       $username = $details['key'];
       $password = $details['value'];
       echo $username ."and". $password."</br>";
    }

    echo" <br/> <br/><br/> Explode <br>";
    $str = "a:b:c:d";
    echo $str ."<br>";
    $explode = explode(':',$str);
    foreach ($explode as $variable) {
        echo $variable;
    }

    echo" <br/> <br/><br/> Implode <br>";
    echo implode(',',$explode);

?>