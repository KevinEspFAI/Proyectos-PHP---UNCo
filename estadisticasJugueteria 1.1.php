<?php
// MÓDULOS //

/** Escribe el Menú de Opciones y lee la opcion del usuario
 * @return int
 */
function menuOpciones (){
    //int $eleccion
    do {
        echo "------------------------------------------------------------------------------------------\n";
        echo "Menú Principal - Sistema de Estadísticas Mensuales - Juguetería 'El Programador Feliz'\n";
        echo "------------------------------------------------------------------------------------------\n";
        echo "\n";
        echo "1. Ingresar datos de un Juguete.\n";
        echo "2. Información completa del mes con Mayor costo de compra.\n";
        echo "3. Consulta del 1° mes que supera el monto límite ingresado.\n";
        echo "4. Información completa de un mes.\n";
        echo "5. Consulta del Producto de Mayor Costo de cada mes (ordenado de Mayor a Menor costo de compra).\n";
        echo "6. Salir.\n";
        echo "Ingrese una opción válida del Menú (del 1 al 6): ";
        $eleccion = trim(fgets(STDIN));
        echo "\n";
        // REPETIR MIENTRAS la elección del usuario sea diferente de cualquiera de las válidas
    }while ($eleccion <> 1 && $eleccion <> 2 && $eleccion <> 3 && $eleccion <> 4 && $eleccion <> 5 && $eleccion <> 6);
    
    return ($eleccion);
}


/** Precarga los datos de los productos de mayor costo de cada mes, del año pasado. Crea el arreglo prodMayorCosto
 * @return array
 */
function cargaProdMayorCosto (){
    //array $prodMayorCosto
    
    $prodMayorCosto = []; //Inicialización del arreglo
    
    //Se precarga el arreglo asociativo, clasificando en prod, precioProd y cantProd
    $prodMayorCosto[0] = ["prod" => "muñeco", "precioProd" => 800, "cantProd" => 10];
    $prodMayorCosto[1] = ["prod" => "castillo", "precioProd" => 4000, "cantProd" => 2];
    $prodMayorCosto[2] = ["prod" => "auto", "precioProd" => 700, "cantProd" => 8];
    $prodMayorCosto[3] = ["prod" => "peluche", "precioProd" => 1000, "cantProd" => 5];
    $prodMayorCosto[4] = ["prod" => "peluche", "precioProd" => 1000, "cantProd" => 8];
    $prodMayorCosto[5] = ["prod" => "auto", "precioProd" => 700, "cantProd" => 12];
    $prodMayorCosto[6] = ["prod" => "dinosaurio", "precioProd" => 650, "cantProd" => 15];
    $prodMayorCosto[7] = ["prod" => "peluche", "precioProd" => 1000, "cantProd" => 10];
    $prodMayorCosto[8] = ["prod" => "barco", "precioProd" => 2500, "cantProd" => 3];
    $prodMayorCosto[9] = ["prod" => "auto", "precioProd" => 700, "cantProd" => 20];
    $prodMayorCosto[10] = ["prod" => "MaxSteel", "precioProd" => 1100, "cantProd" => 20];
    $prodMayorCosto[11] = ["prod" => "telescopio", "precioProd" => 8000, "cantProd" => 1];
    
    //retorna el arreglo como tal por completo
    return ($prodMayorCosto);
    
}

/**Calcula el costo de cada mes (Precio x Cantidad).
 * @param array $prodMayorCosto
 * @return array
 */
