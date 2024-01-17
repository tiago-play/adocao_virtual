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
                	required: "O campo email é obrigatorio.",
                    email: "O campo email deve conter um email válido."
                },
                senha: {
                    required: "O campo senha é obrigatorio."
                },
            }
 
        });
    });










/*
teste para ver se está apontando corretamente o script
$(document).ready(function(){
	$(".teste").click(function(){
		 alert("Ola Mundo!!!");
		 return false;
	});
});
*/