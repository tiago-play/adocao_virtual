    $(document).ready(function(){
        $('#login').validate({
            rules:{
                email: {
                    required: true,
                    email: true
                },
                senha: {
                    required: true
                },
            },
             messages:{
                email: {
                	required: "O campo email � obrigatorio.",
                    email: "O campo email deve conter um email v�lido."
                },
                senha: {
                    required: "O campo senha � obrigatorio."
                },
            }
 
        });
    });










/*
teste para ver se est� apontando corretamente o script
$(document).ready(function(){
	$(".teste").click(function(){
		 alert("Ola Mundo!!!");
		 return false;
	});
});
*/