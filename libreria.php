<?php
/*Leer el archivo que contiene la informacion*/
function leerDatos(){
  $data_file = fopen('./data-1.json', 'r'); //Abrir el archivo json
  $data = fread($data_file, filesize('./data-1.json')); //Leer el contenido del archivo y obtener su tamaño
  $data = json_decode($data, true); //Convertir el contenido en formato JSON
  fclose($data_file); //Cerrar el archivo para no consumir innecesariamente recursos del servidor
  return ($data);
};

/*Inicializar los input select*/
function obtnciudad($getData){ //Opciones de ciudad
  $getCities = Array(); //Crear una matriz para evitar repetir ciudades
  foreach ($getData as $cities => $city) { //Recorrer la información
    if(in_array($city['Ciudad'], $getCities)){ //Verificar si el valor existe en el array
      //Continuar
    }else{
      array_push($getCities, $city['Ciudad']); //Agregar la ciudad a la matriz
    }
  }
  echo json_encode($getCities); //Devolver la matriz con los valores de las ciudades en formato JSON
}

function obtnTipo($getData){ //Opciones de Tipo
  $getTipo = Array(); //Crear una matriz donde se guardarán los valores de los tipos.
  foreach ($getData as $tipos => $tipo) { //Recorrer la información
    if(in_array($tipo['Tipo'], $getTipo)){ //Verificar si el valor existe en el array
      //Ciudad ya agregada. Continuar
    }else{
      array_push($getTipo, $tipo['Tipo']); //Agregar la ciudad a la matriz
    }
  }
  echo json_encode($getTipo); //Devolver la matriz con los valores de los tipos en formato JSON
}

?>
