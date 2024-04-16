document.getElementById("addIngredientBtn").addEventListener("click", function () {
  const tableBody = document.querySelector("#ingredients_table tbody");
  const newRow = document.createElement("tr");
  const existingDropdown = document.querySelector("#ingredients_table select[name='amounts[]']");
  const newDropdown = existingDropdown.cloneNode(true);
  newDropdown.name = "amounts[]";
  newRow.innerHTML = `
  <td>
  <input type="text" name="ingredients[]"
      class="w-full text-gray-800 dark:text-gray-200 py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
</td>
<td>
  <input type="text" name="quantities[]"
      class="w-full text-right text-gray-800 dark:text-gray-200 py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
</td>
<td>`;



  newRow.querySelector("td:nth-child(3)").appendChild(newDropdown);

  tableBody.appendChild(newRow);

  // Add event listener to remove the last ingredient
  const removeIngredientBtn = newRow.querySelector(".removeIngredientBtn");
  removeIngredientBtn.addEventListener("click", function () {
    const lastRow = tableBody.querySelector("tr:last-child");
    lastRow.remove();
  });

  // Check if there is more than one ingredient row
  const ingredientRows = tableBody.querySelectorAll("tr");
  if (ingredientRows.length > 1) {
    // Show the existing button
    document.getElementById("removeIngredientBtn").style.display = "block";
  }
});

document.getElementById("removeIngredientBtn").addEventListener("click", function () {
  const tableBody = document.querySelector("#ingredients_table tbody");
  const ingredientRows = tableBody.querySelectorAll("tr");

  // Check if there is more than one ingredient row
  if (ingredientRows.length > 1) {
    // Remove the last ingredient row
    const lastRow = ingredientRows[ingredientRows.length - 1];
    lastRow.remove();

    // Hide the existing button if there is only one ingredient row left
    if (ingredientRows.length === 1) {
      document.getElementById("removeIngredientBtn").style.display = "none";
    }
  }
});