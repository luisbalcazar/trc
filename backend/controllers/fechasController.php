<?php 
class fechas {

public static function formateame ($fecha) 
{
	//descomponer fecha de llegada
	$arrivalday=substr($fecha, 0, 2);
	$arrivalmonth=substr($fecha, 3, 2);
	$arrivalyear=substr($fecha, 6, 4);	
	//Mes de llegada///////////
	$cadena= "Enero Febrero Marzo Abril Mayo Junio Julio Agosto Septiembre Octubre Noviembre Deciembre";
	$vector = explode(" ",$cadena);
	$r_MonthOfArrivalx=$vector[$arrivalmonth - 1] ;
	//Mes de salida///////////
	return ($arrivalday." ". $r_MonthOfArrivalx." ".$arrivalyear) ;
}


public static function tomysql ($fecha)
{
	$vector = explode("-",$fecha,20);
	$devolver = $vector[0]."-".$vector[1]."-".$vector[2];
	return $devolver;
}

public static function tomysqlSL ($fecha)
{
	$vector = explode("/",$fecha,20);
	$devolver = $vector[2]."-".$vector[0]."-".$vector[1];
	return $devolver;
}

public static function tomysqlSH ($fecha)
{
	$vector = explode("/",$fecha,20);
	$hora= explode(" ",$vector[2]);
	$devolver = $hora[0]."-".$vector[0]."-".$vector[1]." ".$hora[1];
	return $devolver;
}

public static function tospain($fecha)
{	
	$vector = explode("-",$fecha,20);
	$devolver = $vector[2]."-".$vector[1]."-".$vector[0];
	return $devolver;
}


public static function tospainSH($fecha)
{	
	$hora= explode(" ",$fecha);
	$vector = explode("-",$hora[0]);
	$devolver = $vector[2]."-".$vector[1]."-".$vector[0];
	return $devolver;
}

public static function torden($fecha)
{
	$vector = explode("-",$fecha,20);
	$devolver = $vector[0].$vector[1].$vector[2];
	return $devolver;
}

public static function dias_entre_fechas($fecha1, $fecha2)
{
$dia1 = strtok($fecha1, "-");
$mes1 = strtok("-");
$anyo1 = strtok("-");

$dia2 = strtok($fecha2, "-");
$mes2 = strtok("-");
$anyo2 = strtok("-");

$num_dias = 0;

if ($anyo1 < $anyo2)
{
$dias_anyo1 = date("z", mktime(0,0,0,12,31,$anyo1)) - date("z", mktime(0,0,0,$mes1,$dia1,$anyo1));
$dias_anyo2 = date("z", mktime(0,0,0,$mes2,$dia2,$anyo2));
$num_dias = $dias_anyo1 + $dias_anyo2;
}
else
$num_dias = date("z", mktime(0,0,0,$mes2,$dia2,$anyo2)) - date("z", mktime(0,0,0,$mes1,$dia1,$anyo1));

return $num_dias;
}

public static function suma_fechas($fecha,$ndias)
            
{
            
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
            
              list($dia,$mes,$a�o)=split("/", $fecha);
            
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
            
              list($a�o,$mes,$dia)=split("-",$fecha);
        $nueva = mktime(0,0,0, $mes,$dia,$a�o) + $ndias * 24 * 60 * 60;
        $nuevafecha=date("d-m-Y",$nueva);
            
      return ($nuevafecha);  
            
}

}		
?>