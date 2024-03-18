$(document).ready(function(){

    var targetDiv = document.getElementsByClassName('firstlettereach');


    $(".firstlettereach").each(function() {

      const parentid = $(this).attr("id");
    
      const childid = '#child'+parentid;
      const childrenqueryselector = document.querySelector(childid);
      const intials = $("#"+childrenqueryselector.id).text().charAt(0);

      //colorbg
      const red = Math.floor(Math.random() * 256);
      const green = Math.floor(Math.random() * 256);
      const blue = Math.floor(Math.random() * 256);

      $('#profileImage'+parentid).text(intials);
      $('#profileImage'+parentid).attr('style',"background-color: rgb(" + red + ", " + green + ", " + blue + ")");
      // $('#profileImage'+parentid).style.background = "rgb(" + red + ", " + green + ", " + blue + ")";
      console.log(intials);
    

    });

    

});