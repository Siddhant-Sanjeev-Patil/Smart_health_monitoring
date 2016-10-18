
<?php
//start php tag
//include connect.php page for database connection
Include('connect.php');
//if submit is not blanked i.e. it is clicked.
if (isset($_REQUEST['SUBMIT_MESSAGE'])) // name of the button 
{
// checking the submitted text box for null value by giving there name.
  if($_REQUEST['p_title']=="" || $_REQUEST['blog_post']=="")
  {
        echo " <br><br><br<br><br><br>All the fields must be filled";
  }



  else
  {
      
      $post_title=$_POST['p_title'];
      $blog_post=$_POST['blog_post'];
      
      $sql = "INSERT INTO blog_posts (blog_title,posts) VALUES ('$post_title','$blog_post')";
      $insert = $mysqli->query($sql);
  
       // Print response from MySQL
        if ( $insert ) 
        {
            echo "<br><br><br><br<br><br>CONGRATULATIONS ! YOUR POST WOULD BE VISIBLE SOON . ";
            

        } 
        else 
        {
            die("Error: {$mysqli->errno} : {$mysqli->error}");
        }
  
  // Close our connection
  $mysqli->close();
  }

  header ("LOCATION:blog.php");


} 
?>