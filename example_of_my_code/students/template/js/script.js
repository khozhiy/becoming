function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("id");
    switching = true;
    //Задайте направление сортировки по возрастанию:
    dir = "asc";
    /*Сделайте цикл, который будет продолжаться до тех пор, пока
         переключение не было выполнено:*/
    while (switching) {
        //начните с того, что ниодно переключение не выполняется
        switching = false;
        rows = table.getElementsByTagName("TR");
        /*Прокрутите все строки таблицы (кроме
             первых, которые содержат заголовки таблицы):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //начните с того, что переключения по дефолту - нет:
            shouldSwitch = false;
            /*Получите два элемента, которые вы хотите сравнить,
                 один из текущей строки и один из следующей:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //если это asc, переключите таблицу и выйдете из цикла:
                    $("#id").attr("src","/template/img/sort_both.png");
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //если это desc, переключите таблицу и выйдете из цикла:
                    shouldSwitch= true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}