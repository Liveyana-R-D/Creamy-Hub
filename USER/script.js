// script.js

document.addEventListener('DOMContentLoaded', () => {
    const dropdownImg = document.getElementById('dropdown-img');
    const dropdownMenu = document.getElementById('dropdown-menu');

    dropdownImg.addEventListener('click', () => {
        // Toggle the display of the dropdown menu
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
        } else {
            dropdownMenu.style.display = 'block';
        }
    });

    // Close the dropdown menu if clicked outside
    document.addEventListener('click', (event) => {
        if (!dropdownImg.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});
