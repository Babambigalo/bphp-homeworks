<?php
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$code = strtolower($_POST['code']);
$codeWord = 'codeword123';
$strErrors = '';
if (preg_match('/\@|\;|\?|\/|\:|\*/' , $login) === 1) {
    $strErrors .= "<div> Логин не может содержать символы @/*?,;: </div>";
}

if (strlen($password) < 8) {
    $strErrors .= "<div> Пароль должен содержать не менее 8 символов </div>";
}

if (preg_match('/\w+\@\w+\.\w+/',$email) === 0) {
    $strErrors .= "<div> Неверный email </div> ";
}

if (strlen($firstName) === 0) {
    $strErrors .= "<div> Поле Имя должно быть заполнено </div>";
}

if (strlen($lastName) === 0) {
    $strErrors .= "<div> Поле Фамилия должно быть заполнено </div>";
}

if (strlen($middleName) === 0) {
    $strErrors .= "<div> Поле Отчество должно быть заполнено </div>";
}

if (strtolower($code) !== $codeWord) {
    $strErrors .= "<div> Неверное значение поля Код </div>";
}

if (strlen($errors) > 0) {
    echo $strErrors;
}else {
    echo "<b>Вы успешно зарегистрированы </b>";
}

?>