<nav class="nav">
  <div class="nav-upper-options">
    <a href="/dashboard" style="text-decoration: none;">
      <div class="nav-option <?= urlIs('/dashboard') ? 'option1' : '' ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
              class="nav-img" 
              alt="dashboard">
        <h3> Dashboard</h3>
      </div>
    </a>
    <a href="/all-questions" style="text-decoration: none;">
      <div class="nav-option <?= urlIs('/all-questions') ? 'option1' : '' ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
              class="nav-img">
        <h3>Questions</h3>
      </div>
    </a>
    <a href="/add-question" style="text-decoration: none;">
      <div class="nav-option <?= urlIs('/add-question') ? 'option1' : '' ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
              class="nav-img">
        <h3>Add New Question</h3>
      </div>
    </a>
    <a href="/all-lore" style="text-decoration: none;">
      <div class="nav-option <?= urlIs('/all-lore') ? 'option1' : '' ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
              class="nav-img">
        <h3>Character's Lore</h3>
      </div>
    </a>
    <a href="/add-lore" style="text-decoration: none;">
      <div class="nav-option <?= urlIs('/add-lore') ? 'option1' : '' ?>">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
              class="nav-img">
        <h3>Add New Lore</h3>
      </div>
    </a>
    <form action="/logout" method="POST">
      <input type="hidden" name="_method" value="DELETE">
      <button>
        <div class="nav-option logout">        
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                class="nav-img" 
                alt="logout">
          <h3>Logout</h3>       
        </div>
      </button>
    </form>    
  </div>
</nav>