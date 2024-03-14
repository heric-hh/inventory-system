import { getSearchInput } from "./search.js";

export function showNewButton() {
    const newBtn = document.querySelector(".header__new");
    newBtn.addEventListener("click", showNewMenu);
}

function showNewMenu() {
    const header = document.querySelector(".header");
    const existingMenu = document.querySelector(".header__menu-new");

    if (existingMenu) {
        existingMenu.remove();
        this.textContent = "+ Nuevo";
        this.classList.remove("button-off");
    }
    else {
        const newMenuDiv = document.createElement("DIV");
        this.classList.add("button-off");
        this.textContent = "Cerrar";
        newMenuDiv.classList.add("header__menu-new");
        newMenuDiv.innerHTML = `
            <h3 class="header__menu-new__title"> Elige una categoría: </h3>
            <div class="header__menu-new__container"> 
                <a href="#"><button class="header__menu-new__button"> Nuevo Consumo </button></a>
                <a href="#"><button class="header__menu-new__button"> Registrar Insumo </button></a>
                <a href="#"><button class="header__menu-new__button"> Registrar Lote </button></a>
                <a href="#"><button class="header__menu-new__button"> Nuevo Usuario </button></a>
            </div>   
        `;
        header.appendChild(newMenuDiv);
    }
}

export function showNotifications() {
    const notify = document.querySelector("#header__notifications");
    notify.addEventListener("click", showNotificationsMenu);
}

function showNotificationsMenu() {
    const header = document.querySelector(".header");
    const existingNotifyMenu = document.querySelector(".header__notify-menu");

    if (!existingNotifyMenu) {
        const notifyMenu = document.createElement("DIV");
        notifyMenu.classList.add("header__notify-menu");
        notifyMenu.innerHTML = `
            <h3 class="header__menu-new__title"> Notificaciones: </h3>
                <div class="header__notify-menu__list-container">
                    <ul class="header__notify-menu__list" >
                        <li class="header__notify_menu__list__item">
                            <h4>Usuario: </h4>
                            <p>Ha realizado un <span> nuevo consumo </span> el día <strong> 29/01/2024 </strong> </p>
                        </li>
                    </ul>
                </div>
        `;
        header.appendChild(notifyMenu);
    } else {
        existingNotifyMenu.remove();
    }
}

export function showUser() {
    const userProfile = document.querySelector(".header__user-profile");
    userProfile.addEventListener("click", showUserMenu);
}

function showUserMenu() {
    const header = document.querySelector(".header");
    const exsitingUserMenu = document.querySelector(".header__user-menu");

    if (!exsitingUserMenu) {
        const userMenu = document.createElement("DIV");
        userMenu.classList.add("header__user-menu");
        userMenu.innerHTML = `
            <h3 class="header__user-menu__user">Usuario</h3>
            <a href="#"> <button class="header__user-menu__logout button-warning">Cerrar Sesión </button> </a>
        `;
        header.appendChild(userMenu);
    } else {
        exsitingUserMenu.remove();
    }
}

export function showEntrada() {
    const btnEntrada = document.querySelector("#btn-entrada").addEventListener("click", showEntradaForm);
}

function showEntradaForm() {
    const main = document.querySelector(".main-es");
    const existingEntradaForm = document.querySelector(".main-es__form-es");

    if (!existingEntradaForm) {
        this.textContent = "Cerrar";
        this.classList.add("enabled");
        const entradaForm = document.createElement("FORM");
        entradaForm.classList.add("main-es__form-es");
        entradaForm.innerHTML = `
            <h2 class="form-es__title">Llene el formulario:</h2>
            <fieldset class="form-es__fieldset">
                <legend class="form-es__legend">Dotación de Entrada:</legend>
        
                <label for="fecha" class="form-es__label">Fecha:</label>
                <input type="date" class="form-es__input" />
        
                <label for="tipo" class="form-es__label">Tipo de dotación:</label>
                <select id="tipo" class="form-es__select">
                    <option> Dotación Normal </option>
                    <option> Dotación Extraordinaria </option>
                </select>

                <h2 class="form-es__h2">Selecciona los insumos de la dotación:</h2>

                <label for="buscar_insumo" class="form-es__label"> Buscar: </label>
                <input class="form-es__input" name="buscar_insumo" id="buscarInsumo">
                
                <table class="form-es__table">
                    <thead class="insumos-table__head">
                        <tr class="insumos-table__tr">
                            <th class="insumos-table__th">Clave</th>
                            <th class="insumos-table__th">Descripción</th>
                            <th class="insumos-table__th">Categoría</th>
                            <th class="insumos-table__th">Añadir</th>
                        </tr>
                    </thead>
                </table>

                <input type="submit" value="Guardar" class="form-es__submit">
            </fieldset>
        `;
        main.appendChild(entradaForm);
        getSearchInput();
    }
    else {
        this.textContent = "Crear Entrada de Insumos";
        this.classList.remove("enabled");
        existingEntradaForm.remove();
    }
}

export function showSalida() {
    const btnSalida = document.querySelector("#btn-salida").addEventListener("click", showSalidaForm);
}

function showSalidaForm() {
    const main = document.querySelector(".main-es");
    const existingSalidaForm = document.querySelector(".main-es__form-es");

    if (!existingSalidaForm) {
        this.textContent = "Cerrar";
        this.classList.add("enabled");
        const salidaForm = document.createElement("FORM");
        salidaForm.classList.add("main-es__form-es");
        salidaForm.innerHTML = `
        <h2 class="form-es__title">Llene el formulario:</h2>
        <fieldset class="form-es__fieldset">
            <legend class="form-es__legend">Dotación de Salida:</legend>
    
            <label for="fecha" class="form-es__label">Fecha:</label>
            <input type="date" class="form-es__input" />

            <input type="submit" value="Guardar" class="form-es__submit">
        </fieldset>
        `;
        main.appendChild(salidaForm);

    }
    else {
        this.textContent = "Crear Salida de Insumos";
        this.classList.remove("enabled");
        existingSalidaForm.remove();
    }
}