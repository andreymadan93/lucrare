<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
?>
<html>
<head>
    <title>Principala</title>
</head>
<body>
<h2>Principala</h2>
<form action="testreg.php" method="post">

    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
    <p>
        <label>Numele:<br></label>
        <input name="name" type="text" size="15" maxlength="15">
    </p>


    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->

    <p>

        <label>Email<br></label>
        <input name="email" type="email" size="15" maxlength="15">
    </p>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->

    <p>
        <input type="submit" name="submit" value="Intra">

        <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** -->
        <br>
        <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** -->
        <a href="reg.php">Inregistrare</a>
    </p></form>
<br>
<?php
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['name']) or empty($_SESSION['id']))
{
    // Если пусты, то мы не выводим ссылку
    echo "nu sunteti intregistrat<br><a href='#'>acest link pot vizualiza doar utilizatori inregistrati</a>";
}
else
{

    // Если не пусты, то мы выводим ссылку
    echo "Ati intrat ca ".$_SESSION['name']."<br><a  href='http://tvpavlovsk.sk6.ru/'>acest link pot vizualiza doar utilizatori inregistrati</a>";
}
?>
</body>
</html>