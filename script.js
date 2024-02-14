// Espera a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los botones de compra
    var buyButtons = document.querySelectorAll('.buy-button');

    // Define una variable para almacenar el total
    var totalPrice = 0;

    // Itera sobre cada botón de compra
    buyButtons.forEach(function(button) {
        // Agrega un evento click a cada botón
        button.addEventListener('click', function() {
            // Obtiene el precio del producto del atributo data-price
            var price = parseFloat(button.getAttribute('data-price'));
            
            // Aumenta el total con el precio del producto
            totalPrice += price;

            // Actualiza el texto del total a pagar en el HTML
            document.getElementById('total-price').textContent = '$' + totalPrice.toFixed(2);
        });
    });
});
