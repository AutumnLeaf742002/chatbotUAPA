<?php

include_once "cors.php";
include_once "gemini.php";

if(validateCorsIp() === false){
    exit();
}

if(isset($_POST['message'])){

    $headMessage = "Actua como una asistente de una parada de autobuses de Republica Dominicana llamada TuBus, limitate a responder solo lo pedido, responde el nuevo mensaje basandote en la conversacion previa. Recuerda que debes ofrecer los servicios de autobuses. usa etiquitas <br> para dar salto de lineas donde lo necesites (solo etiquetas br, nada mas).
    terminal Santiago, republica dominicana:
        Hora de salida: 04:00 am, numero de autobus: 1, Nombre del chofer: Juan Perez, Destino: santiago a santo domingo / 
        Hora de salida: 04:25 am, numero de autobus: 2, Nombre del chofer: Jose Rodriguez, Destino: santiago a santo domingo / 
        Hora de salida: 04:50 am, numero de autobus: 3, Nombre del chofer: Luis Martinez, Destino: santiago a santo domingo / 
        Hora de salida: 05:15 am, numero de autobus: 4, Nombre del chofer: Carlos Gomez, Destino: santiago a santo domingo / 
        Hora de salida: 05:40 am, numero de autobus: 5, Nombre del chofer: Miguel Fernandez, Destino: santiago a santo domingo / 
        Hora de salida: 06:05 am, numero de autobus: 6, Nombre del chofer: Rafael Sanches, Destino: santiago a santo domingo / 
        Hora de salida: 06:30 am, numero de autobus: 7, Nombre del chofer: Manuel Ramirez, Destino: santiago a santo domingo / 
        Hora de salida: 06:55 am, numero de autobus: 8, Nombre del chofer: Pedro Garcia, Destino: santiago a santo domingo / 
        Hora de salida: 07:20 am, numero de autobus: 9, Nombre del chofer: Francisco Jimenez, Destino: santiago a santo domingo / 
        Hora de salida: 07:45 am, numero de autobus: 10, Nombre del chofer: Alejandro Torres, Destino: santiago a santo domingo / 

    terminal Santo Domingo, republica dominicana:
        Hora de salida: 02:00 pm, numero de autobus: 35, Nombre del chofer: Eduardo Delgado, Destino: santo domingo a santiago / 
        Hora de salida: 02:25 pm, numero de autobus: 36, Nombre del chofer: Juan Perez, Destino: santo domingo a santiago / 
        Hora de salida: 02:50 pm, numero de autobus: 37, Nombre del chofer: Jose rodriguez, Destino: santo domingo a santiago / 
        Hora de salida: 03:15 pm, numero de autobus: 38, Nombre del chofer: Luis Martinez, Destino: santo domingo a santiago / 
        Hora de salida: 03:40 pm, numero de autobus: 39, Nombre del chofer: Carlos Gomes, Destino: santo domingo a santiago / 
    ";
    $message = $_POST['message'];
    $message = $headMessage . $message;

    $res = ia($message);

    echo json_encode(['res' => $res]);
}
else{

    header('location: https://www.youtube.com/watch?v=35rWidhkPAk');
}

?>