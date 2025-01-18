// Suggest farmer names based on RSBA number
function suggestFarmerNames() {
    var rsbaSearch = document.getElementById('rsbaSearch').value;

    if (rsbaSearch) {
        fetch('get_farmer_names.php?rsba=' + rsbaSearch)
        .then(response => response.json())
        .then(data => {
            const farmerSelect = document.getElementById('distributedTo');
            farmerSelect.innerHTML = '<option value="">Select Farmer</option>'; // Clear previous options

            if (data.farmers && data.farmers.length > 0) {
                data.farmers.forEach(farmer => {
                    const option = document.createElement('option');
                    option.value = farmer.id; // Use farmer's unique ID
                    option.textContent = farmer.name;
                    farmerSelect.appendChild(option);
                });
            } else {
                alert('No farmers found for the provided RSBA number.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error fetching farmer names.');
        });
    }
}



// Populate the batch name dropdown
function populateBatchDropdown() {
    const batchDropdown = document.getElementById('distributionBatchId');
    batchDropdown.innerHTML = ''; // Clear previous options

    batchData.forEach(batch => {
        const option = document.createElement('option');
        option.value = batch.batchId;
        option.textContent = `${batch.batchName} - ${batch.batchNumber}`;
        batchDropdown.appendChild(option);
    });
}
