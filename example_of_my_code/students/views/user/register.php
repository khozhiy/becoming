<?php include ROOT . '/views/layouts/header.php'; ?>
    <style>
        .btn-default{
            margin-bottom: 10px;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4">

                    <?php if ($result): ?>
                        <p>Вы зарегистрированы!</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form" align="center"><!--sign up form-->
                            <h2>Регистрация на сайте</h2>
                            <form action="#" method="post">
                                <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/></br>
                                <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $surname; ?>"/></br>
                                <input type="text" name="gender" placeholder="Пол" value="<?php echo $gender ?>"/></br>
                                <input type="text" name="number_groop" placeholder="Номер группы" value="<?php echo $number_groop; ?>"/></br>
                                <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/></br>
                                <input type="text" name="number_balls" placeholder="Кол-во баллов" value="<?php echo $number_balls; ?>"/></br>
                                <input type="text" name="year_birth" placeholder="Год рождения" value="<?php echo $year_birth; ?>"/></br>
                                <input type="text" name="local_in_town" placeholder="Местный/приезжий" value="<?php echo $local_in_town; ?>"/></br>
                                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/></br>
                                <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                            </form>
                        </div><!--/sign up form-->

                    <?php endif; ?>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>
<?php include ROOT . '/views/layouts/footer.php'; ?>