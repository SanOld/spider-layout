<?php
/* @var $this SiteController */

$this->pageTitle = 'Login | ' . Yii::app()->name;
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/login.js"></script>

<div ng-controller="LoginController" class="wrapper-page animated fadeInDown">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading">
            <h3 class="text-center m-t-10">Login</h3>
        </div>

        <form novalidate method="post" name="form" id="loginForm" class="cmxform form-horizontal m-t-40">
            <div ng-style="error && {'display': 'block'}" class="alert alert-danger text-center" ng-bind="error">

            </div>
            <div class="form-group has-feedback">
                <label class="col-xs-12" for="username">Benutzername</label>
                <div class="col-xs-12 wrap-line"  ng-class="{'error': fieldError('login'), 'success': fieldSuccess('login')}">
                    <input class="form-control" ng-model="user.login" type="text" id="username" name="login" required>
                    <label ng-show="fieldError('login') && form.$submitted" class="error" for="username">Bitte Benutzername eingeben</label>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label class="col-xs-12" for="password">Passwort</label>
                <div class="col-xs-12 wrap-line"  ng-class="{'error': fieldError('password'), 'success': fieldSuccess('password')}">
                    <input class="form-control" ng-model="user.password" type="password" id="password" name="password" required>
                    <label ng-show="fieldError('password') && form.$submitted" class="error" for="password">Bitte geben Sie ein Passwort</label>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <label class="cr-styled">
                        <input ng-model="user.remember" ng-true-value="1" ng-false-value="0" type="checkbox">
                        <i class="fa"></i>
                        Login speichern
                    </label>
                </div>
            </div>

            <div class="form-group text-right">
                <div class="col-xs-12">
                    <button ng-click="submitForm(user)" class="btn btn-block btn-lg btn-purple w-md custom-btn" type="submit">Anmelden</button>
                </div>
            </div>
            <div class="form-group m-t-20">
                <div class="col-sm-12 text-center">
                    <a href="/forgot-password">Ihr Passwort vergessen?</a>
                </div>
            </div>
        </form>
    </div>
    <div class="m-t-30">
        <address class="ng-scope">
            <strong>Stiftung SPI</strong><br/>
            Programmagentur Jugendsozialarbeit an Berliner Schulen<br/>
            Schicklerstr. 5-7<br/>
            10179 Berlin
            <p class="m-t-10">Tel.: +555 55 55<br />
                Fax.: +555 55 55</p>
            <p class="m-t-10"><a target="_blank" href="mailto:shehovtsov_av@mail.ru">E-mail senden</a><br/>
                <a target="_blank" href="http://dev-spider.library.in.ua">dev-spider.library.in.ua</a></p>
        </address>
    </div>
</div>
