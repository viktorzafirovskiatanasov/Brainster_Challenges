$(document).ready(function () {
  let isEdit = false;
  let editedRow;

  $("#budget-form").on("submit", function (e) {
    e.preventDefault();
    let inputBudget = $("#budget-input").val();
    if (inputBudget <= 0 || inputBudget == "") {
      $(".budget-feedback").text("Value cannot be empty or negative");
      $(".budget-feedback").addClass("showItem");
      return false;
    } else {
      updateBudget(inputBudget);
      $("#budget-input").val("");
    }
  });

  $("#budget-input").on("focus", function () {
    if ($(".budget-feedback").is(":visible")) {
      $(".budget-feedback").removeClass("showItem");
    }
  });

  $("#expense-form").on("submit", function (e) {
    e.preventDefault();
    let expense = $("#amount-input").val();
    let expenseTitle = $("#expense-input").val();
    if (expense == "" || expenseTitle == "") {
      $(".expense-feedback").text("Please fill in the form completely");
      $(".expense-feedback").addClass("showItem");
      return false;
    }

    if (isEdit) {
      let editedExpense = editedRow.find("td:nth-child(2)");
      let editedTitle = editedRow.find("td:first");
      editedTitle.text(`-${expenseTitle}`);
      editedExpense.text(expense);
      editedRow.toggle();
      if (expense < 0) {
        expense *= -1;
      }
      updateBudget(0, expense);
    } else {
      var lastDiv = $(".row > div:last");
      if (lastDiv.find("table").length === 0) {
        lastDiv.html(`
          <table class="text-center w-100">
            <thead>
              <tr>
                <th>Expense Title</th>
                <th>Expense Value</th>
                <th></th>
              </tr>
            </thead>
            <tbody id='table-body'></tbody>
          </table>
        `);
      }
      let tableBody = $("#table-body");
      tableBody.append(`
        <tr>
           <td class='expense-title info-title'>-${expenseTitle}</td>
           <td class='expense-amount info-title'>${expense}</td>
           <td>
             <a class="mr-2 edit"><i class="fa-solid fa-pen-to-square edit-icon"></i></a>
             <a class="delete"><i class="fa-solid fa-trash delete-icon"></i></a>
           </td>
        </tr>
      `);
      if (expense < 0) {
        expense *= -1;
      }
      updateBudget(0, expense);
    }
    $("#amount-input").val("");
    $("#expense-input").val("");
    isEdit = false;
  });

  $("#amount-input").on("focus", function () {
    if ($(".expense-feedback").is(":visible")) {
      $(".expense-feedback").removeClass("showItem");
    }
  });

  $("#expense-input").on("focus", function () {
    if ($(".expense-feedback").is(":visible")) {
      $(".expense-feedback").removeClass("showItem");
    }
  });

  $(".row > div:last").on("click", ".edit", function () {
    isEdit = true;
    editedRow = $(this).closest("tr");
    let expense = editedRow.find("td:nth-child(2)").text();
    let expenseTitle = editedRow.find("td:first").text().replace(/^-/, "");
    $("#amount-input").val(expense);
    $("#expense-input").val(expenseTitle);
    if (expense < 0) {
      expense *= -1;
    }
    updateBudget(0, expense * -1);
    editedRow.toggle();
  });

  $(".row > div:last").on("click", ".delete", function () {
    let row = $(this).closest("tr");
    let expense = parseFloat(row.find("td:nth-child(2)").text());
    row.remove();
    updateBudget(0, expense * -1);
  });

  let allExpenses = 0;
  let initialBudget = 0;

  function updateBudget(budget, expense = 0) {
    if (budget > 0) {
      initialBudget = budget;
    }
    allExpenses -= expense * -1;
    let balance = initialBudget - allExpenses;
    $("#budget-amount").text(initialBudget);
    $("#expense-amount").text(allExpenses);
    $("#balance-amount").text(balance);
    $("#balance").removeClass("showGreen showRed");
    if (balance > 0) {
      $("#balance").addClass("showGreen");
    } else {
      $("#balance").addClass("showRed");
    }
  }
});
