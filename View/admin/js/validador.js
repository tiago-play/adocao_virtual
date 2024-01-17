jQuery(document).ready(function() {

	jQuery.fn.validacpf = function(){ 
	   	this.change(function(){
	        CPF = jQuery(this).val();
	        if(!CPF){ return false;}
	        erro  = new String;
	        cpfv  = CPF;
	        if(cpfv.length == 14 || cpfv.length == 11){
	            cpfv = cpfv.replace('.', '');
	            cpfv = cpfv.replace('.', '');
	            cpfv = cpfv.replace('-', '');
	  
	            var nonNumbers = /\D/;
	    
	            if(nonNumbers.test(cpfv)){
	                erro = "A verificacao de CPF suporta apenas números!";
	            }else{
	                if (cpfv == "00000000000" ||
	                    cpfv == "11111111111" ||
	                    cpfv == "22222222222" ||
	                    cpfv == "33333333333" ||
	                    cpfv == "44444444444" ||
	                    cpfv == "55555555555" ||
	                    cpfv == "66666666666" ||
	                    cpfv == "77777777777" ||
	                    cpfv == "88888888888" ||
	                    cpfv == "99999999999") {
	                            
	                    erro = "Número de CPF inválido!"
	                }
	                var a = [];
	                var b = new Number;
	                var c = 11;
	  
	                for(i=0; i<11; i++){
	                    a[i] = cpfv.charAt(i);
	                    if (i < 9) b += (a[i] * --c);
	                }
	                if((x = b % 11) < 2){
	                    a[9] = 0
	                }else{
	                    a[9] = 11-x
	                }
	                b = 0;
	                c = 11;
	                for (y=0; y<10; y++) b += (a[y] * c--);
	    
	                if((x = b % 11) < 2){
	                    a[10] = 0;
	                }else{
	                    a[10] = 11-x;
	                }
	                if((cpfv.charAt(9) != a[9]) || (cpfv.charAt(10) != a[10])){
	                    erro = "Número de CPF inválido.";
	                }
	            }
	        }else{
	            if(cpfv.length == 0){
	                return false;
	            }else{
	                erro = "Número de CPF inválido.";
	            }
	        }
	        if (erro.length > 0){
	            jQuery(this).val('');
	            alert(erro);
	            setTimeout(function(){jQuery(this).focus();},100);
	            return false;
	        }
	        return jQuery(this);
	    });
	}

	jQuery("#cpf").validacpf();
	jQuery('#senha').pstrength(); //forçar a senha
	
	
	//validações com alphanumeric
	jQuery("#nome").alpha({allow:" "}); //apenas letras
	jQuery("#cor").alpha({nocaps:true});
	jQuery("#rg").numeric();
	jQuery("#numero").numeric();
	jQuery("#email").alphanumeric({nocaps:true, allow:"@._-"}); 


    jQuery("#form_funcionario").validate({
        // Define as regras
        rules:{
            nome:{
                required: true, 
            },
            
            email:{
            	required: true,
                email: true
            },
            
            dt_nascimento:{
            	required: true,
            },
            
        	rg:{
            	required: true,
            },
            
            cpf:{
            	required: true,
            },
            
            telefone:{
            	required: true,
            },
            
            celular:{
            	required: true,
            },
        	
        	cep:{
        		required: true,
        	},
        	
        	numero:{
        		required: true,
        	},
        	
        	complemento:{
        		required: true,
        	},
        	
        	bairro:{
        		required: true,
        	},
        	
        	endereco:{
        		required: true,
        	}
        	
        },

        // Define as mensagens de erro para cada regra
        messages:{   	
        	nome:{
                required: "Digite o nome.",
            },
            
            email:{
                	required: "Digite o email.",
                    email: "Digite um email válido. Ex: fulano@fulano.com"
                },
               
            dt_nascimento:{
            	required: "Digite a data",
            },
               
			rg:{
                required: "Digite o rg.",
            },
            
            cpf:{
            	required: "Digite o cpf.",
            },
            
            telefone:{
            	required: "Digite o telefone.",
            },
            
            celular:{
            	required: "Digite o celular.",
            },
            
            cep:{
            	required: "Digite o cep.",
            },
            
            numero:{
                required: "Digite o numero.",
            },
            
            complemento:{
        		required: "Digite o complemento.",
        	},
        	
        	bairro:{
        		required: "Digite o bairro.",
        	},
            
            endereco:{
            	required: "Digite o endereço.",
            }
        }
    });
    
  
	jQuery("#form_cliente").validate({
		rules:{
			nome:{
        	    required: true, 
            },
            
            email:{
            	required: true,
                email: true
            },
            
            dt_nascimento:{
            	required: true,
            },
            
        	rg:{
            	required: true,
            },
            
            cpf:{
            	required: true,
            },
            
            telefone:{
            	required: true,
            },
            
            celular:{
            	required: true,
            },
        	
        	cep:{
        		required: true,
        	},
        	
        	numero:{
        		required: true,
        	},
        	
        	complemento:{
        		required: true,
        	},
        	
        	bairro:{
        		required: true,
        	},
        	
        	endereco:{
        		required: true,
				}
	        	
	        },
	
		messages:{  
			nome:{
                required: "Digite o nome.",
            },
            
            email:{
                	required: "Digite o email.",
                    email: "Digite um email válido. Ex: fulano@fulano.com"
                },
               
            dt_nascimento:{
            	required: "Digite a data",
            },
               
			rg:{
                required: "Digite o rg.",
            },
            
            cpf:{
            	required: "Digite o cpf.",
            },
            
            telefone:{
            	required: "Digite o telefone.",
            },
            
            celular:{
            	required: "Digite o celular.",
            },
            
            cep:{
            	required: "Digite o cep.",
            },
            
            numero:{
                required: "Digite o numero.",
            },
            
            complemento:{
        		required: "Digite o complemento.",
        	},
        	
        	bairro:{
        		required: "Digite o bairro.",
        	},
            
            endereco:{
            	required: "Digite o endereço.",
			}
		}
	});
	
	
	jQuery("#form_animal").validate({
        rules:{
			nome:{
				required: true,
			},
			
			dt_nascimento:{
            	required: true,
            },
			
			cor:{
            	required: true,
            },
			
			raca:{
            	required: true,
            },
            
            procedencia:{
            	required: true,
            },
            
            tipo:{
            	required: true,
			}
        },

        messages:{  
			nome:{
				required: "Digite o nome",
			},
			
			dt_nascimento:{
            	required: "Digite a data",
            },
			
			cor:{
            	required: "Digite a cor",
            },
			
			raca:{
            	required: "Digite a raca",
            },
            
            procedencia:{
            	required: "Digite a procedencia",
            },
            
            tipo:{
            	required: "Digite o tipo",
			}	
        }
    });
	
	
	jQuery("#form_vacina").validate({
        rules:{
			nome:{
				required: true,
			},
			
			validade:{
				required: true,
			},
			
			doenca:{
				required: true,
			}
        	
        },

        messages:{  
			nome:{
				required: "Digite o nome",
			},
			
			validade:{
				required: "Digite a data",
			},

			doenca:{
				required: "Digite a doença",
			}
        }
    });
    
    
	jQuery("#form_eventoCategoria").validate({
        rules:{
			descricao:{
				required: true,
			}
        },

        messages:{  
			descricao:{
				required: "Digite a descrição",
			}
        }
    });
	
	
    
});