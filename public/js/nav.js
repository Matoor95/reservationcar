document.addEventListener("DOMContentLoaded", () => {
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector(".mobile-menu-button");
    const mobileMenu = document.querySelector(".mobile-menu");
    const closeButton = document.querySelector(".close-button");

    const closeMobileMenu = () => {
        mobileMenu.classList.add("hide");
        mobileMenu.classList.remove("show");
        setTimeout(() => {
            mobileMenu.style.display = 'none';
        }, 300); // match this duration with the slideOut animation duration
    };

    mobileMenuButton.addEventListener("click", () => {
        if (mobileMenu.style.display === 'none' || mobileMenu.classList.contains("hide")) {
            mobileMenu.style.display = 'flex';
            setTimeout(() => {
                mobileMenu.classList.add("show");
                mobileMenu.classList.remove("hide");
            }, 10); // Slight delay to trigger the animation
        } else {
            closeMobileMenu();
        }
    });

    closeButton.addEventListener("click", closeMobileMenu);

    window.addEventListener("click", function (e) {
        if (!e.target.closest(".mobile-menu") && !e.target.closest(".mobile-menu-button")) {
            if (mobileMenu.style.display === 'flex') {
                closeMobileMenu();
            }
        }
    });

    // Ensure the menu is hidden on page load
    if (!mobileMenu.classList.contains("show")) {
        mobileMenu.style.display = 'none';
    }

    // Add active class to clicked links
    const allLinks = document.querySelectorAll(".link");
    allLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();

            // Remove the 'active' class from any currently active link
            allLinks.forEach(function(l) {
                l.classList.remove("active");
            });

            // Add the 'active' class to the clicked link
            link.classList.add("active");

            // Redirect to the href of the link
            window.location.href = link.href;
        });
    });
});
