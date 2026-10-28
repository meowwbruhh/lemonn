<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     //принятие данных

    $name = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['useremail']);
    $message = htmlspecialchars($_POST['usermessage']);

    //сохранение данных
   
    $date = date("Y-m-d H:i:s");
    $text_to_save = "Дата: $date | Имя: $name | Email: $email | Сообщение: $message\n";

   
    file_put_contents("feedback.txt", $text_to_save, FILE_APPEND);
   
//вывод на вторую страничку в браузере, а дальше еще вывод отзывов, но я тугая
    
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Успешная отправка</title>
    </head>
    <body style='font-family: sans-serif; background-color: #f4f4f9; padding: 50px; text-align: center;'>
        <div style='max-width: 500px; margin: 0 auto; background-color: #e2e5f8; padding: 30px; border-radius: 8px; border: 1px solid #b5b8d1;'>
            <h2 style='color: #282537; margin-bottom: 20px;'>Сообщение успешно отправлено!</h2>
            <div style='text-align: left; background: #fff; padding: 15px; border-radius: 6px; border: 1px solid #d4d7ef;'>
                <p><b>Имя:</b> $name</p>
                <p><b>Email:</b> $email</p>
                <p><b>Текст сообщения:</b> $message</p>
            </div>
            <br>
            <a href='index.html' style='display: inline-block; padding: 10px 20px; background-color: #282537; color: #fff; text-decoration: none; border-radius: 6px;'>Вернуться на главную</a>
        </div>
    </body>
    </html>";

} else {
    
    header("Location: index.html");
    exit();
}
?>