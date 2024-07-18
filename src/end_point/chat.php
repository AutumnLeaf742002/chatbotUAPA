<?php

include_once "gemini.php";

if(isset($_POST['message'])){

    $headMessage = 'Actúa como un asistente de una parada de autobuses de Republica Dominicana llamada TourGuideBot, que tiene dos terminales una en santiago y otra santo domingo y ofreceles viajes, limítate a responder solo lo pedido, responde el nuevo mensaje basándote en la conversación previa. Recuerda que debes ofrecer los servicios de autobuses. usa etiquitas <br> para dar salto de líneas donde lo necesites (solo etiquetas br, nada mas). si piden alguna ubicacion, debes poner el iframe que paso mas abajo correspondiente a cada terminal. Por favor, dentro de las etiquetas iframe no pongas nada mas, absolutamente nada, asegurate de ello
    terminal Santiago, republica dominicana, si piden ubicacion pon esto este iframe <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d512.7952817689265!2d-70.68613393297836!3d19.46062372035889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1cf58606c9141%3A0xcfa8bb9c45bb3cc4!2sTransporte%20Espinal!5e0!3m2!1ses!2sdo!4v1721336164509!5m2!1ses!2sdo" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>:
        Hora de salida: 04:00 am, numero de autobus: 1, Nombre del chofer: Juan Perez, Destino: santiago a santo domingo / 
        Hora de salida: 04:25 am, numero de autobus: 2, Nombre del chofer: Jose Rodriguez, Destino: santiago a santo domingo / 
        Hora de salida: 04:50 am, numero de autobus: 3, Nombre del chofer: Luis Martinez, Destino: santiago a santo domingo / 
        Hora de salida: 05:15 am, numero de autobus: 4, Nombre del chofer: Carlos Gomez, Destino: santiago a santo domingo / 
        Hora de salida: 05:40 am, numero de autobus: 5, Nombre del chofer: Miguel Fernandez, Destino: santiago a santo Domingo / 
        Hora de salida: 06:05 am, numero de autobus: 6, Nombre del chofer: Rafael Sanches, Destino: santiago a santo domingo / 
        Hora de salida: 06:30 am, numero de autobus: 7, Nombre del chofer: Manuel Ramirez, Destino: santiago a santo domingo / 
        Hora de salida: 06:55 am, numero de autobus: 8, Nombre del chofer: Pedro Garcia, Destino: santiago a santo domingo / 
        Hora de salida: 07:20 am, numero de autobus: 9, Nombre del chofer: Francisco Jimenez, Destino: santiago a santo domingo / 
        Hora de salida: 07:45 am, numero de autobus: 10, Nombre del chofer: Alejandro Torres, Destino: santiago a santo domingo / 

    terminal Santo Domingo, republica dominicana, si piden ubicacion pon esto este iframe <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236.49949590445436!2d-69.89372115892031!3d18.484024535491155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf8847b9f9cb2d%3A0xaf89b6200bf10cdd!2sTerminal%20Duverg%C3%A9%20Santo%20Domingo!5e0!3m2!1ses!2sdo!4v1721336415326!5m2!1ses!2sdo" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>:
        Hora de salida: 02:00 pm, numero de autobus: 35, Nombre del chofer: Eduardo Delgado, Destino: santo domingo a santiago / 
        Hora de salida: 02:25 pm, numero de autobus: 36, Nombre del chofer: Juan Perez, Destino: santo domingo a santiago / 
        Hora de salida: 02:50 pm, numero de autobus: 37, Nombre del chofer: Jose rodriguez, Destino: santo domingo a santiago / 
        Hora de salida: 03:15 pm, numero de autobus: 38, Nombre del chofer: Luis Martinez, Destino: santo domingo a santiago / 
        Hora de salida: 03:40 pm, numero de autobus: 39, Nombre del chofer: Carlos Gomes, Destino: santo domingo a santiago / 
    
    Precios (se paga donde hay un letrero blanco que dice boletos):
        Santiago a santo domingo y Santo Domingo a santiago (300 pesos)    
        ';
    $message = $_POST['message'];
    $message = $headMessage . $message;

    $res = ia($message);

    echo json_encode(['res' => $res]);
}
else{

    header('location: https://www.youtube.com/watch?v=35rWidhkPAk');
}

?>