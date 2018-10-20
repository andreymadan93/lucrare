<html>
<head>
    <title>Registrare</title>
</head>
<body>
<h2>Registrare</h2>
<form action="save_user.php" method="post">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
    <p>
        <label>Numele:<br></label>
        <input name="name" type="text" size="15" maxlength="15">
    </p>
    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
    <p>
        <label>Email:<br></label>
        <input name="email" size="15" maxlength="15">
    </p>

    <label>Storage:<br></label>
    <select>
        <option>Alegeti locul</option>
        <option>Fisier</option>
        <option>Baza de date</option>
    </select>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
    <p>
        <input type="submit" name="submit" value="Registrare">
        <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
    </p></form>
</body>
</html>
