
  function check(form) { /*function to check userid & password*/
                /*the following code checkes whether the entered userid and password are matching*/
                if(form.login.value == "myuserid" && form.pass.value == "123456") {
                    window.open('/downloadexcel.html','_self')/*opens the target page while Id & password matches*/
                }
                else {
                    alert("Wrong Username or password")/*displays error message*/
                }
            }
   