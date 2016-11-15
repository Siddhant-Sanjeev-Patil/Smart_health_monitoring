
<!DOCTYPE html>

<html>

<head>
	
	<title>Doctor24x7</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Carter+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/4ade0e5ef1.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDmFqQa3GmRdYRtITKJnv3qF3-tsL5H2A&v=3.exp&sensor=false&libraries=places"></script>
  <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('location');
                       var autocomplete = new google.maps.places.Autocomplete(input);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>

    <style type="text/css">  	
    	
    		  #entry
          {

					margin-top: 50px;
					padding: 30px;
					
				}
    		   body
           {
						
						-webkit-background-size: cover;
						-moz-background-size: cover;
						-o-background-size: cover;
						background-size: cover;
					}		

           .fixedContainer
         {    
        position: fixed;    
        margin-left: 10px;    
        }

    </style>
</head>

<body >
   
   <div class="container" id="entry" >
      <form class="form-group " method="post">
        <label for="location"><h3>Find the doctor at...</h3></label>
        	<input type="text" id="location" name="location" class="form-control" placeholder="enter the address here.."> <hr>      	
          <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="submit_mes" value="submit" class="btn btn-lg btn-success btn-block">
          </div>
      </form>
    </div>

    

  


    <div class="container row" id="results">

      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" >
      <?php

        
            if (isset($_POST['submit_mes'])) 
              {

                if($_POST['location']==" " )
                    {
                      echo " Enter the address above...";
                    }


              //$location_length = strlen($_POST['location'])  ;

              //$addr=str_replace(" ","+",$_POST['location']);

              //done to replace empty spaces by '+' sign as google api requires it.
              $addr=urlencode($_POST['location']);          
              
              
              $location_url="https://maps.googleapis.com/maps/api/geocode/json?address=".$addr;

              

              $loc_cont = file_get_contents($location_url);
              $loc_obj = json_decode($loc_cont,true);          

              $lat=$loc_obj["results"][0]["geometry"]["location"]["lat"];
              
              $lng=$loc_obj["results"][0]["geometry"]["location"]["lng"];
              

              $formal_location=$loc_obj["results"][0]["formatted_address"];

             
              echo "<br>
                     <div class='container-fluid' style='font-family:'Marcellus',serif;'>
                        <b><i>We are showing results for this location(".$_POST['location'].")</b></i>
                     </div>";
                      
              echo "<br><br>";
          
              $link ="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat.','.$lng.'&radius=2000&type=doctor&key=AIzaSyDtRVL608rSdYKjmMIlgRNwRgkqDU0zhi0 ';              
                      
              $cont = file_get_contents($link);
              $obj = json_decode($cont,true);              
              
               for($i=0;$i<30;$i++)
               {
                  if(!isset($obj["results"][$i]["name"]))
                  {
                    echo "<b>We were able to show only these many results.</b><br><br><br><br>";
                    break;
                  }
                  else
                  {
                   
                    
                          $place_ref=$obj["results"][$i]["place_id"];
                          //echo $place_ref;
                          $place_details_url="https://maps.googleapis.com/maps/api/place/details/json?placeid=".$place_ref.'&key=AIzaSyDtRVL608rSdYKjmMIlgRNwRgkqDU0zhi0';
                           $details_cont = file_get_contents($place_details_url);
                           $details_obj = json_decode($details_cont,true); 

                          echo '
                          <div class="container-fluid">
                              <div class="jumbotron3" style="background-color:#9CDEBA;font-size:20px;margin-left:20px;padding-left:20px;padding-top:25px;padding-bottom:25px;">
                                  <b>'.$obj["results"][$i]["name"].
                              '</div></b><br><br>';
                          echo '<ul type="square" >
                                 <li><b><i>Address:'.$obj["results"][$i]["vicinity"].'</i></b><br></li>';

                            if (isset($details_obj["result"]["formatted_phone_number"])) 
                                  {
                                       echo '<li><b><i>Contact:'.$details_obj["result"]["formatted_phone_number"].'</i></b><br></li>'  ;                                 
                                 }
                            if(isset($details_obj["result"]["website"]))    
                            {
                                       echo '<li><b><i>Website:<a target="_blank" href='.$details_obj["result"]["website"].'>Open in a new tab. </a></i></b><br></li>';
                            } 
                                 
                                 if(isset($details_obj["result"]["rating"]))
                            {
                                       echo '<li><b><i>Ratings:'.$details_obj["result"]["rating"].'</i></b><br></li>';

                            }
                            
                            if(isset($details_obj["result"]["url"]))
                            {
                                      echo '<li><b><i>Find on map:<a target="_blank" href='.$details_obj["result"]["url"].'>Open in a new tab.</a></i></b><br></li>';

                            }

                                 
                                 echo "</ul><br><hr></div>";
                          
                  }  


               }
               
             }
       
      ?>      
        
      </div>

     <!-- <div class="col-md-6  col-lg-6 hidden-xs hidden-sm "  id="map" style="position:relative">
                                        <?php 

                                             /*if(isset($_POST['location']))
                                             {

                                                 echo '
                                                    
                                                      <div class="fixedContainer">
                                                      <iframe 
                                                        width="650"
                                                        height="460"                                                        
                                                        frameborder="0" style="border:0"
                                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAnPd6rDXQ8pUSBOkvy5TCI5PCDUFQXTdk
                                                          &q='.$addr.'" allowfullscreen>

                                                      </iframe></div>';

                                             }   */                                

                                         ?>
                                </div>
                                --> 

  </div>

 </body>
</html>