function costosMes ($prodMayorCosto){
    //array $costos
    
    //Se inicializa $costos
    $costos = [];
    
    /* Se opera con el arreglo: Se multiplica el precio por la cantidad, indicando el índice numérico en ambos arrays
     * (Sabemos que es 11 el límite de índices, que significan la cantidad de meses
     */
    $costos[0] = $prodMayorCosto[0]["precioProd"] * $prodMayorCosto[0]["cantProd"];
    $costos[1] = $prodMayorCosto[1]["precioProd"] * $prodMayorCosto[1]["cantProd"];
    $costos[2] = $prodMayorCosto[2]["precioProd"] * $prodMayorCosto[2]["cantProd"];
    $costos[3] = $prodMayorCosto[3]["precioProd"] * $prodMayorCosto[3]["cantProd"];
    $costos[4] = $prodMayorCosto[4]["precioProd"] * $prodMayorCosto[4]["cantProd"];
    $costos[5] = $prodMayorCosto[5]["precioProd"] * $prodMayorCosto[5]["cantProd"];
    $costos[6] = $prodMayorCosto[6]["precioProd"] * $prodMayorCosto[6]["cantProd"];
    $costos[7] = $prodMayorCosto[7]["precioProd"] * $prodMayorCosto[7]["cantProd"];
    $costos[8] = $prodMayorCosto[8]["precioProd"] * $prodMayorCosto[8]["cantProd"];
    $costos[9] = $prodMayorCosto[9]["precioProd"] * $prodMayorCosto[9]["cantProd"];
    $costos[10] = $prodMayorCosto[10]["precioProd"] * $prodMayorCosto[10]["cantProd"];
    $costos[11] = $prodMayorCosto[11]["precioProd"] * $prodMayorCosto[11]["cantProd"];
    
    return ($costos);
}


/** Traduce del número del mes al string del mes
 * @param int $numMes
 * @return string
 */
function intToString ($numMes){
    // $stringMes
    //Se evalúa el mes correspondiente al número ingresado por PARÁMETRO
    if ($numMes == 0){
        $stringMes = "enero";
    }elseif ($numMes == 1){
        $stringMes = "febrero";
    }elseif ($numMes == 2){
        $stringMes = "marzo";
    }elseif ($numMes == 3){
        $stringMes = "abril";
    }elseif ($numMes == 4){
        $stringMes = "mayo";
    }elseif ($numMes == 5){
        $stringMes = "junio";
    }elseif ($numMes == 6){
        $stringMes = "julio";
    }elseif ($numMes == 7){
        $stringMes = "agosto";
    }elseif ($numMes == 8){
        $stringMes = "septiembre";
    }elseif ($numMes == 9){
        $stringMes = "octubre";
    }elseif ($numMes == 10){
        $stringMes = "noviembre";
    }elseif ($numMes == 11){
        $stringMes = "diciembre";
    }
    
    return ($stringMes);
}

/** Traduce del string del mes al int del mes
 * @param string $stringMes
 * @return int
 */
function stringToInt ($stringMes){
    // $stringMes
    //Se evalúa el mes correspondiente al número ingresado por PARÁMETRO
    if ($stringMes == "enero"){
        $numMes = 0;
    }elseif ($stringMes == "febrero"){
        $numMes = 1;
    }elseif ($stringMes == "marzo"){
        $numMes = 2;
    }elseif ($stringMes == "abril"){
        $numMes = 3;
    }elseif ($stringMes == "mayo"){
        $numMes = 4;
    }elseif ($stringMes == "junio"){
        $numMes = 5;
    }elseif ($stringMes == "julio"){
        $numMes = 6;
    }elseif ($stringMes == "agosto"){
        $numMes = 7;
    }elseif ($stringMes == "septiembre"){
        $numMes = 8;
    }elseif ($stringMes == "octubre"){
        $numMes = 9;
    }elseif ($stringMes == "noviembre"){
        $numMes = 10;
    }elseif ($stringMes == "diciembre"){
        $numMes = 11;
    }
    
    return ($numMes);
}

// MÓDULOS DE CADA OPCIÓN DEL MENÚ PRINCIPAL //

/** 1) Ingresar compra de un juguete
 * @return array
 */
function opcionUnoA (){
    //array $datosProducto
    
    //se inicializa el arreglo
    $datosProducto = [];
    
    //se piden los datos del producto y se guardan en el arreglo datosProducto
    echo "Ingrese el nombre del producto: ";
    $datosProducto ["nombre"] = trim(fgets(STDIN));
    
    echo "Ingrese el precio Unitario de cada ".$datosProducto["nombre"].": ";
    $datosProducto ["precio"] = trim(fgets(STDIN));
    
    echo "Ingrese las cantidades compradas (unidades enteras): ";
    $datosProducto ["cantidad"] = trim(fgets(STDIN));
    
    
    return $datosProducto;
}
/** Se pide el mes de la compra
 * @return int $numeroMesProd
 */
