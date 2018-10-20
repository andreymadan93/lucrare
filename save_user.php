<?php
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
if (isset($_POST['name'])) { $login = $_POST['name']; if ($name == '') { unset($name);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['email'])) { $password=$_POST['email']; if ($email =='') { unset($email);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($name) or empty($email)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);
$email = stripslashes($email);
$email = htmlspecialchars($email);
//удаляем лишние пробелы
$name = trim($name);
$email = trim($email);
// подключаемся к базе
$db = mysqli_connect ("localhost","root","", "my_bd") or die ("Mistake " . mysqli_error($db));
$sql = "SELECT * FROM usertbl WHERE username = '$name'";

$result = mysqli_query($db, $sql) or trigger_error(mysqli_error()." in ". $sql); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);
if (empty($myrow['email']))
{
//если пользователя с введенным логином не существует
    exit ("Sorry, login or parole is wrong.");
}
else {
//если существует, то сверяем пароли
    if ($myrow['password']==$password) {
//если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['name']=$myrow['name'];
        $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        echo "You entered the site successfully! <a href='index.php'>Your page</a>";
    }
    else {
//если пароли не сошлись

        exit ("Sorry, login or parole is wrong.");
    }
}
?>