export function getSearchInput() {
    const searchInput = document.querySelector("#buscarInsumo");
    searchInput.addEventListener("input", getSearchInputValue);
}

function getSearchInputValue() {
    let value = this.value;
    console.log(value);
}