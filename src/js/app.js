import { showEntrada, showNewButton, showNotifications, showSalida, showUser } from "./functions.js";
import { getSearchInput } from "./search.js";

window.addEventListener("DOMContentLoaded", () => {
    showNewButton();
    showNotifications();
    showUser();
    showEntrada();
    showSalida();

});