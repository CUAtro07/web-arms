const express = require('express');
const bodyParser = require('body-parser');
const connection = require('./db'); // Database connection
const bcrypt = require('bcryptjs'); // Import bcrypt for hashing passwords

const app = express();
const port = 3000;

// Middleware to parse JSON and URL-encoded data
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Test route
app.get('/', (req, res) => {
    res.send('Welcome to the ARMS System!');
});

// Sign-up route
app.post('/signup', (req, res) => {
    const userData = req.body;

    // Add the user to the database with hashed password
    addUser(userData, res);
});

// Function to add user with password hashing
function addUser(userData, res) {
    const { firstName, middleInitial, lastName, rsbaNumber, contactNumber, barangay, homeAddress, farmSize, farmLocation, password } = userData;

    // Hash the password before storing it
    bcrypt.hash(password, 10, (err, hashedPassword) => {
        if (err) {
            console.error('Error hashing password:', err);
            return res.status(500).send('Error processing password');
        }

        // SQL query to insert user into the database
        const query = `INSERT INTO users (first_name, middle_initial, last_name, rsba_number, contact_number, barangay, home_address, farm_size, farm_location, password)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

        // Execute the query
        connection.query(query, [firstName, middleInitial, lastName, rsbaNumber, contactNumber, barangay, homeAddress, farmSize, farmLocation, hashedPassword], (err, results) => {
            if (err) {
                console.error('Error inserting user:', err);
                return res.status(500).send('Error adding user');
            }
            console.log('User added to the database with ID:', results.insertId);
            res.status(200).send(`User added with ID: ${results.insertId}`);
        });
    });
}

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
