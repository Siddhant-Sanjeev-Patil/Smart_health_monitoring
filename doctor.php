
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor24x7</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">  	
    	
    		  #entry{

					margin-top: 50px;
					padding: 30px;
					
				}
    		   body{
						/*background: url('weather.jpg') no-repeat center center fixed;*/
						-webkit-background-size: cover;
						-moz-background-size: cover;
						-o-background-size: cover;
						background-size: cover;
					}		

    </style>
</head>

<body >
   
   <div class="container" id="entry" >
      <form class="form-group " method="post">
        <label for="location"><h3>Find the doctor at...</h3></label>
        	<input type="text" id="location" name="location" class="form-control" placeholder="enter the address city here.."> <hr>      	
          <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="submit_mes" value="submit" class="btn btn-lg btn-success btn-block">
          </div>
      </form>
    </div>

    

    <!--<div class="container" id="weather_data">
        <h3 >Weather</h3>
        <ul id="nytimes-articles" class="article-list">weather here</ul>
    </div>

    <div class="container" id="news_data">
        <h3 >Recent news</h3>
        <ul >news here</ul>
    </div>
    -->
  	<div class="container row" >

  		<div class="col-md-6" id="weather_today">
      <?php

        /*if($_POST['location']==" " )
        {
        echo " Enter the address above...";
        }
            */if (isset($_POST['submit_mes'])) 
              {

                if($_POST['location']==" " )
                    {
                      echo " Enter the address above...";
                    }//not working....why?


              //$location_length = strlen($_POST['location'])  ;
              $addr=str_replace(" ","+",$_POST['location']);
              //done to replace empty spaces by '+' sign as google api requires it.
              
              $location_url="https://maps.googleapis.com/maps/api/geocode/json?address=".$addr;

              //https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&type=restaurant&name=cruise&key=YOUR_API_KEY

              $loc_cont = file_get_contents($location_url);
              $loc_obj = json_decode($loc_cont,true);          

              $lat=$loc_obj["results"][0]["geometry"]["location"]["lat"];
              /*
              if(!isset($lat))
                  {
                    echo "We were not able identify this location. ";
                    
                  }
              */
              $lng=$loc_obj["results"][0]["geometry"]["location"]["lng"];
              /*if(!isset($lng))
                  {
                    echo "We were not able identify this location. ";
                    
                  }
              */

              $formal_location=$loc_obj["results"][0]["formatted_address"];
              echo "We are showing results for this location(".$formal_location.")<br>Were you looking for the same?<br>";
              echo "<br><br>";
          
              $link ="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat.','.$lng.'&radius=500&type=doctor&key=AIzaSyDtRVL608rSdYKjmMIlgRNwRgkqDU0zhi0 ';              
                      
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
                  if(!isset($obj["results"][$i]["name"]))
                  {
                    echo "We were able to show only these many results. ";
                    break;
                  }
                  else
                  {
                    echo $obj["results"][$i]["name"];
                    echo "<br>";
                    echo $obj["results"][$i]["vicinity"];
                    echo "<br><br>";

                  }  


               }
               
             }
       
      ?>  		
  			
  		</div>

	</div>

 </body>
</html>
