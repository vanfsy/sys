<?php

/**
 * 管理者情報 マッパー
 *
 * @group mapper
 *
 */

class AdminsMapper extends DataMapper
{
    const TABLE_NAME  = 'Admins';
    const SEQUENCE_ID = 'id';

    /**
     * ログイン認証
     *
     */
    function auth($email, $password)
    {
        $options = array(
            'conditions' => array(
                'is_deleted = ' => FLAG_OFF,
                'email      = ' => $email,
                'password   = ' => sha1($email . $password . PASSWORD_SALT_VALUE),
            ),
        );

        if (!$row = $this->find($options)) {
            return false;
        }

        return $row;
    }

    /**
     * ログイン処理をする
     *
     */
    function login($params)
    {
        if (!(isset($params['email']) && isset($params['password']))) {
            return false;
        }

        if (!$row = $this->auth($params['email'], $params['password'])) {
            return false;
        }

        // 最終ログイン日時を更新
        $row->last_logined = $this->_now->format('c');
        $this->update($row);

        $_SESSION['_admin']['admin_id'] = $row->id;
        $_SESSION['_admin']['email']    = $row->email;
        $_SESSION['_admin']['name']     = $row->name;

        return true;
    }

    /**
     * ログアウト処理をする
     *
     */
    function logout()
    {
        /*
        $session_name = session_name();

        session_unset();

        if (isset($_COOKIE[$session_name])) {
            setcookie($session_name, '', time() - 3600, '/');
        }

        session_destroy();
        */

        unset($_SESSION['_admin']);

        return ;
    }

    /**
     * ログイン状態を判定する
     *
     */
    function isLogin()
    {
        if (isset($_SESSION['_admin']['admin_id'])
         && isset($_SESSION['_admin']['email'])
         && isset($_SESSION['_admin']['name'])
        ) {
            $row = $this->findById($_SESSION['_admin']['admin_id']);

            if ($row->email == $_SESSION['_admin']['email']
             && $row->name  == $_SESSION['_admin']['name']
            ) {
                return $_SESSION['_admin'];
            }
        }

        $this->logout();

        return false;
    }
}
