window.onload = function() {
    // Obtém os valores dos parâmetros da URL
    const urlParams = new URLSearchParams(window.location.search);
    const value = urlParams.get('value');
    const warningMessage = document.querySelector('.warning-message');

    if (value && value == 'false') {
        warningMessage.style.display = '';

        setTimeout(() => {
            warningMessage.style.display = "none";
        }, "4000")
    }

}