function opcionUnoB (){
    //string $nombreMes
    //int $numeroMesProd
    
    //se pide el mes en STRING
    echo "Ingrese el mes de la compra: ";
    $nombreMes = trim(fgets(STDIN));
    $nombreMes = strtolower($nombreMes); //En caso de que el usuario ingrese el mes en mayús, se pasa a minús
    
    //se invoca al traductor para pasar string del mes a ENTERO
    $numeroMesProd = stringToInt($nombreMes);
    
    echo "\nIngreso de datos finalizado.\n";
    
    return $numeroMesProd;
}
/** actualiza el arreglo $costos
 * @param int $numeroMesProd
 * @param float $precioXcant
 * @param array $costos
 * @return array
 */
function opcionUnoC ($numeroMesProd, $datosProducto, $costos){
    //array $costos
    
    //Actualización del Costo Total de compras de juguetes, del mes ingresado
    $costos[$numeroMesProd] = $costos [$numeroMesProd] + ($datosProducto["precio"] * $datosProducto ["cantidad"]);
    
    return $costos;
}
/** Actualiza el arreglo $prodMayorCosto
 * @param array $costos
 * @param array $prodMayorCosto
 * @param int $numeroMesProd
 * @param array $datosProducto
 * @return array
 */
function opcionUnoD ($costos, $prodMayorCosto, $numeroMesProd, $datosProducto){
    //array $prodMayorCosto
    
    //Actualización del prod de mayor costo sólo si el juguete es más caro que el más caro existente del mes
    if ($datosProducto["precio"] > $prodMayorCosto[$numeroMesProd]["precioProd"]){      //si el precio del Nuevo producto es mayor al precio del prod de mayor costo...
        
        $prodMayorCosto[$numeroMesProd]["prod"] = $datosProducto["nombre"];
        $prodMayorCosto[$numeroMesProd]["precioProd"] = $datosProducto["precio"];
        $prodMayorCosto[$numeroMesProd]["cantProd"] = $datosProducto["cantidad"];
        
    }
    
    return $prodMayorCosto;
}



/** Muestra los datos de un mes
 * 
 * @param array $costos
 * @param array $prodMayorCosto
 * @param int $numMes
 */
function mostrarInfo($costos, $prodMayorCosto, $numMes) {
    //string $nombreMes
    
    //se invoca al traductor para tener el string del mes
    $nombreMes = intToString($numMes);
    
    // Se muestra la información
    echo "\nMostrando información del mes de: (".$nombreMes.")\n";
    
    echo "El juguete con mayor costo: ".$prodMayorCosto[$numMes]["prod"]."\n";
    echo "Cantidad comprados: ".$prodMayorCosto[$numMes]["cantProd"]."\n";
    echo "Precio unitario: ".$prodMayorCosto[$numMes]["precioProd"]."\n";
    echo "Costo acumulado por compras del mes de ".$nombreMes. ": $".$costos[$numMes];
}



function opcionTres ($costos, $prodMayorCosto) {
    //int $i
    //boolean $encontrado
    //string $nombreMes2

    echo "Ingrese un monto límite de compra: $";
    $monto = trim(fgets(STDIN));
    
    $i = 0;
    $encontrado = false;
    
    //mientras el valor del costo del mes límite no sea encontrado...
    while ($i < count($costos) && $encontrado == false) {
        
        if ($costos[$i] > $monto) {         //si el valor el costo del mes es mayor a monto limite, imprimir ése mes
            
            
            $nombreMes2 = intToString($i);
            echo "\nEl primer mes que supera el monto límite establecido "."($".$monto.") "." es el mes de: [".$nombreMes2."]\n";
            
            // Se muestra la información
            mostrarInfo($costos, $prodMayorCosto, $i);

            $encontrado = true;
            
        } 
        
        $i++;
        
    }
    
    if ($encontrado == false) {
    
        echo "No existe ningún mes que supere el monto límite establecido. \n";
        
    }
    
}


/**4) Muestra al usuario la información completa de un mes ingresado
 */
function opcionCuatro ($costos, $prodMayorCosto){
    //string $nombreMes
    //int $numeroMes
    
    echo "Ingrese el mes del que quiere ver la Info. Completa (minús.): ";
    $nombreMes = trim(fgets(STDIN));
    
    //Se pasa a minúscula
    $nombreMes = strtolower($nombreMes);
    
    //Se invoca al traductor para tener el int del mes ingresado
    $numeroMes = stringToInt($nombreMes);
    
    // Se muestra la información
    mostrarInfo($costos, $prodMayorCosto, $numeroMes);
}


