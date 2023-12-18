








var selectElement1 = document.getElementById('selectOptions1');

selectElement1.addEventListener('change', function() {
    var selectedOption = selectElement1.value;
    
    if (selectedOption === 'users') {
        window.location.href = 'users.php';
    } else if (selectedOption === 'accounts') {
        window.location.href = 'accounts.php';
    } else if (selectedOption === 'transactions') {
        window.location.href = 'transactions.php';
    } else if (selectedOption === 'clients') {
        window.location.href = 'clients.php';
    }
});
