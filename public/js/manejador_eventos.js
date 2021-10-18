import {abrirModal,cerrarModal,abrirModalTarea,abrirModalModificarTarea} from "./controlador_modal.js";
/**
 * Este evento esta encargado de capturar todos los clicks que se realizan en el documento
 * de esta manera se puede saber que elemento genero el evento
 */
document.addEventListener("click",(evento)=>{

     if(evento.target.matches("#agregarHistoria")){
        abrirModal();
     }

     if(evento.target.matches("#cerrarVentana")){
        cerrarModal("cerrarVentana");
     }

     if(evento.target.matches("#agregarTarea")){
        abrirModalTarea();
     }

     if(evento.target.matches(".modificarTarea")){
         console.log("entre");
        abrirModalModificarTarea(evento.target.id);
     }
});

/**
 * setTimeout encargado de eliminar los mensajes de error
 */
setTimeout(() => {
    const $mensaje = document.querySelector('.error'),
    $elemento = $mensaje.parentNode;
    $elemento.removeChild($mensaje);

}, 4000);

/**
 * setTimeout encargado de eliminar los mensajes de exito
 */
setTimeout(() => {
    const $mensaje2 = document.querySelector('.exito'),
    $elemento2 = $mensaje2.parentNode;
    $elemento2.removeChild($mensaje2);
}, 4000);
