$('.nav-ul .nav-link').click(function () {
    $(this).addClass("active").siblings().removeClass("active");
  });


$(document).on("click", "ul li", function () {
    $(this).addClass("active").siblings().removeClass("active");
  });

  //aktivizon funksionin start me rast te load te faqes
  window.addEventListener( "load", start, false );
  function start(){                 
                 var button = document.getElementById( "button" ); 
                 button.addEventListener( "click", cc, false );
              }

              
 function cc(){
  var radiobuton = document.getElementById("creditcard"); 
 //nese selektohet radiobutoni per pagese me kartele, shfaqet 
  if(radiobuton.checked){   document.writeln("<p>You should be logged in</p>")
   window.location.href ="login.html";   }
 }

var currentTime = new Date().getHours();
if (document.body) {
    if ( currentTime<=6 && currentTime > 18) {

        document.body.style.backgroundColor = "rgb(190,190,190)";
    }
    else {
        document.body.style.backgroundColor = "rgb(256,256,256)"
    }
}