$( "#form" ).on( "submit", function( event ) {
  event.preventDefault();
  var answer = $( this ).serialize();
    
  $.ajax({
         url:'assets/scripts/form.php',
         method: 'post',
         data: answer,
         dataType: 'json',
         success:function(evt){
             
           //  var obj = $.parseJSON(evt);
             
            
                //console.log(evt[5]['name']);
                reset();
                alert('Ваш комментарий записан');
                $('#name').val('');
                $('#email').val('');
                $('textarea').val('');
             

         }
      
      
        }); 

});

reset();

function reset(){
$.get({
    url: 'assets/scripts/answer.php',
    dataType: 'json',
    success: function(evt){
        
   
        
        $('.output_blog-green').remove();
        $('.output_blog-grey').remove();
        
       var i = 0;
        do {
          
          if (i % 2 != 0){
              green(evt[i]['name'], evt[i]['email'], evt[i]['comment']);
          } else {
              grey(evt[i]['name'], evt[i]['email'], evt[i]['comment']);
            }  
          i++; 
        } while (evt.length >= i);
        
    }
});
}

      
function green (name, email, comment) {
     $('.output_comments').append('<div class="output_blog-green"><p class="output_name-green">' + name + '</p><p class="output_mail-green">' + email + '</p><p class="output_cmnt-green">' + comment + '</p><div>')
}

function grey (name, email, comment) {
     $('.output_comments').append('<div class="output_blog-grey"><p class="output_name-grey">' + name + '</p><p class="output_mail-grey">'  + email + '</p><p class="output_cmnt-grey">' + comment + '</p><div>')
}