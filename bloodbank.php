
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BloodBank 24X7</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">  	
    	
    		  #entry{

					margin-top: 50px;
					padding: 30px;
					
				}
    		   body{
						
						-webkit-background-size: cover;
						-moz-background-size: cover;
						-o-background-size: cover;
						background-size: cover;
<<<<<<< HEAD
					}	

           .navbar
           {
              background-color: skyblue;
              border-style: none;    
              color:green;
              height: 75px;
              text-align: center;
              font-family: sans-serif;
              color:black;
              font-size: 20px;

          }
	
=======
					}		
>>>>>>> 48b58744e4b6f90daf70f303617b8b6732cab4ea

    </style>
</head>

<body >
<<<<<<< HEAD

   <nav class="navbar navbar-inverse navbar-fixed-top" >
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
        <li ><a href="#"><h3 style="color:black;">Home</h4></a></li>
        
   
         
      </ul>
      <ul class="nav navbar-nav navbar-right">
               
        <li style="font-weight:bold"><a href="#"><span class="glyphicon glyphicon-menu-hamburger" style="color:black"></span><h4 style="color:black;"> AboutUs</h4></a></li>  
        <li style="font-weight:bold"><a href="#"><span class="glyphicon glyphicon-earphone" style="color:black"></span> <h4 style="color:black;">ContactUs</h4></a></li> 
             

      </ul>
    </div>
  </div>
  </nav>
=======
>>>>>>> 48b58744e4b6f90daf70f303617b8b6732cab4ea
   
   <div class="container" id="entry" >
      <form class="form-group " method="post">
        <label for="location"><h2>Find the Blood Bank at...</h2></label>
        	<input type="text" id="location" name="district" class="form-control" placeholder="Enter the city here.."> <hr>      	
          <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="submit_mes" value="submit" class="btn btn-lg btn-success btn-block">
          </div>
      </form>
    </div>

    

  


    <div class="container row" id="results" style="margin-top:120px;">

      <div class="col-md-6" >
      <?php

        /*if($_POST['location']==" " )
        {
        echo " Enter the address above...";
        }
            */if (isset($_POST['submit_mes'])) 
              {

                if($_POST['district']==" " )
                    {
                      echo " Enter the address above...";
                    }//not working....why?

                    $pin_c=$_POST['district'];

              //$location_length = strlen($_POST['location'])  ;
              //$addr=str_replace(" ","+",$_POST['location']);
              //done to replace empty spaces by '+' sign as google api requires it.
              
             // $location_url="https://maps.googleapis.com/maps/api/geocode/json?address=".$addr;

              //https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&type=restaurant&name=cruise&key=YOUR_API_KEY

              //$loc_cont = file_get_contents($location_url);
              //$loc_obj = json_decode($loc_cont,true);          

              //$lat=$loc_obj["results"][0]["geometry"]["location"]["lat"];
              /*
              if(!isset($lat))
                  {
                    echo "We were not able identify this location. ";
                    
                  }
              */
              //$lng=$loc_obj["results"][0]["geometry"]["location"]["lng"];
              /*if(!isset($lng))
                  {
                    echo "We were not able identify this location. ";
                    
                  }
              */

             // $formal_location=$loc_obj["results"][0]["formatted_address"];
              //echo "<br><br><b>We are showing results for this location(".$formal_location.")<br><i>Were you looking for the same?</i><br>";
              //echo "<br><br>";
          
              /*$link ="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat.','.$lng.'&radius=500&type=doctor&key=AIzaSyDtRVL608rSdYKjmMIlgRNwRgkqDU0zhi0 ';   */           
              $link="https://data.gov.in/api/datastore/resource.json?resource_id=e16c75b6-7ee6-4ade-8e1f-2cd3043ff4c9&api-key=b069725bad3b99eb281c3a86bad1d9f7&filters[district]=".$pin_c;
              $cont = file_get_contents($link);
              $obj = json_decode($cont,true);              
              /*
              $doctor=$obj["results"][0]["name"];
              $doctor_address=$obj["results"][0]["vicinity"];
              echo $doctor;
              echo "<br>";
              echo $doctor_address;
              */
              /*$doctor=$obj["results"];

              foreach ($obj["results"] as $key )
               {
                        # code...
                  echo $key->name;
                  echo "<br>";
                  echo $key->vicinity;

               }
               */

              


               for($i=0;$i<15;$i++)
               {
                  if(!isset($obj["records"][$i]["h_name"]))
                  {
                    echo "<b>We were able to show only these many results.";
                    break;
                  }
                  else
                  {
                   /* echo $obj["results"][$i]["name"];
                    echo "<br>";
                    echo $obj["results"][$i]["vicinity"];
                    echo "<br><br>";
                    */
                    
                   
                          echo '
                          <div class="container">
                              <div class="jumbotron3" style="background-color:#9CDEBA;font-size:20px;margin-left:20px;padding-left:20px;padding-top:25px;padding-bottom:25px;">
                                  <b>'.$obj["records"][$i]["h_name"].
                              '</div></b><br><br>';
<<<<<<< HEAD
                          echo '<ul type="square">
                                    <li><b><i>Address:'.$obj["records"][$i]["address"].'</i></li></b></ul><br>';
=======
                          echo '<ul type="square" >
                                 <li><b><i>Address:'.$obj["records"][$i]["address"].
                                 '</i></ul><br>';
>>>>>>> 48b58744e4b6f90daf70f303617b8b6732cab4ea
                         
                           if (isset($obj["records"][$i]["contact"])) 
                                  {
                                       echo '<ul type="square">
<<<<<<< HEAD
                                                <li><b><i>Contact:'.$obj["records"][$i]["contact"].'</i></li></ul><br>'  ;                                 
=======
                                            <li><b><i>Contact:'.$obj["records"][$i]["contact"].'</i></ul><br>'  ;                                 
>>>>>>> 48b58744e4b6f90daf70f303617b8b6732cab4ea
                                 }
                          
                          if (isset($obj["records"][$i]["pincode"])) 
                                  {
                                       echo '<ul type="square" >
<<<<<<< HEAD
                                                    <li><b><i>pincode:'.$obj["records"][$i]["pincode"].'</i></li></ul><br>';                              
                                 }
                            echo "</ul><br><hr></div>";
=======
                                 <li><b><i>pincode:'.$obj["records"][$i]["pincode"].
                                 '</i></ul><br>';                              
                                 }
                           
>>>>>>> 48b58744e4b6f90daf70f303617b8b6732cab4ea


                          
                  }  


               }
               
             }
       
      ?>      
        
      </div>

  </div>

 </body>
</html>
