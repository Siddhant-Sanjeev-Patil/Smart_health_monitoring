

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Health Monitoring</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style type="text/css">

  	.jumbotron {
      /*margin-bottom: 30px; */
      
      /*margin-top: 50px;*/
      color: black;
      background: url("smart_health_pics/pics/maxresdefault.jpg") no-repeat center center; 
     -webkit-background-size: 100% 100%;
     -moz-background-size: 100% 100%;
     -o-background-size: 100% 100%;
      background-size: 100% 100%;

     }

     .navbar{
    background-color: transparent;
    border-style: none;    
    color:green;
    height: 75px;
    text-align: center;
    font-family: sans-serif;
    


     }

     .active{
     	background-color:  green;
     } 

  </style>
 </head>


 <body>
 <?php
Include ('connect.php');
?>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active "><a href="index.php">Home</a></li>
   
        <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>     
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li style="font-weight:bold"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>

        <li style="font-weight:bold"><a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" ></span>User Login</a></li>
        <li style="font-weight:bold"><a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" ></span>Doctor Login</a></li>
        <li style="font-weight:bold"><a href="#"><span class="glyphicon glyphicon-menu-hamburger"></span> AboutUs</a></li>  
        <li style="font-weight:bold"><a href="#"><span class="glyphicon glyphicon-earphone"></span> ContactUs</a></li> 
        <li style="font-weight:bold"><a href="#"><span class="glyphicon glyphicon-book"></span> Blog</a></li>       

      </ul>
    </div>
  </div>
</nav>

<!--

<div class="container" style="margin-top:100px;">    
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-primary">
        <div class="panel-heading">POSTS</div>
        <div class="panel-body"><img src=" " class="img-responsive" style=" " alt=" "></div>
        
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">Post on Blog.</div>
        <div class="panel-body">

          <div class = "row">
             <div class="col-sm-8">               
                   
                   <input type="text" placeholder="Enter your blog title.. " > 

              </div> <br> <br>                
                
          </div>

           <div class = "row">
                <div class ="container" >
                   <label align= "text-center"></label>
                   <!--<input type="text" class="container-fluid" align= "text-center" placeholder="Post something..">   -->

                    <!--<textarea placeholder="Enter Message Here.." rows="5" name="Your_Message" id="Your_Message" class="container-fluid"></textarea>  <br> <br>               
                </div>
          </div>
          
                   
          
        </div>
        <div class="panel-footer"><a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary btn-block">POST</a></div>
      </div>
    </div>
    
</div><br>

-->

<div class="container" style="margin-top:100px; ">
  <div class="row">
    <div class="col-md-6" style=";">

         <h3 class="well">POSTS</h3>
         <?php
         
         $results = $mysqli->query("SELECT blog_title, posts FROM blog_posts");
          
          while($row = $results->fetch_array()) {
              echo '<br>';
              echo '<div class="container-fluid">'.$row["blog_title"].'</div><br>';
              echo '<div class="container-fluid">'.$row["posts"].'</div><br>';
              

          }  
          
         
         ?>


         

    </div>
    
    <div class="col-md-6">

        <h3 class="well">Do you want to post something?</h3>
        <div class="row">
        <form action="blog_script.php" method="post" role="form">
          
            <div class="row">
              <div class="col-sm-12 form-group">
                <label for="p_title">Blog title</label>
                <input type="text" placeholder="Enter blog title here.."  name="p_title" id="p_name" class="form-control">
              </div>
              
            </div>    
            <div class="row">      
            <div class="col-sm-12 form-group">
              <label for="blog_post">YOUR MESSAGE...</label>
              <textarea placeholder="Enter Message here.." id="b_post" name="blog_post" rows="4" class="form-control"></textarea>
            </div>  

            <div class="col-md-12">
              <input type="submit" name="SUBMIT_MESSAGE" value="POST" class="btn btn-lg btn-success btn-block">
          </div>  
            
           </div>
            </form>
            </div>
            </div>



    
    
  </div>
</div>


    
      
                    
                   
                          