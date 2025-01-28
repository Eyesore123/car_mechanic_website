<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="./Assets/49678197.png">
    <title>Yhteydenotto</title>
</head>
<body>
    <canvas id="canvas"></canvas>
    <script>
    // Get the canvas element and its context
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    let gradientOffset = 0;
    let direction = 0;
    let fadeAmount = 0; // Variable to control the fade amount
    let fadeDirection = 1; // 1 for fading in, -1 for fading out

    function drawGradient() {
        // Clear the canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Create a new linear gradient with dynamic direction
        let gradient;
        if (direction === 0) {
            // Horizontal gradient (left to right)
            gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
        } else if (direction === 90) {
            // Vertical gradient (top to bottom)
            gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
        } else if (direction === 180) {
            // Diagonal (top-left to bottom-right)
            gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
        } else if (direction === 270) {
            // Reverse diagonal (top-right to bottom-left)
            gradient = ctx.createLinearGradient(canvas.width, 0, 0, canvas.height);
        }

        // Define color stops with a fade effect
        const whiteAlpha = Math.abs(Math.sin(fadeAmount)); // Calculate alpha based on fadeAmount
        gradient.addColorStop(0, '#00b0df');
        gradient.addColorStop(0.5 + Math.sin(gradientOffset) * 0.5, `rgba(209, 233, 246, ${whiteAlpha * 0.85})`); // Use rgba for fading
        gradient.addColorStop(1, '#00b0df');

        // Use the dynamic gradient as the fill style
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        gradientOffset += 0.001;

        // Change direction every time the offset exceeds a full cycle (arbitrary value of 2π)
        if (gradientOffset > Math.PI * 2) {
            // Reset the offset for the next cycle
            gradientOffset = 0;

            // Change direction by 90 degrees
            direction = (direction + 90) % 360; // Cycle through 0, 90, 180, 270
        }

        // Fade effect logic
        fadeAmount += fadeDirection * 0.5; // Adjust the fade speed
        if (fadeAmount > Math.PI / 2 || fadeAmount < 0) {
            fadeDirection *= -.4; // Reverse fade direction when limits are reached
        }

        requestAnimationFrame(drawGradient);
    }

    drawGradient();

</script>
    <div class="content">
    <a href="index.html" class="button-link">
        <h1>
            <img id="icon" src="./Assets/49678197.png" alt="PNP-POWER" width="100px" height="100px">
            Henkilöautojen huolto ja korjaus
        </h1>
    </a>
        <br><br>
        
        <h1>Yhteydenotto</h1><br>

        <div class="whitetext">
            <form id="contact_form" action="https://formspree.io/f/mdkobbvw" method="POST">
                <label for="name">Nimi:</label><br><br>
                <input type="text" id="name" name="name" autocomplete="name" required><br><br>

                <label for="email">Sähköposti:</label><br><br>
                <input type="email" id="email" name="email" autocomplete="email" required><br><br>

                <label for="message">Viesti:</label><br><br>
                <textarea id="message" name="message" autocomplete="off" required></textarea><br><br>

                <!-- Simple Math CAPTCHA -->
                <br><label for="captcha">Paljonko on 3 + 4 + 15? <br>
                    (Vastaus numeroina):<br><br></label>
                <input type="text" id="captcha" name="captcha" required><br><br>

                <div class="wrapper"><button class="gallery-button" type="submit" name="submit" value="submit">
                    Lähetä
                    </button>
                </div>
            </form>
        </div>

        <div class="wrapper">
        <a href="index.html"><div class="buttoncontainer">
                <button class="gallery-button" type="button" name="gallerybutton">
                    Etusivulle
                </button></a>
            </div>
        </div>

        <footer class="footer" style="text-align: center">
            <p class="footer-text">&copy; 2024 PNP-POWER, Niko Putkinen.</p>
        </footer>
    </div>

    <script>
document.getElementById('contact_form').addEventListener('submit', async function (e) {
    e.preventDefault(); // Prevent default form submission

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            // Redirect to success page
            window.location.href = 'success.html';
        } else {
            // Handle error, display an error message, or redirect to an error page
            alert('Viestiä ei voitu lähettää. Yritä uudelleen myöhemmin.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Yhteysvirhe. Yritä uudelleen.');
    }
});
</script>


    <script src="/galleryimages.js"></script>
</body>
</html>
