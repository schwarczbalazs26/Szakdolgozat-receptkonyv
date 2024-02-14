<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modal.css">
</head>
<body>

    <!-- Button to open the modal -->
<button id="loginBtn">Login</button>

<!-- The modal -->
<div id="loginModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Login</h2>
    <form id="loginForm">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <button type="submit">Login</button>
    </form>
  </div>
</div>

    <script src="modal.js"></script>
    
</body>
</html>