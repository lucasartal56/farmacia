

const getInicios = async (alerta='si') => {
    console.log(alerta)
    const cliente = formulario.factura_cliente.value.trim()
    const producto = formulario.factura_producto.value.trim()
    const cantidad = formulario.factura_cantidad.value.trim()
    const fecha = formulario.factura_fecha.value.trim()
    const url = `/farmacia/controllers/facturas/index.php?factura_cliente=${cliente}&factura_producto=${producto}&factura_cantidad=${cantidad}&factura_fecha=${fecha}`
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablaFacturas.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;

        if (respuesta.status == 200) {
            if(alerta =='si'){

                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Facturas Encontradas',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
                
            }
            if (data.length > 0) {
                data.forEach(factura => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const celda5 = document.createElement('td')
                    const celda6 = document.createElement('td')
                    const celda7 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = factura.cliente_nit;
                    celda3.innerText = factura.producto_nombre;
                    celda4.innerText = factura.factura_cantidad;
                    celda5.innerText = factura.factura_fecha;

                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-warning', 'w-100')
                    buttonModificar.addEventListener('click', () => llenardatos(factura))


                    buttonEliminar.textContent = 'Eliminar';
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100');
                    buttonEliminar.addEventListener('click', () => eliminarFactura(factura.factura_id));

                    celda6.appendChild(buttonModificar)
                    celda7.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    tr.appendChild(celda5)
                    tr.appendChild(celda6)
                    tr.appendChild(celda7)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay Facturas Disponibles'
                td.colSpan = 5;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            console.log('hola');
        }

        tablaFacturas.tBodies[0].appendChild(fragment)
    } catch (error) {
        console.log(error);
    }
}