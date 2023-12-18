document.addEventListener("DOMContentLoaded", function () {
    const faqItems = document.querySelectorAll(".faqq");

    faqItems.forEach((item) => {
        const toggleButton = item.querySelector(".toggle");
        const answer = item.querySelector(".reponse");

        toggleButton.addEventListener("click", function () {
            item.classList.toggle("activeee");
            if (item.classList.contains("activeee")) {
                toggleButton.textContent = "-";
            } else {
                toggleButton.textContent = "+";
            }
        });
    });
});

var clientSelect = document.getElementById('clientSelect');

clientSelect.addEventListener('change', function() {
var selectedOption = clientSelect.value;

if (selectedOption === 'clientinfo') {
    window.location.href = 'clients.php';
    } else if (selectedOption === 'clientaccounts') {
    window.location.href = 'comptsclient.php';
    } else if (selectedOption === 'clienttransactions') {
    window.location.href = 'transactionsclient.php';
    }
});






   


