
let idEditar

$(".editarCategoria").on("click",(e)=>{

	var id = e.currentTarget.accessKey
	var categoria = $("#n"+id).html()
	idEditar = id

	$("#titulo").html("Modificar categoría " + categoria)

	$("#card-editar input").val("")
	$("#card-lista").hide()
	$("#card-editar").show("slide")
})

$(".back-lista").on("click",(e)=>{
	e.preventDefault()
	$("#card-editar").hide()
	$("#card-lista").show("slide")	
})

$(".guardarTarifa").on("click",()=>{

	var formData = new FormData(document.getElementById("form-tarifas-editar"));
	var error = false
		formData.append('id',idEditar)
		formData.append('actualizarTarifaCategoria',"true")

	if (!error) {
		OptionsAjax.url = "views/ajax/gestorCategoria.php"
		OptionsAjax.data = formData;
		ajax.setDataForm(OptionsAjax)
		ajax.ejecutar()
			.then((data)=>{

				console.log(data)
				if (data.status == "ok") {
					swal({
						  title: "¡OK!",
						  text: "¡La categoría ha sido edita correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "categorias";
							  } 
					});
				}else{
					$("#"+data.input).removeClass("is-valid").addClass('is-invalid')
					$("#error").html(`
						<div class="alert alert-danger" role="alert" style="color: #721c24 !important; background-color: #f8d7da !important; border-color: #f5c6cb !important;">
			               `+data.mensaje+`
			            </div>
					`)
				}

			},(fail)=>{
				console.log("fallo")
				console.log(fail)
			})

	}

})

$(".guardarCargos").on("click",()=>{

	var formData = new FormData(document.getElementById("form-cargos-editar"));
	var error = false
		formData.append('id',idEditar)
		formData.append('actualizarCargosCategoria',"true")

	if (!error) {
		OptionsAjax.url = "views/ajax/gestorCategoria.php"
		OptionsAjax.data = formData;
		ajax.setDataForm(OptionsAjax)
		ajax.ejecutar()
			.then((data)=>{

				console.log(data)
				if (data.status == "ok") {
					swal({
						  title: "¡OK!",
						  text: "¡La categoría ha sido edita correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "categorias";
							  } 
					});
				}else{
					$("#"+data.input).removeClass("is-valid").addClass('is-invalid')
					$("#error").html(`
						<div class="alert alert-danger" role="alert" style="color: #721c24 !important; background-color: #f8d7da !important; border-color: #f5c6cb !important;">
			               `+data.mensaje+`
			            </div>
					`)
				}

			},(fail)=>{
				console.log("fallo")
				console.log(fail)
			})

	}

})