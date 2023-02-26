$('.nav-ul .nav-link').click(function () {
    $(this).addClass("active").siblings().removeClass("active");
  });

$('.controls .buttons').click(function(){
      $(this).addClass('button-active').siblings().removeClass('button-active');

    //   metoda attr() ne jquery perdoret per me kthy vleren e  atributet psh all, pizza etc
      let filter=$(this).attr('data-filter');
      if(filter=='all'){
          $('.dish .image' ).show(400);

      }
    //   hide-callback
      else{
        $('.dish .image' ).not('.'+filter).hide(200);
        $('.dish .image' ).filter('.'+filter).show(400);


      }
  });