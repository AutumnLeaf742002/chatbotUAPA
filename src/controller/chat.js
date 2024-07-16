// dom elements
const $chat = document.getElementById('chat')
const $btnSend= document.getElementById('btnSend')
const $inputSend = document.getElementById('inputSend')
const $iaWriting = document.getElementById('iaWriting')
const $resetCount = document.getElementById('resetCount')
let $messages = document.getElementById('messages')
let historial = ''

// function to add message in chat
function addMessage(client, message){

    // create container for message
    let div = document.createElement('div')
    div.classList.add('text-white', 'w-4/5', 'sm:w-2/3', 'md:w-1/2', 'flex', 'flex-col', 'gap-1', 'rounded-lg', 'p-2')
    if(client === true){
        div.classList.add('self-end')
        div.style.backgroundColor = 'var(--red_pink)'
    }
    else{
        div.classList.add('float-left')
        div.style.backgroundColor = 'var(--dark)'
    }

    // create header for a message
    let h1 = document.createElement('h1')
    h1.classList.add('text-md', 'font-bold')
    if(client === true){
        h1.textContent = 'Tu:'
    }
    else{
        h1.textContent = 'TourGuideBot:'
    }

    let p = document.createElement('p')
    p.classList.add('text-md', 'leading-5', 'text-slate-100')
    message = message.replace('"', '')
    p.innerHTML = message

    // append message
    div.appendChild(h1)
    div.appendChild(p)
    $chat.append(div)
}

// send message
$btnSend.addEventListener('click', ()=>{

    $iaWriting.classList.remove('hidden')

    const message = $inputSend.value

    if(message.length > 0 && message.length <= 300){

        if($messages.textContent >= 1 && $messages.textContent <= 10){

            historial += `usuario: ${message}, `

            addMessage(true, message)
            $chat.scrollTop = $chat.scrollHeight;

            $messages.textContent = $messages.textContent - 1

            const data = new FormData()
            data.append('message', ` / conversacion previa: ${historial}/ nuevo mensaje: ${message}`)

            const url = 'end_point/chat.php'

            fetch(url, {
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(data => {
                $iaWriting.classList.add('hidden')
                addMessage(false, data.res)
                $inputSend.value = ''
                historial += `respuesta ia: ${message}, `
                $chat.scrollTop = $chat.scrollHeight;
            })
            .catch(error => {
                console.error('Error:', error)
            });
        }
        else{
            alert('Has alcanzado el máximo de mensajes permitidos (10), por favor reinicie presionando el boton de arriba a la izquierda')
            $inputSend.value = ''
            $iaWriting.classList.add('hidden')
            $chat.scrollTop = $chat.scrollHeight;
        }
    }

    else{
        alert('Por favor ingrese un mensaje válido (entre 1 y 300 caracteres)')
    }
})

// pressing Enter to send
$inputSend.addEventListener('keypress', function(event) {

    if (event.keyCode === 13 || event.which === 13) {

        $btnSend.click();
    }
});

// reset counter
$resetCount.addEventListener('click', ()=>{
    $messages.textContent = 10
    historial = ''
    $chat.textContent = ''
    $inputSend.value = ''
    $iaWriting.classList.add('hidden')
    $chat.scrollTop = $chat.scrollHeight;
})