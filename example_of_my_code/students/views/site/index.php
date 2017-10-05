<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="col-sm-9 padding-right">
    <div class="features_items">
        <h2 class="title text-center">Студенты</h2>
        </br>
        <style>
            .btn-default{
                margin-bottom: 10px;
            }
        </style>
        <div class="signup-form">
            <form action="#" method="post">
                <input type="text" name="search" placeholder="Поиск" required/>
                <input type="submit" name="submit" class="btn btn-default" value="Поиск" />
            </form>
        </div>
        <?php if($search_string):?>
            <table class="table-bordered table-striped table"">
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Номер группы</th>
                    <th>Кол-во баллов</th>
                </tr>
                <?php foreach ($kols as $search): ?>
                    <tr>
                        <td><?php echo $search['name']; ?></td>
                        <td><?php echo $search['surname']; ?></td>
                        <td><?php echo $search['number_groop']; ?></td>
                        <td><?php echo $search['number_balls']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else:?>
        <table class="table-bordered table-striped table">
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Номер группы</th>
                <th>Кол-во баллов</th>
            </tr>
            <?php foreach ($studentsOnPage as $students): ?>
                <tr>
                    <td><?php echo $students['name']; ?></td>
                    <td><?php echo $students['surname']; ?></td>
                    <td><?php echo $students['number_groop']; ?></td>
                    <td><?php echo $students['number_balls']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif;?>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>

