// JavaScript code
function addTask() {
  const taskInput = document.getElementById("taskInput");
  const taskText = taskInput.value;

  if (taskText.trim() === "") {
    alert("Silakan masukkan aktivitas.");
    return;
  }

  const taskList = document.getElementById("taskList");

  const li = document.createElement("li");
  li.innerHTML = `
        ${taskText}
        <button class="complete" onclick="completeTask(this)">✓</button>
        <button class="edit" onclick="editTask(this)">✎</button>
        <button class="delete" onclick="deleteTask(this)">✗</button>
    `;

  taskList.appendChild(li);
  taskInput.value = "";
}

function deleteTask(button) {
  const taskList = document.getElementById("taskList");
  taskList.removeChild(button.parentElement);
}

function editTask(button) {
  const taskText = button.parentElement.firstChild.textContent;
  const newTaskText = prompt("Edit aktivitas:", taskText);

  if (newTaskText !== null) {
    button.parentElement.firstChild.textContent = newTaskText;
  }
}

function completeTask(button) {
  button.parentElement.classList.toggle("completed");
}
