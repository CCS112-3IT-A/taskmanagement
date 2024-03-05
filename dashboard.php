<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Task Management System Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style rel="stylesheet" href="style.css">
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

.header {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  text-align: center;
}

.navbar {
  background-color: #333;
  overflow: hidden;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
  transition: background-color 0.3s;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.navbar a.active {
  background-color: #007bff;
}

.container {
  max-width: 1200px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.stats-container {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
}

.stats-box {
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
}

.stats-box h2 {
  margin: 0;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #007bff;
  color: #fff;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #e9ecef;
}

.edit-btn, .delete-btn {
  background-color: transparent;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.edit-btn:hover, .delete-btn:hover {
  background-color: #f8f9fa;
}

.edit-btn, .delete-btn {
  margin: 2px;
}

td:last-child {
  text-align: center;
}
</style>

<body>

<div class="header">
    <h1 class="small-header">Task Management System</h1>
</div>

<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Dashboard</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Add Task</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row stats-container">
        <div class="col s4">
            <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">To-Do</span>
                    <p id="todo-count">0 tasks</p>
                </div>
            </div>
        </div>
        <div class="col s4">
            <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Pending</span>
                    <p id="pending-count">0 tasks</p>
                </div>
            </div>
        </div>
        <div class="col s4">
            <div class="card blue-grey darken-1 hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Finished</span>
                    <p id="finished-count">0 tasks</p>
                </div>
            </div>
        </div>
    </div>

    <table id="task-table" class="highlight">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Task 1: Complete HTML and CSS</td>
                <td>March 15, 2024</td>
                <td>In Progress</td>
                <td>Create HTML and CSS layout for the Task Management System dashboard.</td>
                <td>
                    <a href="#"><i class="material-icons">edit</i></a>
                    <a href="#" class="delete-btn" onclick="confirmDelete(0)"><i class="material-icons">delete</i></a>
                </td>
            </tr>
            <tr>
                <td>Task 2: Implement JavaScript</td>
                <td>March 20, 2024</td>
                <td>Not Started</td>
                <td>Add JavaScript functionality for task manipulation.</td>
                <td>
                    <a href="#"><i class="material-icons">edit</i></a>
                    <a href="#" class="delete-btn" onclick="confirmDelete(1)"><i class="material-icons">delete</i></a>
                </td>
            </tr>
            <tr>
                <td>Task 3: Add Task Management Features</td>
                <td>March 25, 2024</td>
                <td>Finished</td>
                <td>Add features like task deletion, editing, and status updates.</td>
                <td>
                    <a href="#"><i class="material-icons">edit</i></a>
                    <a href="#" class="delete-btn" onclick="confirmDelete(2)"><i class="material-icons">delete</i></a>
                </td>
            </tr>
            <!-- Additional tasks can be added here -->
        </tbody>
    </table>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h4>Delete Task</h4>
        <p>Are you sure you want to delete this task?</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        <a href="#" id="deleteTaskBtn" class="waves-effect waves-red btn-flat">Delete</a>
    </div>
</div>

<script>
    // Function to handle task deletion
    function deleteTask(row) {
        // Display confirmation prompt
        if (confirm("Are you sure you want to delete this task?")) {
            // Remove the task row from the table
            row.remove();
            // Recalculate task counts
            countToDoTasks();
            countTasks();
        }
    }

    // Attach event listeners to delete buttons
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            const row = this.closest('tr');
            deleteTask(row);
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    function countTasks() {
        const tableRows = document.querySelectorAll("#task-table tbody tr");
        let pendingCount = 0;
        let finishedCount = 0;

        tableRows.forEach(row => {
            const status = row.cells[2].textContent;
             if (status === "In Progress") {
                pendingCount++;
            } else if (status === "Finished") {
                finishedCount++;
            }
        });
        document.getElementById("pending-count").textContent = pendingCount + " tasks";
        document.getElementById("finished-count").textContent = finishedCount + " tasks";
    }

    function countToDoTasks() {
        const tableRows = document.querySelectorAll("#task-table tbody tr");
        const todoCount = tableRows.length;
        document.getElementById("todo-count").textContent = todoCount + " tasks";
    }

    countToDoTasks();
    countTasks();
    </script>
</body>
</html>
