<?php include_once 'inc/head.php' ?>

<body>
    <?php include_once 'inc/header.php' ?>
    <div class="main-container">
        <div class="navcontainer">
            <?php include_once 'inc/nav.php' ?>
        </div>
        <div class="main">
            <div class="quotes-grid">
                <?php foreach ($quotes as $quote): ?>
                    <div class="quote-item">
                    <div class="quote-body">
                        <p class="quote-line">
                        "<?= $quote['quote'] ?>"
                        </p>
                        <span class="quote-name">
                        — <?= $quote['title'] ?>
                        </span>
                    </div>
                    <div class="quote-footer">
                        <form method="POST" action="/quote" onsubmit="return confirm('Are you sure you want to delete this quote?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?php echo $quote['id']; ?>">
                            <button class="btn-delete" type="submit">
                                ✕
                            </button>
                        </form>
                    </div>
                    </div>
                <?php endforeach; ?>             
            </div>
            <ul class="pagination">
                <?php if(isset($_GET['page']) && $_GET['page'] > 1): ?>
                    <li>       
                    <a href="/all-quotes?page=1">First</a>        
                    </li>
                    <li>       
                    <a href="/all-quotes?page=<?= $_GET['page'] - 1 ?>">Previous</a>        
                    </li>
                <?php endif ?>
                <li class="<?= !isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == 'page=1' ? 'active' : '' ?>">
                    <a href="/all-quotes?page=1">1</a>
                </li>
                <?php for($i = 2; $i <= $pages; $i++): ?>
                <li class="<?= isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'page=' . $i ? 'active' : '' ?>">
                    <a href="/all-quotes?page=<?= $i ?>"><?= $i ?></a>
                </li>
                <?php endfor ?>
                <?php if(!isset($_GET['page'])): ?>
                    <li>
                        <a href="/all-quotes?page=2">Next</a>
                    </li>
                <?php elseif($_GET['page'] < $pages): ?>
                    <li>
                        <a href="/all-quotes?page=<?= $_GET['page'] + 1 ?>">Next</a>
                    </li>
                    <li>
                        <a href="/all-quotes?page=<?= $pages ?>">Last</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
<?php include_once 'inc/footer.php' ?> 