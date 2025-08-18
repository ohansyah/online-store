document.addEventListener('DOMContentLoaded', function () {
    let index = 1;
    const total = 5;
    const bullets = document.querySelectorAll('#carousel-bullets a');
    const carousel = document.querySelector('#hot-deals-carousel');

    function goToSlide(newIndex) {
        index = newIndex;

        // Move only the carousel, not the whole page
        const slideWidth = carousel.offsetWidth;
        carousel.scrollTo({
            left: (index - 1) * slideWidth,
            behavior: 'smooth'
        });

        // Update bullet colors
        bullets.forEach((bullet, i) => {
            bullet.classList.toggle('bg-brand-darker', i + 1 === index);
            bullet.classList.toggle('bg-brand-lightest', i + 1 !== index);
        });
    }

    // Auto-slide every 7s
    setInterval(() => {
        goToSlide(index % total + 1);
    }, 7000);

    // Click bullets
    bullets.forEach(bullet => {
        bullet.addEventListener('click', () => {
            goToSlide(parseInt(bullet.dataset.slide));
        });
    });
});
