// esto devuelve un array llamado botonesEditar, es una lista de que contiene todos los
// elementos que tengan .btn-edit
const botonesEditar= document.querySelectorAll(".btn-edit")
// aca obtenemos el modal
const modal= document.getElementById('modal')

botonesEditar.forEach(boton=>{
    boton.addEventListener('click', (e)=>{
        e.preventDefault()
        modal.classList.remove("hidden")

        // obtenemos el id de esa fila
        const id= boton.dataset.id
        // hacemos que el valor del imput de name "modalId" sea el mismo valor que recuperamos
        document.getElementById("modalId").value = id
    })
})

const modalCerrar= document.getElementById('btnCancelar')
modalCerrar.addEventListener('click', (e)=>{
    e.preventDefault
    modal.classList.add("hidden")
})