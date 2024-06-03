document.addEventListener('DOMContentLoaded', function() {
    const avatar = document.querySelector('.nav__profile');
    avatar.addEventListener('click', function() {
        const dropdown = avatar.querySelector('ul');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function(e) {
        if (!avatar.contains(e.target)) {
            const dropdown = avatar.querySelector('ul');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Get the elements
    var navToggleOpen = document.getElementById('open__nav-btn');
    var navToggleClose = document.getElementById('close__navbtn');
    var navItems = document.querySelector('.nav__items');

    // Event listener to open the nav and switch buttons
    navToggleOpen.addEventListener('click', function() {
        navItems.style.display = 'flex'; // Assuming flex layout
        navToggleOpen.style.display = 'none';
        navToggleClose.style.display = 'block';
    });

    // Event listener to close the nav and switch buttons
    navToggleClose.addEventListener('click', function() {
        navItems.style.display = 'none';
        navToggleClose.style.display = 'none';
        navToggleOpen.style.display = 'block';
    });
});