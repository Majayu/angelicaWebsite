document.addEventListener("DOMContentLoaded", function () {
    // 🖼️ IMAGE GALLERY LOGIC
    const imageGallery = document.getElementById("imageGallery");

    // Updated image list with your images
    const imageList = [
        "colores.jpg",
        "colores2.jpg",
        "colores3.jpg"
    ];

    // Loop through images and add to gallery
    imageList.forEach(image => {
        let imgElement = document.createElement("img");
        imgElement.src = `images/${image}`;
        imgElement.alt = "Haircut Image";
        imageGallery.appendChild(imgElement);
    });

    // ✂️ BOOKING FORM LOGIC
    const bookingForm = document.getElementById("bookingForm");

    bookingForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent page reload

        // Collect form data
        const formData = {
            name: document.getElementById("name").value,
            phone: document.getElementById("phone").value,
            email: document.getElementById("email").value,
            service: document.getElementById("service").value,
            appointment_date: document.getElementById("appointmentDate").value
        };

        // Send data to booking.php using Fetch API
        fetch("booking.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Show success/error message
        })
        .catch(error => {
            alert("Error booking appointment.");
        });
    });
});
