function mailsend(event){
			
			if(validate('register_now')){
			$.ajax({
					method: "POST",
					url: "registersend.php",
					data: { name: $('#name').val(), email: $('#email').val() ,phone: $('#phone').val() ,designation: $('#designation').val(),company: $('#company').val(),message:$('#message').val()}
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
            setInterval(function(){ window.location="/register.html" }, 2000);
          
          
          }
        }); 
      }else{
			event.preventDefault();			
				
			
			}
		
	}
