export function getSearchInput() {
    const searchInput = document.querySelector("#buscarInsumo");
    searchInput.addEventListener("input", getSearchInputValue);
}

function getSearchInputValue() {
    let value = this.value;
    getData(value);
}

async function getData(insumoDescripcion) {
    try {
        const url = "http://localhost:3000/api/insumos";
        const res = await fetch(url, {
            method: "POST",
            body: new URLSearchParams("insumoDescripcion=" + insumoDescripcion)
        });
        const insumos = await res.json();
        insertDataOnTable(insumos);
    }
    catch (error) {
        console.log(error);
    }
}

function insertDataOnTable(insumos) {
    insumos.forEach(insumo => {
        const { id, clave, descripcion } = insumo;

    });
}