<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <div class="signup-form"><!--sign up form-->
                    <h2>Форма для отправки данных на сайт</h2>
                    <form action="#" method="post">
                        <input type="text" name="text" placeholder="Ваш текст" value="<?php echo $text; ?>"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Отправить" />
                    </form>
                </div><!--/sign up form-->
                <?php if($text):?>
                    <h2><?php echo $result?></h2>
                </div>
                <?php else: ?>
                    <div class="signup-form">
                        <h2>Вы еще не ввели текст</h2>
                        <h2>Пожалуйста заполните форму выше</h2>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>

