document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchDropdown = document.getElementById('searchDropdown');
    let debounceTimer;

   
    function fetchSearchResults(query) {
        if (query.length === 0) {
            searchDropdown.innerHTML = '';
            searchDropdown.classList.add('hidden');
            return;
        }

        fetch(`/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                searchDropdown.innerHTML = '';

                data.forEach(recipe => {
                    const resultItem = document.createElement('div');
                    resultItem.classList.add('p-4', 'cursor-pointer', 'hover:bg-gray-200');

                    resultItem.innerHTML = `
                        <h2 class="text-lg font-semibold text-gray-800 mb-1">${recipe.title}</h2>
                    `;

                    resultItem.addEventListener('click', function () {
                        window.location.href = `/recipe/${recipe.id}`;
                    });

                    searchDropdown.appendChild(resultItem);
                });

                searchDropdown.classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
    }

    
    searchInput.addEventListener('input', function () {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function() {
            const query = searchInput.value.trim();
            fetchSearchResults(query);
        }, 300); // késleltetési idő  
    });

    
    searchInput.addEventListener('focusout', function () {
        const query = searchInput.value.trim();
        if (query.length === 0) {
            
            searchDropdown.innerHTML = '';
            searchDropdown.classList.add('hidden');
        }
    });
});
