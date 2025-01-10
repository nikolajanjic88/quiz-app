<header>
  <div class="logosec">
    <a href="/menu">
      <div class="logo">Silmarilion Quiz</div>
    </a>
    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
              class="icn menuicn" 
              id="menuicn" 
              alt="menu-icon">
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
  <div class="message">
    <div class="circle"></div>
    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" 
              class="icn" 
              alt="">
    <div class="dp">
      <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                class="dpicn" 
                alt="dp">
    </div>
  </div>
</header>