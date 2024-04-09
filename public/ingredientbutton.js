document.getElementById("addIngredientBtn").addEventListener("click", function () {
  const tableBody = document.querySelector("#ingredients_table tbody");
  const newRow = document.createElement("tr");

  const existingDropdown = document.querySelector("#ingredients_table select[name='amounts[]']");

  const newDropdown = existingDropdown.cloneNode(true);

  newDropdown.name = "amounts[]";
  newRow.innerHTML = `
    <td>
    <input type="text" name="ingredients[]"
        class="w-full py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
</td>
<td>
    <input type="text" name="quantities[]"
        class="w-full text-right py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
</td>
<td>`;
  newRow.querySelector("td:nth-child(3)").appendChild(newDropdown);

  tableBody.appendChild(newRow);
});