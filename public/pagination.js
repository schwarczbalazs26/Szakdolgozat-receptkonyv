let currentPage = 1;
const maxPage = document.getElementById('pagination-links').getAttribute('data-last-page');

window.onscroll = function() {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
        if (currentPage < maxPage) {
            currentPage++;
            loadMoreRecipes(currentPage);
        }
    }
};

function loadMoreRecipes(page) {
    const url = `{{ route('recipes.index') }}?page=${page}`;
    fetch(url)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const newDoc = parser.parseFromString(html, 'text/html');
            const recipesContainer = document.getElementById('recipeContainer');
            const paginationLinks = document.getElementById('pagination-links');

            const newRecipes = newDoc.getElementById('recipeContainer').innerHTML;
            const newPaginationLinks = newDoc.getElementById('pagination-links').innerHTML;

            recipesContainer.innerHTML += newRecipes;
            paginationLinks.innerHTML = newPaginationLinks;
        })
        .catch(error => console.error('Error:', error));
}