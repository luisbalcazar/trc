<?php
class LocacionController{

	#MOSTRAR LOCACIONES EN LA VISTA
	#------------------------------------------------------------
	public function mostrarLocacionController(){

		$respuesta = LocacionModel::mostrarLocacionModel("locacion");
		foreach ($respuesta as $row => $item){

            echo '<option value="'.$item["recargo"].'">'.$item["locacion"].'</option>';

		}

	}


}