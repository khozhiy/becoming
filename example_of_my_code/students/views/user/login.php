<?php include ROOT . '/views/layouts/header.php'; ?>
    <style>
        .btn-default{
            margin-bottom: 10px;
        }
        .signup-form{
            margin-top: 150px;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <? echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form" align="center"><!--sign up form-->
                        <h2>Вход на сайт</h2>
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/></br>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/></br>
                            <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                        </form>
                    </div><!--/sign up form-->


                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>
<?php include ROOT . '/views/layouts/footer.php'; ?>