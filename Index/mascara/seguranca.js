function checa_seguranca(pass, campo){ 	
	var senha = document.getElementById(pass).value; 	
		var entrada = 0; 		var resultadoado; 	
					if(senha.length < 7){ 	
								entrada = entrada - 1; 		} 				
								if(!senha.match(/[a-z_]/i) || !senha.match(/[0-9]/)){ 	
											entrada = entrada - 1; 		} 				if(!senha.match(/\W/)){ 
															entrada = entrada - 1; 		} 				if(entrada == 0){ 	
																		resultado = 'A Segurança de sua senha é: <font color=\'#99C55D\'>EXCELENTE</font>'; 	
																			} else if(entrada == -1){ 				resultado = 'A Segurança de sua senha é: <font color=\'#7F7FFF\'>BOA</font>'; 	
																				} else if(entrada == -2){ 				resultado = 'A Segurança de sua senha é: <font color=\'#FF5F55\'>RAZOAVEL</font>'; 	
																					} else if(entrada == -3){ 				resultado = 'A Segurança de sua senha é: <font color=\'#A04040\'>BAIXA</font>'; 	
																						} 				document.getElementById(campo).innerHTML = resultado; 				return; }
