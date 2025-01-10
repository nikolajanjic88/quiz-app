<?php include_once 'inc/head.php' ?>

<body>
  <?php include_once 'inc/header.php' ?>
  <div class="main-container">
    <div class="navcontainer">
      <?php include_once 'inc/nav.php' ?>
    </div>
    <div class="main">
      <div class="searchbar2">
        <input type="text" 
                name="" 
                id="" 
                placeholder="Search">
        <div class="searchbtn">
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                class="icn srchicn" 
                alt="search-button">
        </div>
      </div>
      <div class="box-container">
        <div class="box box1">
          <div class="text">
            <h2 class="topic-heading"><?= $userCount ?></h2>
            <h2 class="topic">Numer of Registered Users</h2>
          </div>
        </div>
        <div class="box box1">
          <div class="text">
            <h2 class="topic-heading"><?= $questionCount ?></h2>
            <h2 class="topic">Current number of questions</h2>
          </div>
        </div>
        <div class="box box1">
          <div class="text">
            <h2 class="topic-heading"><?= $scoreCount ?></h2>
            <h2 class="topic">Number of Saved Gamescores</h2>
          </div>
        </div>             
      </div>
      <div class="report-container">
        <div class="report-header">
            <h1 class="recent-Articles">Recent Added Questions</h1>
            <a href="/all-questions"><button class="view">View All</button></a>
        </div>
        <div class="report-body">
          <div class="report-topic-heading">
              <h3 class="t-op">Question</h3>
              <h3 class="t-op">Status</h3>
          </div>
          <div class="items">
            <?php foreach($recentQuestions as $recentQuestion): ?>
              <div class="item1">
                <h3 class="t-op-nextlvl"><?= $recentQuestion['question'] ?></h3>
                <h3 class="t-op-nextlvl label-tag">Published</h3>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once 'inc/footer.php' ?> 