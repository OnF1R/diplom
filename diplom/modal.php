<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="authModalLabel">Авторизация</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body" style="list-style-type:none;">
          <form name="user" action="check.php">
              <input type="hidden" name="form" value="auth">
                      <p id="auth_error" class="text-center font-weight-bold text-danger none"></p>
                      <div class="form-outline mb-4"><li><label class="form-label" for="login"></label>Логин<input class="form-control form-control-lg" name="login" type="text" maxlength="32" required></li></div>
                      <div class="form-outline mb-4"><li><label for="password"></label>Пароль<input class="form-control form-control-lg" name="password" type="password" minlength="5" maxlength="32" required></li></div>
                      <div id="submit_auth" class="d-flex justify-content-center form-outline mb-4"><li><button class="button btn" type="submit">Авторизоваться</button></li></div>
                      <div class="text-center"><p>Нет учетной записи?</p><button id="authModal" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#regModal">Загеристрируйтесь!</button></div>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="regModalLabel">Регистрация</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body" style="list-style-type:none;">
                <h2 class="text-uppercase text-center mb-5">Регистрация</h2>
                    <form name="reg" action="check.php">
                        <input type="hidden" name="form" value="reg">
                          <p id="reg_error" class="text-center font-weight-bold text-danger none"></p>
                          <div class="form-outline mb-4"><li><label class="form-label" for="login"></label>Логин<input class="form-control form-control-lg" name="login" type="text" maxlength="32" required></li></div>
                          <div class="form-outline mb-4"><li><label for="name"></label>Имя<input class="form-control form-control-lg" name="name" type="text" maxlength="32" required></li></div>
                          <div class="form-outline mb-4"><li><label for="email"></label>E-mail<input class="form-control form-control-lg" name="email" type="email" maxlength="32" required></li></div>
                          <div class="form-outline mb-4"><li><label for="password"></label>Пароль<input class="form-control form-control-lg" name="password" type="password" minlength="5" maxlength="32" required></li></div>
                          <div class="form-outline mb-4"><li><label for="confirm"></label>Подвердите пароль<input class="form-control form-control-lg"t name="confirm" type="password" minlength="5" maxlength="32" required></li></div>
                          <div class="d-flex justify-content-center mb-4"><li><button class="button btn" type="submit">Зарегистрироваться</button></li></div>
                      </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/ajax_login.js"></script>
<script type="text/javascript" src="js/ajax_reg.js"></script>
