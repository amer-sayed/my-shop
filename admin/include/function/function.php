<?php

/*
**backgrond function
** In order to change the background color of the body
*/

function bodybak(){
    
    $color = '';
    global $background;
 if (isset($background)){
        $color = 'login';
        echo $color;
        
}else {
    $color = '';
    echo $color;
}}

/*
**Page title changed functiın
*/


function getTitle() {
    
    global $pagetitle;
    
    if(isset($pagetitle)){
    
        echo $pagetitle;        
   }else {
        echo 'Default';
    }
}

/*
** home redirect  function
** $theMsg = Echo The Message [ Error | Success | Warning]
** $url = The Link You Want To Redirect to
** $seconds = Seconds Befor Redirecting 
*/

function  redirect($theMsg,  $seconds = 5000, $url = null)
{

    $myurl = $url;
    $link = trim($myurl, ".php");
    $Time = $seconds / 1000;

    if ($url === "index.php"){
        $link = "Home";
    }

    if ($url === null){

        $url = "index.php";
        $link = "homepage";

    

    }elseif ($url == "back") {
        if (isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"] !== '') {
            
            $url =  $_SERVER["HTTP_REFERER"];
            $link = "Previous Page";

        }else {
            $url = "index.php";
            $link = "Home";
        }
    }elseif($url ==  $myurl) {

        $url = $myurl;
    }
    echo $theMsg;
    echo "<div class='alert alert-info myalert mx-auto col-md-6'>You Will Be Redirectde to $link page After $Time  Seconds.</div>";
    
    ?>
      <script>
      function sleep(ms) {
         return new Promise(resolve => setTimeout(resolve, ms));
        }
        async function get(){
         await sleep(<?=$seconds?>);
          window.location.href = "<?=$url?>";
        }
        console.log("amer");
        get();
      </script>
    <?php
}

/*                                     
**chek the items of the database
*/


function chekItems($select, $from, $value){

    global $con;

    $Stmt1 = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

    $Stmt1->execute(array($value));

    $count = $Stmt1->rowCount();

    return $count;
} 

/*
** count numder of items function 
** $item = the items to count 
** $table = the table to choose from
*/

function countItems($item, $table){
    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

    $stmt2->execute();

    return $stmt2->fetchColumn();                  
}