<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <p>Данные отредактированы!</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form"><!--sign up form-->
                            <h2>Редактирование данных</h2>
                            <h4>Ваш E-mail: <?php echo $email;?></h4>
                            <form action="#" method="post">
                                <p>Имя:</p>
                                <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>

                                <p>Фамилия:</p>
                                <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $surname; ?>"/>

                                <p>Пол:</p>
                                <input type="text" name="gender" placeholder="Пол" value="<?php echo $gender; ?>"/>

                                <p>Номер группы:</p>
                                <input type="text" name="number_groop" placeholder="Номер группы" value="<?php echo $number_groop; ?>"/>

                                <p>E-mail:</p>
                                <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>

                                <p>Кол-во баллов:</p>
                                <input type="text" name="number_balls" placeholder="Кол-во баллов" value="<?php echo $number_balls; ?>"/>

                                <p>Год рождения:</p>
                                <input type="text" name="year_birth" placeholder="Год рождения" value="<?php echo $year_birth; ?>"/>

                                <p>Местный/приезжий:</p>
                                <input type="text" name="local_in_town" placeholder="Местный/приезжий" value="<?php echo $local_in_town; ?>"/>

                                <p>Пароль:</p>
                                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                                <br/>
                                <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
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