const inputBox = document.getElementById('inputBox');
const addBtn = document.getElementById('addBtn');
const todolist = document.getElementById('todolist');
let editTodo = null;


const addTodo = () => {
    const inputText = inputBox.value.trim();
    if (inputText.length <= 0) {
        alert("Écris quelque chose à faire !");
        return false;
    }

    if (addBtn.value === "Edit") {
        editTodo.target.previousElementSibling.innerHTML = inputText;
        addBtn.value = "Add";
        inputBox.value = "";
        editTodo = null;
        saveLocalTodos();
        return;
    }

    const li = document.createElement("li");

  
    const p = document.createElement("p");
    p.innerHTML = inputText;
    li.appendChild(p);

   
    const deleteBtn = document.createElement("button");
    deleteBtn.innerText = "Remove";
    deleteBtn.classList.add("btn", "deleteBtn");
    li.appendChild(deleteBtn);

    // Créer bouton Modifier
    const editBtn = document.createElement("button");
    editBtn.innerHTML = "Edit";
    editBtn.classList.add("btn", "editBtn");
    li.appendChild(editBtn);

    // Ajouter la tâche à la liste
    todolist.appendChild(li);

    // Réinitialiser le champ
    inputBox.value = "";

    
    saveLocalTodos();
};


const updateTodo = (e) => {
    if (e.target.innerHTML === "Remove") {
        e.target.parentElement.remove();
        deleteLocalTodos(e.target.parentElement);
    }

    if (e.target.innerHTML === "Edit") {
        inputBox.value = e.target.previousElementSibling.innerHTML;
        inputBox.focus();
        addBtn.value = "Edit";
        editTodo = e;
    }
};


function saveLocalTodos() {
    const todos = [];
    document.querySelectorAll("#todolist p").forEach(p => {
        todos.push(p.innerHTML);
    });
    localStorage.setItem("todos", JSON.stringify(todos));
}


function getLocalTodos() {
    const todos = JSON.parse(localStorage.getItem("todos")) || [];
    todos.forEach(todo => {
        const li = document.createElement("li");
        const p = document.createElement("p");
        p.innerHTML = todo;
        li.appendChild(p);

        const deleteBtn = document.createElement("button");
        deleteBtn.innerText = "Remove";
        deleteBtn.classList.add("btn", "deleteBtn");
        li.appendChild(deleteBtn);

        const editBtn = document.createElement("button");
        editBtn.innerHTML = "Edit";
        editBtn.classList.add("btn", "editBtn");
        li.appendChild(editBtn);

        todolist.appendChild(li);
    });
}


function deleteLocalTodos(liElement) {
    const todos = JSON.parse(localStorage.getItem("todos")) || [];
    const text = liElement.querySelector("p").innerHTML;
    const index = todos.indexOf(text);
    if (index > -1) {
        todos.splice(index, 1);
        localStorage.setItem("todos", JSON.stringify(todos));
    }
}


document.addEventListener('DOMContentLoaded', getLocalTodos);
addBtn.addEventListener('click', addTodo);
todolist.addEventListener('click', updateTodo);
