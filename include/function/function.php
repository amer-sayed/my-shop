<?php

/*
 * get all items from any table
 */

function getAllFrom($tablename, $orderby = null, $where = null){

    global $con;

    if ($where == null){

        $sql = "";
    }else{

        $sql = $where;
    }

    $getALL = $con->prepare("SELECT * FROM $tablename $sql ORDER BY $orderby DESC");
    $getALL->execute();
    $all = $getALL->fetchAll();

    return $all;
}


/*
 * Get Records Function v1.0
 * Function TO Get Categoris From Database
 */

 function getcat()
 {
     global $con;

     $getCat = $con->prepare('SELECT * FROM categoris where parent = 0 ORDER BY ID ASC ');
     $getCat->execute();
     $cats = $getCat->fetchAll();

     return $cats;

 }

/*
* Get Records Function v1.0
* Function TO Get Items From Database
*/

function getitem($value, $where, $approve){

    global $con;

    if ($approve == 1){

        $sql = 'AND Approve = 1';
    }else {
        $sql = "";
    }

    $getItem = $con->prepare("SELECT * FROM items WHERE $where = ?  $sql ORDER BY item_ID DESC ");

    $getItem->execute(array($value));

    $items = $getItem->fetchAll();

    return $items;

}


function getTitle() {

    global $pagetitle;

    if(isset($pagetitle)){

        echo $pagetitle;
    }else {
        echo 'Default';
    }
}

    function checkUserStatus($user){

    global $con;

    $stmtS = $con->prepare("SELECT
                                      Username, RegStatus 
                                     FROM 
                                       users
                                     WHERE 
                                       Username = ?
                                     AND 
                                        RegStatus = 0
                                       ");

        $stmtS->execute(array($user));
        $status = $stmtS->rowCount();
        return $status;

}


function get_cat($value) 
 {
     global $con;

     $getCat = $con->prepare('SELECT * FROM categoris where ID = ?');
     $getCat->execute(array($value));
     $cats = $getCat->fetchAll();

     return $cats;

 }

 function tags_parent(){
    global $con;
    $parent = $con->prepare('SELECT * FROM categoris where ID = ?');
    $parent->execute(array($cat["parent"]));
    $parents = $parent->fetchAll();
    
    foreach ($parents as $Parent){
        echo $Parent["Name"];
        echo $Parent["parent"];
    
    }
    $p_arent = $Parent["Name"];

    return $p_arent;

 }

 function tags_childe(){
    global $con;
$getCat = $con->prepare('SELECT * FROM categoris where ID = ?');
$getCat->execute(array($c_no));
$cats = $getCat->fetchAll();

foreach ($cats as $cat){
    echo $cat["Name"];
    echo $cat["parent"];

}
return $cat;

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

 