/**5) Funcion de comparación del precioProd de cada producto en $prodMayorCosto(de mayor a menor)
 *
 * @param array $a
 * @param array $b
 * @return int
 */
function cmp($a, $b) {
    
    //Ahora se verifica en todos los meses el valor de precioProd para ir ordenando el arreglo
    if ($a["precioProd"] * $a["cantProd"] == $b["precioProd"] * $b["cantProd"]) {
        
        $orden = 0;
        
    } elseif($a["precioProd"] * $a["cantProd"] > $b["precioProd"] * $b["cantProd"]){
        
        $orden = -1;
        
    } else{
        
        $orden = 1;
    }
    
    return $orden;
}



// PROGRAMA PRINCIPAL //
//INT $eleccion, $numeroMesProg, $i, $numeroMes
//FLOAT $montoLimite, $costoMayorMes
//STRING $continuar, $nombreMesInput
//BOOLEAN $ingresoDeMonto
//ARRAY $datosProdProg, $prodMayorCosto, $costos

//Se pasan los retornos de ambos arrays al prog. principal
$prodMayorCosto = cargaProdMayorCosto();
$costos = costosMes($prodMayorCosto);


//Mientras el usuario desee continuar en el Sistema, se va a mostrar el menú principal y a ejecutar las acciones
Do{
    
    
    //Se invoca al Menú Principal y se espera la respuesta
    $eleccion = menuOpciones();
    
    //Según la decision del usuario, se va a ejecutar una opción
    if ($eleccion == 1){
        
        //Se guarda el arreglo que contiene los datos básicos del producto
        $datosProdProg = opcionUnoA();
        
        //se guarda el numero del mes resultante
        $numeroMesProg = opcionUnoB();
        
        //Se actualizan los datos del arreglo $costos
        $costos = opcionUnoC($numeroMesProg, $datosProdProg, $costos);
        
        //se actualiza $prodMayorCosto si el juguete ingresado es mayor al de mayor precio de su mes
        $prodMayorCosto = opcionUnoD($costos, $prodMayorCosto, $numeroMesProg, $datosProdProg);
        
        
    }elseif ($eleccion == 2){
        
        //El costo de Enero se pone como el mayor, para luego comparar con el costo del resto de los meses
        $costoMayorMes = $costos[0];
        $numeroMes = 0;
        
        //Se van a comparar los costos de cada mes con enero. El mayor de todos es el que quedará en la variable $nombreMayorMes,
        //y su costo en $costoMayorMes
        for ($i = 1; $i < count($costos); $i++) {
            if ($costos[$i] > $costoMayorMes) {
                $costoMayorMes = $costos[$i];
                $numeroMes = $i; //Se actualiza el índice del mes con mayor costo que Enero
            }
        }
        
        mostrarInfo($costos, $prodMayorCosto, $numeroMes);
        
    } elseif ($eleccion == 3){
        
        opcionTres($costos, $prodMayorCosto);
        
    } elseif ($eleccion == 4){
        
        echo "Ingrese el mes del año a analizar (minús.): ";
        $nombreMesInput = trim(fgets(STDIN));
        $nombreMesInput = strtolower($nombreMesInput);      //Se pasa el mes a minúscula
        
        //se invoca al traductor para tener el mes en NUMERO
        $numeroMes = stringToInt($nombreMesInput);
        
        mostrarInfo($costos, $prodMayorCosto, $numeroMes);
        
    } elseif ($eleccion == 5){
        
        uasort($prodMayorCosto, 'cmp');
        
        // Imprime el arreglo ya ordenado previamente, pero también mostrando las claves y sus respectivos valores
        print_r($prodMayorCosto);
        
    } elseif ($eleccion == 6){
        
        $continuar = "no";
        
    }
    
    if ($eleccion <> 6){
        //Se le pregunta al usuario si desea hacer otra acción
        echo "\n--------------------------------------------------------------------\n";
        echo "¿Desea continuar en el Sistema? (escriba ''si'' o ''no''): ";
        $continuar = trim(fgets(STDIN));
    }
    
} while ($continuar == "si" || $continuar == "SI" || $continuar == "s" || $continuar == "S");

//Mensaje final si el usuario sale del sistema
echo "\n----------------------------------\n";
echo "Sesión terminada.\n";
echo "----------------------------------";
