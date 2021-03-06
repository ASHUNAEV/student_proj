<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
        //-----------------Если в сессии существуют сообщения об ошибках, то выводим их-----------------
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
            //-----------------Уничтожаем чтобы не выводились заново при обновлении страницы-----------------
            unset($_SESSION["error_messages"]);
        }
        //-----------------Если в сессии существуют радостные сообщения, то выводим их-----------------
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            //-----------------Уничтожаем чтобы не выводились заново при обновлении страницы-----------------
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    /*-----------------Проверяем, если пользователь не аутентифицирован, то выводим форму регистрации,
                            иначе выводим сообщение о том, что он уже зарегистрирован-----------------*/
    if(!isset($_SESSION["login"]) && !isset($_SESSION["password"])){
?>
<div class="conteiner">
    <div id="form_register" class="centered">
        <h2 class="textStyle">Регистрация</h2>
        <form action="register.php" method="post" name="form_register">
             <table>
                <tr>
                    <td class="textStyle2"> Имя </td>
                    <td class="content">
                        <input type="text" name="first_name" required="required" placeholder="Введите имя">
                        <object class="content_circle"></object>
                    </td>
                </tr>
                <tr>
                    <td class="textStyle2"> Фамилия </td>
                    <td class="content">
                        <input type="text" name="last_name" required="required" placeholder="Введите фамилию">
                        <object class="content_circle"></object>
                    </td>
                </tr>
                <tr>
                    <td class="textStyle2"> Логин </td>
                     <td class="content">
                        <input type="login" name="login" required="required" placeholder="Введите логин">
                        <object class="content_circle"></object>
                        <span id="valid_login_message" class="mesage_error"></span>
                    </td>
                </tr>
                <tr>
                    <td class="textStyle2"> Пароль </td>
                    <td class="content">
                        <input type="password" name="password" placeholder="минимум 6 символов" required="required">
                        <object class="content_circle"></object>
                        <span id="valid_password_message" class="mesage_error"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit_register" class="butt2" value="Зарегистрироватся">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>
<?php
    }
    require_once("footer.php");
?>