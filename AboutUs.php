<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    
    <link rel="stylesheet" href="./css/aue.css" type="text/css">

</head>

<body>
<?php include_once('./header.php'); ?>
    
    <div class="about-section">
        <h1 class="color1">About Us</h1>
        
        
      </div>




      
      <div class="aboutus">
        <p><strong>Here are some videos of our restaurant</strong></p>
        <div class="aboutus1">
            <div class="aboutus2">
                <iframe 
        
                    width="560" height="315"
                    src="https://www.youtube.com/embed/XcRAlL8l_U0"
                    title="Restaurant" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"allowfullscreen>
            
                </iframe>
            </div>
            <div class="aboutus2">
                <iframe 
                width="560" height="315" 
                src="https://www.youtube.com/embed/xPPLbEFbCAo" 
                title="Restaurant" 
                frameborder="0"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="aboutus">
        <p><strong>Here are some music we play in restaurant</strong></p>
        <div class="aboutus1">
            <div class="aboutus2">
                <iframe 
                src="https://open.spotify.com/embed/track/1T6QSOdJhHLcIGtbuF0e6H?utm_source=generator"
                width="560" height="315" 
                frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">
            </iframe>

            </div>
            <div class="aboutus2">
                <iframe src="https://open.spotify.com/embed/track/4WTVLxwHTHEv1tQWHhpDYk?utm_source=generator" 
                width="560" height="315" 
                frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">

                </iframe>
            </div>
        </div>
    </div>

    <div class="aboutus">
    
        <p><strong>Here is the restaurant location</strong></p>
        <div class="aboutus1">
            <div class="aboutus2">
                <iframe 
                
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2947.6287333297496!2d21.145875314874363!3d42.37175094235683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13547e56a538a127%3A0x620d938101de6c5e!2sLybeteni%20Grill!5e0!3m2!1sen!2s!4v1641289445031!5m2!1sen!2s" 
                width="560" height="315" 
                style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>

            </div>
            <div class="aboutus2">
                <p>Here you can find your current location</p>  
                <button onclick="getlocation()">Search your curret location</button>  
                <div id="location"></div>  
                <script>  
                    var x= document.getElementById("location");  
                    function getlocation() {  
                        if(navigator.geolocation){  
                            navigator.geolocation.getCurrentPosition(showPosition)  
                          }  
                        else  
                        {  
                             alert("Sorry! your browser is not supporting")  
                         } }  
                       
                     function showPosition(position){  
                       var x = "Your current location is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " +    position.coords.longitude + ")";  
                                document.getElementById("location").innerHTML = x;  
                     }  
                </script>

                
                
            </div>
            
        </div> 

         <address>
            <p> Our email <a href="mailto:arbessa.kadriu@gmail.com">addres</a>.<br></p>
             
             </address>

            

            </div>
            
    </div>
    <script>
    if (sessionStorage.clickcount) {
        sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
      } else {
        sessionStorage.clickcount = 1;
      }
      document.getElementById("result").innerHTML = "You have clicked the button " +
      sessionStorage.clickcount + " time(s) in this session.";
    

</script>





    
    
<footer>

    <div class="upper">
    <div class = "column-1">
        <h3>From the Blog</h3>
         
         <p class= "green" style="text-align:left;">Christmas Feta</p>
         <p class="grey" style = "font-size: 13px;"><b id = "admin" >Admin</b>, pwww-gr2</p>
         <p class="grey" id="date">Thursday, December 13, 2021</p>
         <p class = "grey">Christmas Feta is here for the holidays! Smooth and creamy whipped feta topped with orange zest, pomegranate seeds, candied nuts, and fresh thyme. It’s basically a delicious ornament in a bowl!</p>
         <p><a href = "https://pinchofyum.com/christmas-feta" id = "green" >Read more &rsaquo; </a></p>

        
    </div>
    <div class = "column-2">
        <h3>Quick Links</h3>
        <p><a target = "_blank" href = "https://ncert.nic.in/textbook/pdf/kehe103.pdf" ><b>&rsaquo;</b>Food and nutrition (book)</a></p>
        <p><a href = "https://pinchofyum.com/"> <b>&rsaquo;</b> Pinch of Yum</a></p>
        <p><a href = "https://www.seriouseats.com/"> <b>&rsaquo;</b> Serious Eats</a></p>
        <p><a href = "https://food52.com/"> <b>&rsaquo; </b>Food 52</a></p>
        <p><a href = "https://www.cannellevanille.com/"> <b>&rsaquo; </b>Cannelle et vanille</a></p>
        <p><a href = "https://www.browneyedbaker.com/"> <b>&rsaquo;</b> Brown eyed baker</a></p>
       
    </div>
    <div class = "column-3">
        <h3>Latest tweets</h3>

        <p><i>@EvanKirste</i>   From our point view, this is the best restaurant in town: the best relation between good quality and price. All crew work together, eficiently and very polite.</p>
        <p><em>@alisstair</em>  A wonderful experience, full of little taste  surprises, bursting with flavour and inventiveness. Perhaps the best meal I've ever eaten. Cannot speak too highly about this "Temple to Food".</p>
    </div>
    <!-- <div class = "column-4">
        <h3>Contact us</h3>
        <form method = "post" action = "" id = "Contact-us-form">
            
           <p><input type = "text" id = "fname" name = "fname" placeholder="Full Name"></p> 
           <p><input type = "email" id = "email" name = "email" placeholder="Email Adress"></p>
           <p><input type = "text" id = "subject" name = "subject" placeholder="Subject"></p>
           <p><textarea rows="4" cols="20" name="message" form="Contact-us-form" placeholder="Message"></textarea></p>
           <p ><input type = "submit" placeholder="Submit" style="background-color: #7cc08d; border: none; color: 
           rgb(50, 50, 50);"></p>
        </form>
    </div> -->
</div>
    <div class="last">

        <p style = "padding-left: 120px;">Copyright &copy; 2021 PWWW-GR2 - All rights reserved</p>

    </div>
</footer>
</div>


</body>



</html>