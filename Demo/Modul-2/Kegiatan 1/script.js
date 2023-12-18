function clearDisplay() {
  document.getElementById("display").value = "";
}

function deleteLastCharacter() {
  var display = document.getElementById("display");
  display.value = display.value.slice(0, -1);
}

function appendToDisplay(value) {
  document.getElementById("display").value += value;
}

function calculateResult() {
  const display = document.getElementById("display");
  try {
    const result = eval(display.value.replace("^", "**").replace("%", "/10"));
    display.value = result;
  } catch (error) {
    display.value = "Error";
  }
}
