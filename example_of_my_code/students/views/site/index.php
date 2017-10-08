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
            <form action="#" method="post" align="right">
                <input type="text" name="search" placeholder="Поиск" required/>
                <input type="submit" name="submit" class="btn btn-default" value="Поиск" />
            </form>
        </div>
        <?php if($search_string):?>
            <table id="id" class="table-bordered table-striped table">
                <tr>
                    <th onclick="sortTable(0)">Имя<img src="/template/img/sort_both.png" align="right"/></th>
                    <th onclick="sortTable(1)">Фамилия<img src="/template/img/sort_both.png" align="right"/></th>
                    <th onclick="sortTable(2)">Номер группы<img src="/template/img/sort_both.png" align="right"/></th>
                    <th onclick="sortTable(3)">Кол-во баллов<img src="/template/img/sort_both.png" align="right"/></th>
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
            <table id="id" class="table table-stripped table-bordered">
            <thead>
            <tr>
                <th onclick="sortTable(0)">Имя<img src="/template/img/sort_both.png" align="right"/></th>
                <th onclick="sortTable(1)">Фамилия<img src="/template/img/sort_both.png" align="right"/></th>
                <th onclick="sortTable(2)">Номер группы<img src="/template/img/sort_both.png" align="right"/></th>
                <th onclick="sortTable(3)">Кол-во баллов<img src="/template/img/sort_both.png" align="right"/></th>
            </tr>
            </thead>
            <?php foreach ($studentsOnPage as $students): ?>
            <tbody>
                <tr>
                    <td><?php echo $students['name']; ?></td>
                    <td><?php echo $students['surname']; ?></td>
                    <td><?php echo $students['number_groop']; ?></td>
                    <td><?php echo $students['number_balls']; ?></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
        <?php endif;?>
    </div>
    <script src="/template/js/script.js"></script>
<?php include ROOT . '/views/layouts/footer.php'; ?>

