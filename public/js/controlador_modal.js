/**
 * Funcion encargada de abrir el modal para registrar una historia de usuario
 */
export  function abrirModal() {

    let $clonTemplate = document.importNode(document.getElementById('template-modal-historia').content,true);
    const $contenedor = document.getElementById('contenedor-ventana'),
    $contenedorPanel = document.getElementById('contenedor-panel-control'),
    $fragmento = document.createDocumentFragment();

    $contenedor.innerHTML="";
    $contenedorPanel.classList.add("opacidad");
    $fragmento.appendChild($clonTemplate);
    $contenedor.appendChild($fragmento);

    setTimeout(() => {
        const $contenedorModal = document.getElementById('div-modal');
        $contenedorModal.classList.add("opacidad");
    }, 100);

}

/**
 * Funcion encargada de cerrar el modal desde el panel de control
 */
export  function cerrarModal() {
    const $contenedor = document.getElementById('contenedor-ventana'),
    $contenedorPanel = document.getElementById('contenedor-panel-control'),
    $contenedorModal = document.getElementById('div-modal');
    $contenedorModal.classList.remove("opacidad");
    $contenedorPanel.classList.remove("opacidad");

    setTimeout(() => {
        $contenedor.innerHTML ="";
    }, 400);
}

/**
 * Funcion encargada de abrir el modal para crear una nueva tarea
 */
export  function abrirModalTarea() {

    let $clonTemplate = document.importNode(document.getElementById('template-modal-Tarea').content,true);
    const $contenedor = document.getElementById('contenedor-ventana'),
    $contenedorPanel = document.getElementById('contenedor-panel-control'),
    $fragmento = document.createDocumentFragment();

    $contenedor.innerHTML="";
    $contenedorPanel.classList.add("opacidad");
    $fragmento.appendChild($clonTemplate);
    $contenedor.appendChild($fragmento);

    setTimeout(() => {
        const $contenedorModal = document.getElementById('div-modal');
        $contenedorModal.classList.add("opacidad");
    }, 100);

}

/**
 * Funcion encargada de abrir el modal para modificar una tarea
 * @param {*} id id del elemento html
 */
export  function abrirModalModificarTarea(id) {

    let $clonTemplate = document.importNode(document.getElementById('template-modal-Tarea_modificar').content,true);
    const $contenedor = document.getElementById('contenedor-ventana'),
    $contenedorPanel = document.getElementById('contenedor-panel-control'),
    $fragmento = document.createDocumentFragment();

    $contenedor.innerHTML="";
    $contenedorPanel.classList.add("opacidad");

    $fragmento.appendChild($clonTemplate);
    $contenedor.appendChild($fragmento);

    let $input = document.createElement("input");
    const $formulario = document.getElementById('formulario-modificar-tarea')
    $input.name = "idTareaModificacion";
    $input.type = "hidden";
    $input.value = document.getElementById(id).getAttribute("value");
    $formulario.appendChild($input);

    setTimeout(() => {
        const $contenedorModal = document.getElementById('div-modal');
        $contenedorModal.classList.add("opacidad");
    }, 100);
}
