<form action="/registration.php" method="post" id="valid"  class="needs-validation">
    <div class="form-row">
        <label class="col">
            Логин:
            <input type="text" name="login" class="form-control" placeholder="Логин">
            <div class="invalid-feedback">
                Лгин должен быть от 4 до 20 символов и содержать латинские буквы и цифры
            </div>
        </label>
        <label class="col">
            Адрес Электронной почты":
            <input type="email" name="email" class="form-control" placeholder="E-mail">
            <div class="invalid-feedback">
                Некорректно введен E-mail адрес
            </div>
        </label>
    </div>

    <div class="form-row">
        <label class="col">
            Имя:
            <input type="text" name="name" class="form-control" placeholder="Имя">
            <div class="invalid-feedback">
                Имя должно содержать только буквы
            </div>
        </label>

        <label class="col">
            Фамилия:
            <input type="text" name="lastname" class="form-control" placeholder="Фамилия">
            <div class="invalid-feedback">
                Фамилия должна содержать только буквы
            </div>
        </label>
    </div>

    <div class="form-row">
        <label class="col">
            Пароль:
            <input type="password" name="password" class="form-control" placeholder="Пароль">
            <div class="invalid-feedback">
                Пароль должен быть от 6 до 20 символов и содержать латинские буквы и цифры
            </div>
        </label>
        <label class="col">
            Повтор пароля:
            <input type="password" name="passwordCheck" class="form-control" placeholder="Повтор пароля">
            <div class="invalid-feedback">
                Повтор пароля должен совпадать с паролем
            </div>
        </label>
    </div>

    <div class="form-row">

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </div>
</form>