/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('.carousel').carousel({
  interval: 3000
})


$(document).ready(function(){
     $('.nav-pills li').on('click', function() {
                $(".nav-pills li").removeClass("active");
                $(this).addClass("active");
            });  
})
    
         
    

  



