function queryDatabase() {
    const rollNumber = document.getElementById('queryRollNumber').value;

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                const resultDiv = document.getElementById('queryResult');

                if (response) {
                    const html = `
                        <p>Name: ${response.name}</p>
                        <p>Email: ${response.email}</p>
                        <p>Timestamp: ${response.timestamp}</p>
                    `;
                    resultDiv.innerHTML = html;
                } else {
                    resultDiv.innerHTML = 'Student not found.';
                }
            }
        }
    };

    xhr.open('GET', `query.php?roll_number=${rollNumber}`, true);
    xhr.send();
}