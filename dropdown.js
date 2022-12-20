var categoriesObject = {
  "Type_1": {
    "Category 1": ["1) Sub-Category 1", "1) Sub-Category 2", "1) Sub-Category 3", "1) Sub-Category 4"],
    "Category 2": ["2) Sub-Category 1", "2) Sub-Category 2", "2) Sub-Category 3", "2) Sub-Category 4"],
    "Category 3": ["3) Sub-Category 1", "3) Sub-Category 2", "3) Sub-Category 3", "3) Sub-Category 4"]    
  },
  "Type_2": {
    "Category A": ["A) Sub-Category 1", "A) Sub-Category 2", "A) Sub-Category 3", "A) Sub-Category 4"],
    "Category B": ["B) Sub-Category 1", "B) Sub-Category 2", "B) Sub-Category 3", "B) Sub-Category 4"],
    "Category C": ["C) Sub-Category 1", "C) Sub-Category 2", "C) Sub-Category 3", "C) Sub-Category 4"]
  }
  
}
window.onload = function() {
  
var typeSel = document.getElementById("type");
var categorySel = document.getElementById("category");
var subCategorySel = document.getElementById("subCategory");

  for (var x in categoriesObject) {
    typeSel.options[typeSel.options.length] = new Option(x, x);
  }

  typeSel.onchange = function() {
    subCategorySel.length = 1
    categorySel.length = 1;
    for (var y in categoriesObject[this.value]) {
      categorySel.options[categorySel.options.length] = new Option(y, y);
    }
  }

  categorySel.onchange = function() { 
    subCategorySel.length = 1
    var z = categoriesObject[typeSel.value][this.value];

    for (var i = 0; i < z.length; i++) {
      subCategorySel.options[subCategorySel.options.length] = new Option(z[i], z[i]);
    }
  }
}