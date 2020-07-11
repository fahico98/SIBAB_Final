
// ANIMACION PARA SOCIALBAR CONTACTENOS

$('.botonF1').mouseenter(function(){
  // obtenemos los hijos en este caso el boton y el parrafo
  var hijo = $(this).parent().children();
  // obtenemos numero de boton,un atributo del Contenedor
  var padre = $(this).parent().attr('numero');
  $(hijo).addClass('animacionVer');
  $(this).parent().first().addClass('animated pulse infinite');
  
  var color="white";
  if (padre==1) {
    color="200, 61, 66"
  }else if (padre==2) {
    color="0, 161, 242";
  } else {
    color="255, 167, 0";
  }
  $(hijo).children().first().css({"transition" : ".3s","transform":"rotate(180deg)","color": "rgba("+color+")"});
  $(hijo).last().css({"background": "rgba("+color+")","border-radius" : "15px"});
});

$('.botonF1').mouseleave(function(){
  var hijo = $(this).parent().children();
  $(hijo).children().first().css({"transition" : ".3s","transform":"rotate(0deg)","color":"white"});

});

$('.contenedor').mouseleave(function () {
  $(this).children().removeClass('animacionVer');
  $(this).first().removeClass('animated pulse infinite');
});

$('.imagenSlide').mouseenter(function(){
  var url=$(this).attr('alt');
  $(this).attr("src","img/"+url+".png");
  $(this).css({"transition" : ".3s","transform":"rotate(360deg)"});
  // $(this).addClass('animated pulse infinite');
});

$('.imagenSlide').mouseleave(function(){
  var url=$(this).attr('alt');
  $(this).attr("src","img/"+url+"BN.png");
  $(this).css({"transition" : ".3s","transform":"rotate(0deg)"});
  // $(this).removeClass('animated pulse infinite');
});
// // LIQUID IMG
// $(".imgLiquidFill").imgLiquid({
//   fill: true,
//   horizontalAlign: "center",
//   verticalAlign: "top"
// });