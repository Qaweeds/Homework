<main>
    <div class="form">
        <h3>Регистрация</h3>
        <form action="" method="post">
            <span>Имя</span><input type="text" name="name" required>
            <span>Фамилия</span><input type="text" name="surname" required>
            <span>email</span><input type="text" name="email" required>
            <span>pass</span><input type="password" name="password" required>
            <p></p>
            <span>Роль </span><select name="role" id="role">
                <option value="Админ">Админ</option>
                <option value="Пользователь">Пользователь</option>
            </select>

            <p></p>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>
</main>