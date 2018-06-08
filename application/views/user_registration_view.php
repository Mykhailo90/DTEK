<div id="content2">

                                <div class="popup" ng-module="app2" ng-form="form2" ng-app="register_app" ng-controller="myCtrl2">
                                    <form id="register_form_2" name="form2" action="" onsubmit="return false" ng-submit="myFunc()">

                                        <input class="inpt" type="email" name="user_email" ng-model="user.user_email" required="">
                                        <div class="label">Email <span>* обязательное поле</span></div>

                                        <input class="inpt" type="text" name="user_name" ng-model="user.user_name" required="">
                                        <div class="label">Имя <span>* обязательное поле</span></div>

                                        <input class="inpt" type="text" name="user_surname" ng-model="user.user_surname">
                                        <div class="label">Фамилия</div>

                                        <input class="inpt" type="text" name="user_company" ng-model="user.user_company">
                                        <div class="label">Компания</div>

                                        <input class="inpt" type="text" ng-model="user.user_phone" name="user_phone" ui-mask="+999 (99) 999-99-99" value="(___) ___-__-__" required="">
                                        <div class="label">Телефон <span>* обязательное поле</span></div>

                                        <input class="inpt" type="password" ng-model="user.user_password.new" name="newPassword" ng-minlength="6" required="">
                                        <div class="label">
                                            Пароль
                                            <span class="help-block" ng-show="form.newPassword.$dirty &amp;&amp; form.newPassword.$invalid">(должен быть не менее 6 символов)</span>
                                        </div>

                                        <input class="inpt" type="password" ng-model="user.user_password.confirm" name="newPasswordConfirm" value-matches="user.user_password.new" required="">
                                        <div class="label">
                                            Подтверждение пароля
                                            <span class="help-block" ng-show="form.newPasswordConfirm.$dirty &amp;&amp; form.newPasswordConfirm.$invalid">(должен совпадать с предыдущим полем)</span>
                                        </div>

                                        <div id="registration_error"></div>
                                        <div class="bottom_center">
                                            <span class="button button_white">
											<input class="button" type="submit" value="Зарегистрироваться" id="registration_button">
										</span>
                                        </div>

                                    </form>
                                </div>
                            </div>