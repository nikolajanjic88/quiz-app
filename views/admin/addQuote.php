<?php include_once 'inc/head.php' ?>

<body>
<?php include_once 'inc/header.php' ?>
    <div class="main-container">
        <div class="navcontainer">
            <?php include_once 'inc/nav.php' ?>
        </div>
        <div class="main">
            <div class="form-group">
                <form action="/add-quote" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <h2 class="heading">Add New Quote</h2> 
                    </div>
                    <textarea name="text" placeholder="Audio Text"></textarea>
                    <?php if(isset($errors['text'])): ?>
                        <p class="error"><?= $errors['text'] ?></p>
                    <?php endif ?>
                    <select name="lore_id">
                    <option value="">-- Choose lore --</option>
                        <?php foreach ($lores as $lore): ?>
                            <option value="<?= $lore['id'] ?>">
                                <?= htmlspecialchars($lore['title']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(isset($errors['lore_id'])): ?>
                        <p class="error"><?= $errors['lore_id'] ?></p>
                    <?php endif ?>
                    <input type="file" name="audio">
                        <?php if(isset($errors['audio'])): ?>
                            <p class="error"><?= $errors['audio'] ?></p>
                        <?php endif ?>
                    <button class="save-button">Save</button>
                </form> 
            </div> 
        </div>
    </div>
<?php include_once 'inc/footer.php' ?> 