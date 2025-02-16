const express = require('express');
const bodyParser = require('body-parser');

// Create an instance of Express
const app = express();

// Middleware to parse the request body
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Endpoint for handling login requests
app.post('/login', (req, res) => {
  const { username, password } = req.body;

  // Perform authentication logic here (e.g., check username and password against database)

  // Example: check if the username is 'admin' and the password is 'password'
  if (username === 'admin' && password === 'password') {
    // Authentication successful
    res.json({ message: 'Login successful' });
  } else {
    // Authentication failed
    res.status(401).json({ message: 'Invalid username or password' });
  }
});

// Start the server
app.listen(3000, () => {
  console.log('Server started on port 3000');
});