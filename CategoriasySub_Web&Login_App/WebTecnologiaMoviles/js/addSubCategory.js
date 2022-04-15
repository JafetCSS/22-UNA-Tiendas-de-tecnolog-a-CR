
/* Validacion por lado del frontend */
function validate() {

    const category = document.getElementById("category_root");
    const name_category = document.getElementById("subcategory_name");
    const statuscategory = document.getElementById("subcategory-status");
    const error_message = document.getElementById("error_message");

    error_message.style.padding = "8px";
    var text;

    if (category.value === '0') {
        text = "Por favor ingrese categoria valida";
        error_message.innerHTML = text;
        return false;
    }

    if (name_category.value === "") {
        text = "Por favor ingrese nombre Subcategoria valida";
        error_message.innerHTML = text;
        return false;
    }

    if (statuscategory.value === '0') {
        text = "Por favor ingrese estado valido";
        error_message.innerHTML = text;
        return false;
    }
}