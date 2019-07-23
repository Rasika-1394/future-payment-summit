function mailsend(event){
            
            if(validate('contact_now')){
            $.ajax({
                    method: "POST",
                    url: "mail.php",
                   data: { name: $('#name').val(), email: $('#email').val() ,phone: $('#phone').val() ,radios: $('input[name=radios]:checked', '#contact_now').val(),specific_interest: $('#specific_interest').val(),designation: $('#designation').val(),company: $('#company').val(),message:$('#message').val()}
                })
                .done(function( msg ) {
          if(msg==1)
      {
             $('#thankyouModal').modal('show');
               $('#thankyouModal').on('hidden.bs.modal', function () {
                   location.reload();
               });
          }
      else
      {
             
           $('#emessage').html("Your request has been sent successfully");
            setInterval(function(){ window.location="/contact.html" }, 2000);
          
          
          }
        }); 
      }else{
			event.preventDefault();			
			}
        
		
		
    }

