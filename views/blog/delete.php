<?php include ROOT . '/views/layouts/header.php'; ?>
<?php if ($checkAuthor): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">    
                <div class="row">
                    <h4>Удалить запись #<?php echo $id; ?></h4>
                    <p>Вы действительно хотите удалить эту запись?</p>
                    <form method="post">
                        <input type="submit" name="submit" value="Удалить" />
                    </form> 
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php include ROOT . '/views/layouts/footer.php'; ?>
