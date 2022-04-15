/* Validacion por lado del frontend */
function validate() {

    const name_category = document.getElementById("category_name");
    const statuscategory = document.getElementById("category");
    const error_message = document.getElementById("error_message");

    error_message.style.padding = "8px";
    var text;

    if (name_category.value === "") {
        text = "Por favor ingrese nombre Categoria valida";
        error_message.innerHTML = text;
        return false;
    }

    if (statuscategory.value === '0') {
        text = "Por favor ingrese estado valido";
        error_message.innerHTML = text;
        return false;
    }
}
