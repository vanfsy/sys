<?php

/**
 * ユーザー マッパー
 *
 * @group mapper
 *
 */

class UsersMapper extends DataMapper
{
    const TABLE_NAME  = 'Users';
    const SEQUENCE_ID = 'id';

    /**
     * ログイン認証
     *
     */
    function auth($login_id, $password)
    {
        $options = array(
            'conditions' => array(
                'is_deleted = ' => FLAG_OFF,
                'login_id   = ' => $login_id,
                'password   = ' => sha1($password . PASSWORD_SALT_VALUE),
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
        if (!(isset($params['login_id']) && isset($params['password']))) {
            return false;
        }

        if (!$row = $this->auth($params['login_id'], $params['password'])) {
            return false;
        }

        // 最終ログイン日時を更新
        $row->last_logined = $this->_now->format('c');
        $this->update($row);

        $_SESSION['_user']['user_id']    = $row->id;
        $_SESSION['_user']['company_id'] = $row->company_id;
        $_SESSION['_user']['tenpo_id']   = $row->tenpo_id;
        $_SESSION['_user']['login_id']   = $row->login_id;
        $_SESSION['_user']['name']       = $row->name;
        $_SESSION['_user']['auth']       = $row->auth;

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

        unset($_SESSION['_user']);

        return ;
    }

    /**
     * ログイン状態を判定する
     *
     */
    function isLogin()
    {
        if (isset($_SESSION['_user']['user_id'])
         && isset($_SESSION['_user']['login_id'])
         && isset($_SESSION['_user']['name'])
         && isset($_SESSION['_user']['auth'])
        ) {
            $row = $this->findById($_SESSION['_user']['user_id']);

            if ($row->login_id == $_SESSION['_user']['login_id']
             && $row->name     == $_SESSION['_user']['name']
             && $row->auth     == $_SESSION['_user']['auth']
             && $row->tenpo_id == $_SESSION['_user']['tenpo_id']
            ) {
                return $row;
            }
        }

        $this->logout();

        return false;
    }
}
