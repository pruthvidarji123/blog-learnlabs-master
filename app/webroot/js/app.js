 $(document).ready(function(){
            setTimeout(function() {
               $('.alert-popup').fadeOut(3000);
            }, 1000);
            $('.alert-popup').click(function(){
                $(this).fadeOut(3000);
            });
            setTimeout(function() {
               $('.auth-alert').fadeOut(3000);
            }, 1000);
            $('.auth-alert').click(function(){
                $(this).fadeOut(3000);
            });
            
  });