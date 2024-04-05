document.getElementById('filterForm').addEventListener('submit', function(event) {
    var filterRoute = "{{ route('recipes.index') }}";
    event.preventDefault();
  
    
    const selectedAllergens = [];
    const selectedDifficulties = [];
  
    const allergenCheckboxes = document.querySelectorAll('input[name="allergens[]"]:checked');
    for (const checkbox of allergenCheckboxes) {
      selectedAllergens.push(checkbox.value);
    }
  
    const difficultyCheckboxes = document.querySelectorAll('input[name="difficulties[]"]:checked');
    for (const checkbox of difficultyCheckboxes) {
      selectedDifficulties.push(checkbox.value);
    }
  
    
    let queryString = '';
    if (selectedAllergens.length > 0) {
      queryString += `allergens[]=${selectedAllergens.join('&allergens[]=')}`;
    }
    if (selectedDifficulties.length > 0) {
      if (queryString.length > 0) {
        queryString += '&';
      }
      queryString += `difficulties[]=${selectedDifficulties.join('&difficulties[]=')}`;
    }
  
    const xhr = new XMLHttpRequest();
    xhr.open('POST',  filterRoute);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    xhr.onload = function() {
      if (xhr.status === 200) {
        
        console.log('Filtering successful:', xhr.responseText);
      } else {
        console.error('Error filtering recipes:', xhr.statusText);
      }
    };
  
    xhr.onerror = function(error) {
      console.error('Error sending request:', error);
    };
  
    xhr.send(queryString);
  });
  
  document.getElementById('resetFilters').addEventListener('click', function() {
    const allergenCheckboxes = document.querySelectorAll('input[name="allergens[]"]');
    for (const checkbox of allergenCheckboxes) {
      checkbox.checked = false;
    }
  
    const difficultyCheckboxes = document.querySelectorAll('input[name="difficulties[]"]');
    for (const checkbox of difficultyCheckboxes) {
      checkbox.checked = false;
    }
  });