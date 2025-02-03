<header>
  <div class="logosec">
    <a href="/menu">
      <div class="logo">Silmarilion Quiz</div>
    </a>
  </div>
  <?php if(urlIs('/all-questions')): ?>
    <form action="" method="GET">
      <div class="searchbar">
        <input type="text" name="search" placeholder="Search Question">
        <button class="searchbtn">
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" 
                    alt="search-icon">
        </button>
      </div>
    </form>
  <?php endif ?>
</header>