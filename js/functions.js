/*
    
        *@AUTHOR: Jeison Steven Paspur

*/

function loadData(body){
    /*  Funcion encargada de enviar la petición al controlador, y de  
        recibir los datos del contralador para mostrarlos en el index 
        (view), recibe  como parametro la variable body que indica
        el nombre de la etiqueta HTML donde se va a mostrar los datos.

        @param{string}: body 
    */
    const tabla = document.querySelector("#"+body);
    tabla.innerHTML ='';
        const opciones ={
            method : 'POST'
        }
        fetch('./controllers/controller.php',opciones)
        .then(respuesta  => respuesta.json())
        .then(resultado =>{
           Object.values(resultado).forEach(value =>{
                Object.values(value).forEach(valor =>{
                    tabla.innerHTML += `
                            <tr>
                                <th scope="row">${valor.id}</th>
                                <td>${valor.contact_no}</td>
                                <td>${valor.lastname}</td>
                                <td>${valor.createdtime}</td>
                            </tr>
                `
                });
            });
        });
}