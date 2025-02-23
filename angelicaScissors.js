document.addEventListener("DOMContentLoaded", function () {
    const imageGallery = document.getElementById("imageGallery");

    // Array of image filenames (update this list when adding new images)
    const imageList = [
        "colores.jpg",
        "colores2.jpg"
        "colores3.jpg"
        // Add more images here as needed
    ];

    // Loop through each image and add it to the gallery
    imageList.forEach(image => {
        let imgElement = document.createElement("img");
        imgElement.src = `images/${image}`;
        imgElement.alt = "Haircut Image";
        imageGallery.appendChild(imgElement);
    });
});
