<?php 
  /**
   *  class for sesstion
   */
  class test_sesstion
  {

   public $test;
      
      function test_login()
      { 

        $var = $_SESSION['Username'];

        if (isset($var)){
            
          //echo  '<h1 class="text-center">'. $var .'</h1>'; 
           //echo  '<h1 class="text-center">welcome amer</h1>';  
           include 'init.php';
        
      }else {
         header('location: logout.php');
        //echo  '<h1 class="text-center">Errooooooooooooooooor</h1>'; 
      }
  }
}
  /**
     * 
     */
    class newInput
    {    

    function start($tag, $action){
      echo "<" . $tag . " " . $action . ">";
    }  

      function Charset($name, $value = "name")
      {
        echo "<input value='" . $value . "' " . "type='text' name='" . $name . "'" . " " . 'class = "form-control"' . "/>";
      }
            function password($name, $value = "passsword")
      {
        echo "<input value='" . $value . "' " . "type='password' name='" . $name . "'" . " " . 'class = "form-control"' . "/>";
      }

       function email($name, $value = "email")
      {
        echo "<input value='" . $value . "' " . "type='email' name='" . $name . "'" . " " . 'class = "form-control"' . "/>";
      }

      function end(){
        echo "<button type=\"submit \" value=\"save \" class=\"btn btn-primary\">Save</button>";
         echo "</form>";

      } 
  }  

