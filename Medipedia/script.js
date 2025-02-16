document.addEventListener('DOMContentLoaded', () => {
    const prescriptionList = document.getElementById('prescription-items');
  
    // Fetch prescriptions from the server
    fetch('/prescriptions')
    .then(response => response.json())
    .then(prescriptions => {
        const listItem = document.createElement('li');
        listItem.innerHTML='<h3>Patient:${prescriptions.patientName}</h3><p>Doctor:${prescription.doctorName}</p><p>Prescriptions:${prescription.prescription}<p>';
        prescriptionList.appendChild(listItem);
    });
    })
      .catch(error=>console.error('error fetching prescription:',error));
