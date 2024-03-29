document.getElementById('filterForm').addEventListener('submit', function(event) {
    var filterRoute = "{{ route('recipes.index') }}";
    event.preventDefault();

    var selectedAllergens = [];
    var allergenCheckboxes = document.querySelectorAll('input[name="allergens[]"]:checked');
    allergenCheckboxes.forEach(function(checkbox) {
        selectedAllergens.push(checkbox.value);
    });

    var selectedDifficulties = [];
    var difficultyCheckboxes = document.querySelectorAll('input[name="difficulty[]"]:checked');
    difficultyCheckboxes.forEach(function(checkbox) {
        selectedDifficulties.push(checkbox.value);
    });

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);

            } else {
                console.error('Error: ' + xhr.status);
            }
        }
    };
    
    var queryString = '?allergens[]=' + selectedAllergens.join('&allergens[]=') +
                      '&difficulties[]=' + selectedDifficulties.join('&difficulties[]');
    
    xhr.open('GET', filterRoute + queryString);
    xhr.send();
});

document.getElementById('resetFilters').addEventListener('click', function() {

    document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.checked = false;
    });
});
