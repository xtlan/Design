<?php
namespace Design\Controller\Behavior;
/**
 * LoginControllerBehavior
 *
 * @version 1.0.0
 * @copyright Copyright 2011 by Kirya <cloudkserg11@gmail.com>
 * @author Kirya <cloudkserg11@gmail.com>
 */
class LoginControllerBehavior extends \CBehavior
{
    /**
     * nameMode l
     *
     * @var string
     */
    public $nameModel = 'User';
    /**
     * loginFiel d
     *
     * @var string
     */
    public $loginField = 'login';
    /**
     * passwordFiel d
     *
     * @var string
     */
    public $passwordField = 'password';

    /**
     * nameIdentityClas s
     *
     * @var string
     */
    public $nameIdentityClass;

    /**
     * allowSuperuser
     *
     * @var boolean
     */
    public $allowSuperuser = true;



    /**
     * createModel
     *
     * @return void
     */
    private function createModel()
    {
        $nameModel = $this->nameModel;
        return new $nameModel;
    }

    /**
     * createIdentity
     *
     * @param mixed $login
     * @param mixed $password
     * @return void
     */
    private function createIdentity($login, $password)
    {
        $nameClass = $this->nameIdentityClass;
        return  new $nameClass($login, $password);
    }

    /**
     * getLogin
     *
     * @param mixed $user
     * @return void
     */
    private function getLogin($user) 
    {
        $nameLogin = $this->loginField;
        return $user->$nameLogin;
    }

    /**
     * getPassword
     *
     * @param mixed $user
     * @return void
     */
    private function getPassword($user) 
    {
        $namePassword = $this->passwordField;
        return $user->$namePassword;
    }


    /**
     * isSuperuser
     *
     * @param string $login
     * @return boolean
     */
    private function isSuperuser($login)
    {
        return $login == \Yii::app()->params['superuser']['login'];
    }


    /**
     * renderForm
     *
     * @param string $formView
     * @return void
     */
    public function renderForm($formView =null)
    {
        if (!isset($formView)) {
            $formView =  'index'; 
        }

        $login = isset($_GET[$this->loginField]) ? $_GET[$this->loginField] : '';
        $errorLogin = isset($_GET['errorLogin']) ? $_GET['errorLogin'] : '';
        $errorPassword = isset($_GET['errorPassword']) ? $_GET['errorPassword'] : '';

        $this->owner->layout = 'none';
        $this->owner->render(
            $formView,
            array(
                $this->loginField => $login,
                'errorLogin' => $errorLogin,
                'errorPassword' => $errorPassword
        
            )
        );
    
    }




    /**
     * login
     *
     * @param string $redirectAfterError
     * @param string $redirectAfterSuccess
     * @return void
     */
    public function login($redirectAfterError = 'index', $redirectAfterSuccess = 'index')
    {
        $user = $this->createModel();
       
        // Прислал ли пользователь данные
        if (isset($_POST[$this->nameModel])) {
            //Проверка и шифрование данных
            $user->attributes = $_POST[$this->nameModel];
            $login = $this->getLogin($user);
            $password = $this->getPassword($user);
            
            //Если не супер пользователь проверяем данные
            $isAllowedSuperuser = $this->allowSuperuser and $this->isSuperuser($login);
            if (!$isAllowedSuperuser and !$user->validate()) {
                $this->owner->redirect(
                    array($redirectAfterError,
                        'errorLogin' => 'error',
                        'login' => $login
                    )
                );
            }

            $password = $user->cryptPassword($password);

            //Если стояло у пользователя
            //сохранить меня (в кукисы) - сохраняем
            if (isset($_POST[$this->nameModel]['remember']) and  ($_POST[$this->nameModel]['remember'] == 'on') ) {
                \Yii::app()->user->allowAutoLogin = true;
            }

            //Проверка пароля
            $identity=$this->createIdentity($login, $password);
            if ($identity->authenticate()) {

                //Входим пользователем
                \Yii::app()->user->login($identity);

                //Если был задан предудущий url
                //значит переходим на него

                if (\Yii::app()->request->isAjaxRequest) {
                    \Yii::app()->ajax->sendRespond(true, 'Логинизация завершена');
                    \Yii::app()->end();
                }
                $this->returnUserUrl($redirectAfterSuccess);


                $this->owner->redirect(array($redirectAfterSuccess));

            } else {
 
                $this->owner->redirect(
                    array($redirectAfterError,
                        'errorPassword' => 'error',
                        'login' => $user->login
                    )
                );
            }
        }

        $this->owner->redirect(array($redirectAfterError));
    }


    /**
     * logout
     *
     * @param string $redirect
     * @return void
     */
    public function logout($redirect = 'index')
    {
        \Yii::app()->user->logout();
        $this->owner->redirect(array($redirect));
    }



    /**
     * returnUserUrl
     *
     * @return void
     */
    public function returnUserUrl($default)
    {
        if (\Yii::app()->user->returnUrl != '/' and \Yii::app()->user->returnUrl != \Yii::app()->request->requestUri) {
            $this->owner->redirect(\Yii::app()->user->returnUrl);
        } else {
            $this->owner->redirect(\GetUrl::url($default));
        }
 
    }

}

