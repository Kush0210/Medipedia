const express = require('express');
const mongoose = require('mongoose');

const app = express();
app.use(express.json());

// Connect to MongoDB
mongoose.connect('mongodb://localhost/medical', {
  useNewUrlParser: true,
  useUnifiedTopology: true,
});
const db = mongoose.connection;
db.on('error', console.error.bind(console, 'MongoDB connection error:'));

// Prescription Schema
const prescriptionSchema = new mongoose.Schema({
  patientName: String,
  doctorName: String,
  prescription: String,
});

const Prescription = mongoose.model('Prescription', prescriptionSchema);

// Store prescription
app.post('/prescriptions', (req, res) => {
  const { patientName, doctorName, prescription } = req.body;
  const newPrescription = new Prescription({ patientName, doctorName, prescription });
  newPrescription.save((err, savedPrescription) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error saving prescription');
    } else {
      res.status(200).send('Prescription saved successfully');
    }
  });
});

// Get all prescriptions
app.get('/prescriptions', (req, res) => {
  Prescription.find({}, (err, prescriptions) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error fetching prescriptions');
    } else {
      res.status(200).json(prescriptions);
    }
  });
});

// Start the server
const port = 3000;
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});