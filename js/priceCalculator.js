document.addEventListener('DOMContentLoaded', function() {
    const storageSelect = document.getElementById('storage');
    const colorSelect = document.getElementById('color');
    const priceDisplay = document.getElementById('price');

    function updatePrice() {
        const storage = storageSelect.value;
        const color = colorSelect.value;
        const iphoneId = document.querySelector('input[name="iphone_id"]').value;

        fetch(`getPrice.php?iphone_id=${iphoneId}&storage=${storage}&color=${color}`)
            .then(response => response.json())
            .then(data => {
                priceDisplay.textContent = data.price !== undefined ? data.price : 'N/A';
            })
            .catch(error => console.error('Error fetching price:', error));
    }

    storageSelect.addEventListener('change', updatePrice);
    colorSelect.addEventListener('change', updatePrice);

    updatePrice(); // Initial price update
});
