<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmailJS Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>
<body>
    <h2>Contact Form</h2>
    <form id="emailForm">
        <input type="text" id="name" placeholder="Your Name" required><br><br>
        <input type="email" id="email" placeholder="Your Email" required><br><br>
        <textarea id="message" placeholder="Your Message" required></textarea><br><br>
        <button type="submit">Send Email</button>
    </form>

    <script>
        // Initialize EmailJS
        (function() {
            emailjs.init("renGjYk3L6jgTj5UU"); // Replace with your EmailJS Public Key
        })();

        document.getElementById("emailForm").addEventListener("submit", function(event) {
            event.preventDefault();

            // Collect form data
            var templateParams = {
                from_name: document.getElementById("name").value,
                from_email: document.getElementById("email").value,
                message: document.getElementById("message").value
            };

            // Send email using EmailJS
            emailjs.send("service_ovwfmpx", "template_61yanv1", templateParams)
                .then(function(response) {
                    alert("Email sent successfully!");
                    console.log("SUCCESS!", response);
                }, function(error) {
                    alert("Failed to send email. Please try again.");
                    console.log("FAILED...", error);
                });
        });
    </script>
</body>
</html>
