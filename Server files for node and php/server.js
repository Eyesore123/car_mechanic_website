const express = require('express');
const path = require('path');
require('dotenv').config({ path: path.join(__dirname, '.env/.env') });

const app = express();

// Serve static files from the 'public' directory
app.use(express.static(path.join(__dirname)));

// API route to send Google Maps API key to client

app.get('/api/key', (req, res) => {
    res.json({ key: process.env.GMAPS_API_KEY });
  });

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

const PORT = process.env.PORT || 4173;


// Start the server
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
