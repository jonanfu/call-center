let tipo_reporte = document.getElementById("tipo_reporte")
let buscar_cedula = document.getElementById("buscar_cedula")

const deshabilitar_buscar = value => {
    switch (value) {
        case "1":
            buscar_cedula.disabled = true
            break
        case "2":
            buscar_cedula.disabled = false
            break
    }
}

tipo_reporte.onchange = () => {
    deshabilitar_buscar(tipo_reporte.value)
}