document.addEventListener('DOMContentLoaded', function() {
    const allergensContainer = document.querySelector('.allergens-container');
    const allergensContent = document.querySelector('.allergens-content');

    const adjustAllergensHeight = function() {
        const containerHeight = allergensContainer.offsetHeight;
        const contentHeight = allergensContent.offsetHeight;
        if (contentHeight > containerHeight) {
            allergensContainer.style.height = `${contentHeight}px`;
        } else {
            allergensContainer.style.height = 'auto';
        }
    };

    window.addEventListener('load', adjustAllergensHeight);
    window.addEventListener('resize', adjustAllergensHeight);
});