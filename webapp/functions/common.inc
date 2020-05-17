<?php

//--------------------------------------------------
// 共用関数
//--------------------------------------------------

    /**
     * $SET変数から値を取得する
     *
     */
    function getSetValue($key)
    {
        global $SET;

        if (!isset($SET[$key])) {
            return null;
        }

        return $SET[$key];
    }

    /**
     * デバッグ表示
     *
     */
    function debug($data, $file = null, $line = null)
    {
        echo '<pre>';

        if (!is_null($file)) {
            echo $file;
        }

        if (!is_null($line)) {
            echo ' at line ' . $line;
        }

        echo '<br>';

        print_r($data);

        echo '</pre>';
    }

    function dumpMemory($line = '')
    {
        $just = number_format(memory_get_usage() / (1024 * 1024));

        echo '<pre>';
        echo 'Just: ' . $just . 'MB' . ($line ? ' line@ ' . $line : $line);
        echo '</pre>';
    }

    function dumpMemoryPeak($line = '')
    {
        $peak = number_format(memory_get_peak_usage() / (1024 * 1024));

        echo '<pre>';
        echo 'Peak: ' . $peak . 'MB' . ($line ? ' line@ ' . $line : $line);
        echo '</pre>';
    }

    /**
     * サーバエラー
     *
     */
    function serverError()
    {
        // ログ or メール

        header('HTTP/1.1 500 Internal Server Error');

        echo file_get_contents(HTTP_ROOT . '/error/?500');
        exit;
    }

    /**
     * ユーザエラー
     *
     */
    function userError($status = 0)
    {
        switch ((int)$status) {
            // リクエストが不正です。
            case 400: default:
                header('HTTP/1.1 400 Bad Request');
                break;

            // 認証されていません。
            case 401:
                header('HTTP/1.1 401 Unauthorized');
                break;

            // 許可されていません。
            case 403:
                header('HTTP/1.1 403 Forbidden');
                break;

            // 見つかりません。
            case 404:
                header('HTTP/1.1 404 Not Found');
                break;
        }

        echo file_get_contents(HTTP_ROOT . '/error/?' . $status);
        exit;
    }

    /**
     * リダイレクト
     *
     */
    function redirect($url, $status = 0)
    {
        switch ((int)$status) {
            case 301:
                header('HTTP/1.1 301 Moved Permanently');
                break;

            case 302: default:
                header('HTTP/1.1 302 Found');
                break;

            case 303:
                header('HTTP/1.1 303 See Other');
                break;
        }

        header('Location: ' . $url);
        exit;
    }

    /**
     * SSLによるアクセスかどうか
     *
     */
    function isSSL()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            return true;
        }

        return false;
    }

    /**
     * ベーシック認証
     *
     */
    function basicAuth($user, $pass, $message = 'Please Enter Your Password...')
    {
        $auth = true;

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            $auth = false;
        } else {
            if ($_SERVER['PHP_AUTH_USER'] != $user
             || $_SERVER['PHP_AUTH_PW']   != $pass
            ) {
                $auth = false;
            }
        }

        if (!$auth) {
            header('WWW-Authenticate: Basic realm="' . $message . '"');
            header('HTTP/1.0 401 Unauthorized');
            exit;
        }
    }

    /**
     * リクエストメソッドをチェックする
     *
     */
    function checkRequestMethod($method)
    {
        if ($_SERVER['REQUEST_METHOD'] === strtoupper($method)) {
            return true;
        }

        header('HTTP/1.1 403 Forbidden');
        exit;
    }

    /**
     * リクエストメソッドがPOSTかどうか
     *
     */
    function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }

        return false;
    }

    /**
     * Ajaxによるリクエストかどうか
     *
     */
    function isAjax()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
         && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {
            return true;
        }

        return false;
    }

    /**
     * リクエストパラメータを取得する
     *
     */
    function getRequestParams()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                return isset($_GET) ? $_GET : array();

            case 'POST':
                return isset($_POST) ? $_POST : array();

            default:
                return array();
        }
    }

    /**
     * クエリ文字列を生成する
     *
     */
    function generateQS(array $params)
    {
        $query_string =  preg_replace('/%5B\d%5D/', '%5B%5D', http_build_query($params, null, '&'));

        return $query_string;
    }

    /**
     * SSLアクセスを強制する
     *
     */
    function forwardHttps()
    {
        if (SSL_ENGINE === 'on') {
            if (!isSSL()) {
                // httpアクセス時
                if (isPost()) {
                    $_SESSION['_request_info'] = array(
                        'request_method' => 'POST',
                        'request_params' => $_POST,
                    );

                } else {
                    $_SESSION['_request_info'] = array(
                        'request_method' => 'GET',
                        'request_params' => $_GET,
                    );
                }

                redirect(HTTP_ROOT . $_SERVER['REQUEST_URI']);
            }

            // リクエストパラメータを復元
            if ($_request_info = $_SESSION['_request_info']) {
                if (is_array($_request_info['request_params']) && count($_request_info['request_params']) > 0) {
                    foreach ($_request_info['request_params'] as $key => $value) {
                        if ($_request_info['request_method'] === 'POST') {
                            $_POST[$key] = $value;
                        } else {
                            $_GET[$key] = $value;
                        }
                    }
                }

                unset($_SESSION['_request_info']);
            }
        }
    }

    /**
     * ランダムIDを生成する
     *
     */
    function createRandId($length = 32, $mode = 'alnum')
    {
        $chars = array(
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        );

        if ($mode === 'number') {
            $max = 9;
        } else {
            $max = count($chars) - 1;
        }

        $id = '';

        for ($i = 0; $i < $length; $i++) {
            $id .= $chars[mt_rand(0, $max)];
        }

        return $id;
    }

    /**
     * ワンタイムトークンを設定する
     *
     */
    function setToken($key)
    {
        if (!isset($_SESSION)) {
            return false;
        }

        $_SESSION['token'][$key] = $token = createRandId();

        return $token;
    }

    /**
     * ワンタイムトークンをチェックする
     *
     */
    function checkToken($key, $token)
    {
        if (!isset($_SESSION['token'][$key])) {
            return false;
        }

        if ($_SESSION['token'][$key] != $token) {
            return false;
        }

        return true;
    }

    /**
     * ワンタイムトークンをリセットする
     *
     */
    function unsetToken($key)
    {
        if (!isset($_SESSION)) {
            return false;
        }

        unset($_SESSION['token'][$key]);
    }

    /**
     * 改行コードを \r\n → \n に統一する
     *
     */
    function unifyLF($str)
    {
        $str = str_replace("\r\n", "\n", $str);

        return $str;
    }

    /**
     * 配列にある空の要素を削除して再構築する
     *
     */
    function regenerateArray($arr)
    {
        if (is_array($arr)) {
            $buf = array();

            foreach ($arr as $key => $val) {
                if (!isEmpty(trim($val))) {
                    if (is_array($val)) {
                        $buf[$key] = regenerateArray($val);
                    } else {
                        if (is_string($key)) {
                            $buf[$key] = $val;
                        } else {
                            $buf[] = $val;
                        }
                    }
                }
            }

            $arr = $buf;
        }

        return $arr;
    }

    /**
     * 配列イコール判定
     *
     */
    function isArrayEqual($a, $b)
    {
        $diff_a_to_b = array_diff($a, $b);
        $diff_b_to_a = array_diff($b, $a);

        return empty($diff_a_to_b) && empty($diff_b_to_a);
    }

    /**
     * 未入力チェック
     *
     */
    function isEmpty($value)
    {
        if ($value === ''
         || is_null($value)
         //|| count($value) === 0
         || isset($value)=== 0
         
        ) {
            return true;
        }

        return false;
    }

    /**
     * 文字長チェック
     *
     */
    function isStringLength($value, $min = 0, $max = 0, $multibyte = true)
    {
        if ($multibyte === true) {
            $function = 'mb_strlen';
        } else {
            $function = 'strlen';
        }

        if ($max === 0) {
            if ($function($value) < $min) {
                return false;
            }
            return true;
        }

        if ($function($value) < $min
         || $function($value) > $max
        ) {
            return false;
        }

        return true;
    }

    /**
     * 半角英字チェック
     *
     */
    function isAlpha($value)
    {
        if (preg_match('/^[a-zA-Z]+$/', $value)) {
            return true;
        }

        return false;
    }

    /**
     * 半角数字チェック
     *
     */
    function isNum($value)
    {
        if (preg_match('/^[0-9]+$/', $value)) {
            return true;
        }

        return false;
    }

    /**
     * 半角英数字チェック
     *
     */
    function isAlnum($value)
    {
        if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
            return true;
        }

        return false;
    }

    /**
     * 半角英数字ハイフンチェック
     *
     */
    function isAlnumH($value)
    {
        if (preg_match('/^[a-zA-Z0-9-]+$/', $value)) {
            return true;
        }

        return false;
    }

    /**
     * 半角英数字アンダースコアチェック
     *
     */
    function isAlnumU($value)
    {
        if (preg_match('/^[a-zA-Z0-9_]+$/', $value)) {
            return true;
        }

        return false;
    }

    /**
     * メールアドレス書式チェック
     *
     */
    function isEmail($value)
    {
        if (preg_match('/^.+@.+$/', $value) === 0) {
            return false;
        }

        return true;
    }

    /**
     * 日付け書式チェック
     *
     */
    function isDate($value)
    {
        if (isEmpty($value)) {
            return false;
        }

        $value = str_replace('/', '-', $value);
        list($y, $m, $d) = explode('-', $value);

        return checkdate((int)$m, (int)$d, (int)$y);
    }

    /**
     * 今日判定
     *
     */
    function isToday($date)
    {
        $target = new DateTime($date);
        $today  = new DateTime('today');

        if ($target->format('Ymd') == $today->format('Ymd')) {
            return true;
        }

        return false;
    }

    /**
     * 端末情報を取得する
     *
     */
    function getDevice()
    {
        $ua = mb_strtolower($_SERVER['HTTP_USER_AGENT']);

        if (strpos($ua, 'iphone') !== false) {
            $device = 'mobile:iphone';

        } elseif (strpos($ua, 'ipod') !== false) {
            $device = 'mobile:ipod';

        } elseif ((strpos($ua, 'android') !== false) && (strpos($ua, 'mobile') !== false)) {
            $device = 'mobile:android';

        } elseif ((strpos($ua, 'windows') !== false) && (strpos($ua, 'phone') !== false)) {
            $device = 'mobile:windows-phone';

        } elseif ((strpos($ua, 'firefox') !== false) && (strpos($ua, 'mobile') !== false)) {
            $device = 'mobile:firefox';

        } elseif (strpos($ua, 'blackberry') !== false) {
            $device = 'mobile:blackberry';

        } elseif (strpos($ua, 'ipad') !== false) {
            $device = 'tablet:ipad';

        } elseif ((strpos($ua, 'windows') !== false) && (strpos($ua, 'touch') !== false && (strpos($ua, 'tablet pc') == false))) {
            $device = 'tablet:windows';

        } elseif ((strpos($ua, 'android') !== false) && (strpos($ua, 'mobile') === false)) {
            $device = 'tablet:android';

        } elseif ((strpos($ua, 'firefox') !== false) && (strpos($ua, 'tablet') !== false)) {
            $device = 'tablet:firefox';

        } elseif ((strpos($ua, 'kindle') !== false) || (strpos($ua, 'silk') !== false)) {
            $device = 'tablet:kindle';

        } elseif ((strpos($ua, 'playbook') !== false)) {
            $device = 'tablet:playbook';

        } else {
            $device = 'others';
        }

        return $device;
    }

    /**
     * ファイルアップロードの評価を返す
     *
     */
    function isUploaded($files)
    {
        switch ($files['error']) {
            case UPLOAD_ERR_OK:
                return true;

            case UPLOAD_ERR_INI_SIZE:
                //return 'ファイルの容量が大きすぎます。';

            case UPLOAD_ERR_FORM_SIZE:
                //return 'ファイルの容量が大きすぎます。';

            case UPLOAD_ERR_PARTIAL:
                //return 'ファイルは一部しかアップロードされていません。';

            case UPLOAD_ERR_NO_FILE:
                //return 'ファイルはアップロードされませんでした。';

            case UPLOAD_ERR_NO_TMP_DIR:
                //return 'テンポラリフォルダが存在しません。';

            case UPLOAD_ERR_CANT_WRITE:
                //return 'ディスクへの書き込みに失敗しました。';

            default:
                return false;
        }
    }

    /**
     * 画像ファイルのタイプを返す
     *
     */
    function getImageType($file_path)
    {
        return exif_imagetype($file_path);
    }

    /**
     * 画像を正方形に切り出す
     *
     */
    function trimImageSquare($file_path, $size)
    {
        if (!file_exists($file_path) || !is_writable($file_path)) {
            return false;
        }

        list($org_w, $org_h, $type, $attr) = @getImageSize($file_path);

        $new_w = $new_h = $size;
        $x = 0;
        $y = 0;

        if ($org_w > $org_h) {
            // 横長
            $x = floor(($org_w - $org_h) / 2);
            $org_w = $org_h;

        } elseif ($org_w < $org_h) {
            // 縦長
            $y = floor(($org_h - $org_w) / 2);
            $org_h = $org_w;
        }

        $new_image = ImageCreateTrueColor($new_w, $new_h);

        $copyImage = function ($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h) {
            if (!ImageCopyResampled($new_image, $org_image, 0, 0, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                if (!ImageCopyResized($new_image, $org_image, 0, 0, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    return false;
                }
            }

            return true;
        };

        switch ($type) {
            case IMAGETYPE_JPEG:
                $org_image = ImageCreateFromJPEG($file_path);
                if ($copyImage($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    ImageJPEG($new_image, $file_path);
                }
                break;

            case IMAGETYPE_PNG:
                $org_image = ImageCreateFromPNG($file_path);
                if ($copyImage($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    ImagePNG($new_image, $file_path);
                }
                break;

            case IMAGETYPE_GIF:
                $org_image = ImageCreateFromGIF($file_path);
                if ($copyImage($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    ImageGIF($new_image, $file_path);
                }
                break;

            default :
                return false;
        }

        ImageDestroy($org_image);
        ImageDestroy($new_image);

        return true;
    }

    /**
     * 画像を長方形に切り出す
     *
     */
    function trimImageRectangle($file_path, $width, $height)
    {
        if (!file_exists($file_path) || !is_writable($file_path)) {
            return false;
        }

        list($org_w, $org_h, $type, $attr) = @getImageSize($file_path);

        $new_w = $width;
        $new_h = $height;
        $x = 0;
        $y = 0;

        // 切り出す画像のアスペクト比
        $new_r = $new_w / $new_h;

        // オリジナル画像のアスペクト比
        $org_r = $org_w / $org_h;

        if ($new_r < $org_r) {
            // 左右トリム
            $x     = floor(($org_w - $org_h * $new_r) / 2);
            $org_w = floor($org_h * $new_r);

        } elseif ($new_r > $org_r) {
            // 上下トリム
            $y     = floor(($org_h - $org_w / $new_r) / 2);
            $org_h = floor($org_w / $new_r);
        }

        $new_image = ImageCreateTrueColor($new_w, $new_h);

        $copyImage = function ($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h) {
            if (!ImageCopyResampled($new_image, $org_image, 0, 0, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                if (!ImageCopyResized($new_image, $org_image, 0, 0, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    return false;
                }
            }

            return true;
        };

        switch ($type) {
            case IMAGETYPE_JPEG:
                $org_image = ImageCreateFromJPEG($file_path);
                if ($copyImage($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    ImageJPEG($new_image, $file_path);
                }
                break;

            case IMAGETYPE_PNG:
                $org_image = ImageCreateFromPNG($file_path);
                if ($copyImage($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    ImagePNG($new_image, $file_path);
                }
                break;

            case IMAGETYPE_GIF:
                $org_image = ImageCreateFromGIF($file_path);
                if ($copyImage($new_image, $org_image, $x, $y, $new_w, $new_h, $org_w, $org_h)) {
                    ImageGIF($new_image, $file_path);
                }
                break;

            default :
                return false;
        }

        ImageDestroy($org_image);
        ImageDestroy($new_image);

        return true;
    }

    /**
     * 画像をリサイズ
     *
     */
    function resizeImageFile($file_path, $max_w = null, $max_h = null)
    {
        if (!file_exists($file_path) || !is_writable($file_path)) {
            return false;
        }

        list($org_w, $org_h, $type, $attr) = @getImageSize($file_path);

        // 画像のサイズ比率
        if (!is_null($max_w) && is_int($max_w) && !is_null($max_h) && is_int($max_h)) {
            // 縦横いずれかに調整
            $rate_w = $max_w / $org_w;
            $rate_h = $max_h / $org_h;
            $rate   = min($rate_w, $rate_h);
            $new_w  = round($org_w * $rate);
            $new_h  = round($org_h * $rate);

        } elseif (!is_null($max_w) && is_int($max_w)) {
            // 横幅固定で調整
            $new_w = $max_w;
            $rate  = $new_w / $org_w;
            $new_h = round($rate * $org_h);

        } elseif (!is_null($max_h) && is_int($max_w)) {
            // 縦幅固定で調整
            $new_h = $max_h;
            $rate  = $new_h / $org_h;
            $new_w = round($rate * $org_w);

        } else {
            $new_w = $org_w;
            $new_h = $org_h;
        }

        $new_image = ImageCreateTrueColor($new_w, $new_h);

        $copyImage = function ($new_image, $org_image, $new_w, $new_h, $org_w, $org_h) {
            if (!ImageCopyResampled($new_image, $org_image, 0, 0, 0, 0, $new_w, $new_h, $org_w, $org_h)) {
                if (!ImageCopyResized($new_image, $org_image, 0, 0, 0, 0, $new_w, $new_h, $org_w, $org_h)) {
                    return false;
                }
            }

            return true;
        };

        switch ($type) {
            case IMAGETYPE_JPEG:
                $org_image = ImageCreateFromJPEG($file_path);
                if ($copyImage($new_image, $org_image, $new_w, $new_h, $org_w, $org_h)) {
                    ImageJPEG($new_image, $file_path);
                }
                break;

            case IMAGETYPE_PNG:
                $org_image = ImageCreateFromPNG($file_path);
                if ($copyImage($new_image, $org_image, $new_w, $new_h, $org_w, $org_h)) {
                    ImagePNG($new_image, $file_path);
                }
                break;

            case IMAGETYPE_GIF:
                $org_image = ImageCreateFromGIF($file_path);
                if ($copyImage($new_image, $org_image, $new_w, $new_h, $org_w, $org_h)) {
                    ImageGIF($new_image, $file_path);
                }
                break;

            default :
                return false;
        }

        ImageDestroy($org_image);
        ImageDestroy($new_image);

        return true;
    }

    /**
     * 画像を時計回りに90度回転（JPEG画像）
     *
     */
    function rotate90degClockwise($file_path)
    {
        if (!file_exists($file_path) || !is_writable($file_path)) {
            return false;
        }

        list($w, $h, $type, $attr) = @getImageSize($file_path);

        if ($type != IMAGETYPE_JPEG) {
            return false;
        }

        $image = ImageCreateFromJPEG($file_path);
        $exifs = @exif_read_data($file_path);

        $image = rotateImage($image, 270, 0);

        ImageJPEG($image, $file_path);
        ImageDestroy($image);

        return true;
    }

    /**
     * 画像の向きを修正（JPEG画像）
     *
     */
    function fixedImageOrientation($file_path)
    {
        if (!file_exists($file_path) || !is_writable($file_path)) {
            return false;
        }

        list($w, $h, $type, $attr) = @getImageSize($file_path);

        if ($type != IMAGETYPE_JPEG) {
            return false;
        }

        $image = ImageCreateFromJPEG($file_path);
        $exifs = @exif_read_data($file_path);

        if (isset($exifs['Orientation'])) {
            switch ($exifs['Orientation']) {
                default:
                case 0:
                case 1: // 未定義、回転無し
                    break;

                case 2: // 左右反転
                    $image = flopImage($image);
                    break;

                case 3: // 180°回転
                    $image = rotateImage($image, 180, 0);
                    break;

                case 4: // 上下反転
                    $image = flipImage($image);
                    break;

                case 5: // 時計回りに90°回転した後、左右反転
                    $image = rotateImage($image, 270, 0);
                    $image = flipImage($image);
                    break;

                case 6: // 時計回りに90°回転
                    $image = rotateImage($image, 270, 0);
                    break;

                case 7: // 反時計回りに90°回転した後、左右反転
                    $image = rotateImage($image, 90, 0);
                    $image = flipImage($image);
                    break;

                case 8: // 反時計回りに90°回転
                    $image = rotateImage($image, 90, 0);
                    break;
            }
        }

        ImageJPEG($image, $file_path);
        ImageDestroy($image);

        return true;
    }

    /**
     * 画像を左右反転
     *
     */
    function flopImage($image)
    {
        $w = imagesx($image);   // 横幅
        $h = imagesy($image);   // 縦幅

        // 変換後の画像の生成（元の画像と同じサイズ）
        $destImage = @imagecreatetruecolor($w, $h);

        // 逆側から色を取得
        for ($i = ($w - 1); $i >= 0; $i--) {
            for ($j = 0; $j < $h; $j++) {
                $color_index = imagecolorat($image, $i, $j);
                $colors = imagecolorsforindex($image, $color_index);
                imagesetpixel($destImage, abs($i - $w + 1), $j, imagecolorallocate($destImage, $colors['red'], $colors['green'], $colors['blue']));
            }
        }

        return $destImage;
    }

    /**
     * 画像を上下反転
     *
     */
    function flipImage($image)
    {
        $w = imagesx($image);   // 横幅
        $h = imagesy($image);   // 縦幅

        // 変換後の画像の生成（元の画像と同じサイズ）
        $destImage = @imagecreatetruecolor($w, $h);

        // 逆側から色を取得
        for ($i = 0; $i < $w; $i++) {
            for ($j = ($h - 1); $j >= 0; $j--) {
                $color_index = imagecolorat($image, $i, $j);
                $colors = imagecolorsforindex($image, $color_index);
                imagesetpixel($destImage, $i, abs($j - $h + 1), imagecolorallocate($destImage, $colors['red'], $colors['green'], $colors['blue']));
            }
        }

        return $destImage;
    }

    /**
     * 画像を回転
     *
     */
    function rotateImage($image, $angle, $bgd_color)
    {
         return imagerotate($image, $angle, $bgd_color, 0);
    }

    /**
     * 画像にテキストを挿入する
     *
     *  $image      @obj    挿入先の画像リソース
     *  $text       @str    挿入するテキスト
     *  $font       @int    フォント
     *  $size       @int    フォントサイズ
     *  $color      @str    フォントカラー
     *  $align      @str    水平位置
     *  $valign     @str    垂直位置
     *  $padding    @int    余白
     *  $angle      @int    傾き
     *  $stroke     @arr    線のオプション
     *  return      $obj    画像リソース
     *
     */
    function ImageInsertText($image, $text, $font, $size, $color, $align = 'left', $valign = 'top', $padding = 0, $angle = 0, $stroke = null)
    {
        // フォント
        if (!file_exists($font) || !is_file($font)) {
            return false;
        }

        $color_configs = array();

        // 線の色
        if (!is_null($stroke)) {
            if (!isset($stroke['color'])) {
                $stroke = colorCodeToArray('#000');
            }

            if (!isset($stroke['thick'])) {
                $stroke['thick'] = 1;
            }

            array_push($color_configs, $stroke);
        }

        // 文字色
        if (!$fill = colorCodeToArray($color)) {
            return false;
        }

        $fill['thick'] = 0;

        array_push($color_configs, $fill);

        // 生成する画像のサイズ
        $box = ImageTTFBBox($size, $angle, $font, $text);
        $box_w = ($box[2] - $box[6]) + ($stroke['thick'] * 2) + $padding * 2;
        $box_h = ($box[3] - $box[7]) + ($stroke['thick'] * 2) + $padding * 2;

        // 挿入先の画像のサイズ
        $cvs_w = imagesx($image);
        $cvs_h = imagesy($image);

        $w = $box[0];
        $h = -$box[1];

        switch ((string)$align) {
            case 'center':
                $w += ($cvs_w / 2) - ($box_w / 2);
                break;

            case 'right':
                $w += $cvs_w - $box_w;
                break;

            case 'left':
                $w += 0;
                break;

            default:
                $w += $align;
        }

        switch ((string)$valign) {
            case 'middle':
                $h += ($cvs_h / 2) - ($box_h / 2);
                break;

            case 'bottom':
                $h += $cvs_h - $box_h;
                break;

            case 'top':
                $h += 0;
                break;

            default:
                $h += $valign;
        }

        foreach ($color_configs as $key => $color_config) {
            $rgb = ImageColorAllocate($image, $color_config['r'], $color_config['g'], $color_config['b']);

            $x = -$color_config['thick'];

            while ($x <= $color_config['thick']) {
                $y = -$color_config['thick'];

                while ($y <= $color_config['thick']) {
                    $xx = $stroke['thick'] + $x + $padding;
                    $yy = $box_h - $stroke['thick'] + $y - $padding;

                    ImageTTFText($image, $size, $angle, $w + $xx, $h + $yy, $rgb, $font, $text);

                    $y++;
                }

                $x++;
            }
        }

        return $image;
    }

    /**
     * 画像に画像を挿入する
     *
     *  $image      @obj    挿入先の画像リソース
     *  $file_path  @str    挿入する画像のパス
     *  $max_w      @int    挿入する画像の横幅の上限
     *  $max_h      @int    挿入する画像の縦幅の上限
     *  $align      @str    水平位置
     *  $valign     @str    垂直位置
     *  return      $obj    画像リソース
     *
     */
    function ImageInsertImage($image, $file_path, $max_w = null, $max_h = null, $align = 'left', $valign = 'top')
    {
        if (!file_exists($file_path) || !is_file($file_path)) {
            return false;
        }

        // 挿入する画像の情報を取得
        list($org_w, $org_h, $type, $attr) = @getImageSize($file_path);

        switch ($type) {
            case IMAGETYPE_JPEG:
                $new_image = ImageCreateFromJPEG($file_path);
                break;

            case IMAGETYPE_PNG:
                $new_image = ImageCreateFromPNG($file_path);
                break;

            case IMAGETYPE_GIF:
                $new_image = ImageCreateFromGIF($file_path);
                break;

            default :
                return false;
        }

        // 挿入する画像のサイズを計算
        if (!is_null($max_w) && is_int($max_w) && !is_null($max_h) && is_int($max_h)) {
            // 縦横いずれかに調整
            $rate_w = $max_w / $org_w;
            $rate_h = $max_h / $org_h;
            $rate   = min($rate_w, $rate_h);
            $new_w  = round($org_w * $rate);
            $new_h  = round($org_h * $rate);

        } elseif (!is_null($max_w) && is_int($max_w)) {
            // 横幅固定で調整
            $new_w = $max_w;
            $rate  = $new_w / $org_w;
            $new_h = round($rate * $org_h);

        } elseif (!is_null($max_h) && is_int($max_w)) {
            // 縦幅固定で調整
            $new_h = $max_h;
            $rate  = $new_h / $org_h;
            $new_w = round($rate * $org_w);

        } else {
            $new_w = $org_w;
            $new_h = $org_h;
        }

        // 挿入先の画像のサイズ
        $cvs_w = imagesx($image);
        $cvs_h = imagesy($image);

        switch ((string)$align) {
            case 'center':
                $w = ($cvs_w / 2) - ($new_w / 2);
                break;

            case 'right':
                $w = $cvs_w - $new_w;
                break;

            case 'left':
                $w = 0;
                break;

            default:
                $w = $align;
        }

        switch ((string)$valign) {
            case 'middle':
                $h = ($cvs_h / 2) - ($new_h / 2);
                break;

            case 'bottom':
                $h = $cvs_h - $new_h;
                break;

            case 'top':
                $h = 0;
                break;

            default:
                $h = $valign;
        }

        if (!ImageCopyResampled($image, $new_image, $w, $h, 0, 0, $new_w, $new_h, $org_w, $org_h)) {
            if (!ImageCopyResized($image, $new_image, $w, $h, 0, 0, $new_w, $new_h, $org_w, $org_h)) {
                return false;
            }
        }

        return $image;
    }

    /**
     * HTMLカラーコードをRGBの配列に展開する
     *
     *  $color_code @str    HTMLカラーコード
     *  return      @arr    RGBの値を格納した配列
     *
     */
    function colorCodeToArray($color_code)
    {
        $color_code = str_replace('#', '', $color_code);

        if (!ctype_xdigit($color_code)) {
            return false;
        }

        switch (strlen($color_code)) {
            default:
                return false;

            case 3:
                $buf = '';

                foreach (str_split($color_code) as $hex) {
                    $buf .= $hex . $hex;
                }

                $color_code = $buf;

            case 6:
                $rgb = array();
                $callback = function($n) {return hexdec($n);};
                list($rgb['r'], $rgb['g'], $rgb['b']) = array_map($callback, str_split($color_code, 2));
        }

        return $rgb;
    }

    // 最大公約数を求める
    function gcd($m, $n)
    {
        if ($n > $m) list($m, $n) = array($n, $m);

        while ($n !== 0) {
            $tmp = $n;
            $n = $m % $n;
            $m = $tmp;
        }

        return $m;
    }

    // 最小公倍数を求める
    function lcm($m, $n)
    {
        return $m * $n / gcd($m, $n);
    }

    // 生年月日から年齢を求める
    function ageFromBirthday($birth)
    {
        $timestamp = strtotime($birth);

        $today = date('Ymd');
        $birth = date('Ymd', $timestamp);

        return floor(($today - $birth) / 10000);
    }

    // チェックボックスの値をDB値に変換する
    function convertCheckbox($values)
    {
        $data = 0;

        foreach ($values as $value) {
            $data += pow(2, $value);
        }

        return $data;
    }

    // DB値をチェックボックスの値に展開する
    function restoreCheckbox($data, $choices)
    {
        $values = array();

        foreach ($choices as $key => $val) {
            if (($data & pow(2, $key)) > 0) {
                $values[] = $key;
            }
        }

        return $values;
    }

    // カレンダー
    function getCalendar($y, $m, $w = 0, $by_week = true)
    {
        $time = "$y-$m-01 00:00:00";
        $curr = new DateTime($time);        // 当月
        $days = (int)$curr->format('t');    // 日数

        if ($by_week) {
            $head = ($curr->format('w') + 7 - $w) % 7;  // オフセット（前）
            $tail = (7 - ($head + $days) % 7) % 7;      // オフセット（後）
            $size = 7;

        } else {
            $head = 0;
            $tail = 0;
            $size = $days;
        }

        // カレンダー生成ロジック
        $rows = array_chunk(array_map(
            function($day) use($time, $days) {
                $date = new DateTime($time);

                if ($day < 1) {
                    return $date->modify('- ' . -($day - 1) . ' days')->format('Y-m-d');

                } elseif ($day > $days) {
                    return $date->modify('+ ' . ($day - 1) . ' days')->format('Y-m-d');

                } else {
                    return $date->modify('+ ' . ($day - 1) . ' days')->format('Y-m-d');
                }
            }, range(1 - $head, $days + $tail)
        ), $size);

        if (!$by_week) {
            return $rows[0];
        }

        return $rows;
    }

    // GoogleカレンダーAPIを使って日本の休日を取得する
    function getHolidays($y, $m)
    {
        $curr = new DateTime("$y-$m-01 00:00:00");

        $holidays_url = sprintf(
            'https://www.googleapis.com/calendar/v3/calendars/%s/events?key=%s&timeMin=%s&timeMax=%s&maxResults=%d&orderBy=startTime&singleEvents=true',
            'japanese__ja@holiday.calendar.google.com',
            GOOGLE_CALENDAR_API_KEY_SERVER,
            urlencode($curr->format('c')),
            urlencode($curr->modify('+ 1 month')->format('c')),
            30
        );

        $options = array();
        $options['ssl']['verify_peer']      = false;
        $options['ssl']['verify_peer_name'] = false;

        if ($results = file_get_contents($holidays_url, true, stream_context_create($options))) {
            $results = json_decode($results);
            $holidays = array();

            foreach ($results->items as $item) {
                $date = strtotime((string) $item->start->date);
                //$title = (string) $item->summary;
                $title = mb_strpos((string) $item->summary, '振替休日') === false ? $item->summary : '振替休日';
                $holidays[date('Y-m-d', $date)] = $title;
            }

            ksort($holidays);
        }

        return $holidays;
    }

    // ファイルやフォルダをZIP形式で圧縮する
    function zip($zip_path, $targets, $base, $root = '')
    {
        $ZipArchive = new ZipArchive;

        if (!$res = $ZipArchive->open($zip_path, ZipArchive::CREATE)) {
            return false;
        }

        // $rootが指定されている場合、その名前のフォルダ以下に格納する
        if (!empty($root)) {
            $ZipArchive->addEmptyDir($root);
            $root .= DIRECTORY_SEPARATOR;
        }

        $len = mb_strlen($base);

        if (!is_array($targets)) {
            $targets = array($targets);
        }

        foreach ($targets as $target) {
            if (file_exists($target)) {
                if (is_dir($target)) {
                    // ディレクトリ
                    $Iterator = new RecursiveIteratorIterator(
                        new RecursiveDirectoryIterator($target, FilesystemIterator::SKIP_DOTS | FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO),
                        RecursiveIteratorIterator::SELF_FIRST
                    );

                    foreach ($Iterator as $path => $entry) {
                        $localpath = $root . mb_substr($path, $len);

                        if ($entry->isFile()) {
                            $ZipArchive->addFile($path, $localpath);

                        } else {
                            $ZipArchive->addEmptyDir($localpath);
                        }
                    }

                } elseif (is_file($target)) {
                    // ファイル
                    $localpath = $root . mb_substr($target, $len);

                    $ZipArchive->addFile($target, $localpath);
                }
            }
        }

        $ZipArchive->close();

        return $zip_path;
    }

    // ZIP形式の圧縮ファイルを展開する
    function unzip($zip_path, $base)
    {
        $ZipArchive = new ZipArchive;

        if (!$res = $ZipArchive->open($zip_path)) {
            return false;
        }

        $ZipArchive->extractTo($base);
        $ZipArchive->close();

        return $zip_path;
    }

//--------------------------------------------------

    /**
     * PEARページャのオプションを取得
     *
     */
    function getPagerOptions($row_cnt, $limit = 10)
    {
        return array(
            'mode'                  => 'Sliding',
            'delta'                 => 3,
            'perPage'               => $limit,
            'prevImg'               => '<i class="glyphicon glyphicon-triangle-left"></i>',
            'nextImg'               => '<i class="glyphicon glyphicon-triangle-right"></i>',
            'firstPagePre'          => '',
            'firstPageText'         => '<i class="glyphicon glyphicon-step-backward"></i>',
            'firstPagePost'         => '',
            'lastPagePre'           => '',
            'lastPageText'          => '<i class="glyphicon glyphicon-step-forward"></i>',
            'lastPagePost'          => '',
            'separator'             => '',
            'spacesBeforeSeparator' => 1,
            'spacesAfterSeparator'  => 1,
            'totalItems'            => $row_cnt,
        );
    }

    /**
     * 小数点第二位で四捨五入
     *
     */
    function myRound($float)
    {
        return round($float, 2);
    }

    /**
     * 栄養価を100gあたりの含有量に調整する
     *
     */
    function adjustNutrientByPer($per, $value)
    {
        if (is_numeric($per)
         && is_numeric($value)
         && $per > 0
         && $value > 0
        ) {
            $value = myRound($value * (100 / $per));
        }

        return $value;
    }

    /**
     * ファイルを保存してファイル名を返す
     *
     */
    function saveFile($filename, $extra_dir = '')
    {
        if (isEmpty($filename)) {
            return '';
        }

        $extra_dir = '/' . (!isEmpty($extra_dir) ? trim($extra_dir, '/') : '');

        $save_dir  = PATH_UPLOAD . $extra_dir;
        $save_path = $save_dir . '/' . $filename;

        if (file_exists($save_path) || is_file($save_path)) {
            return $filename;
        }

        $tmp_dir  = PATH_UPLOAD_TMP . $extra_dir;
        $tmp_path = $tmp_dir . '/' . $filename;

        if (!file_exists($tmp_path) || !is_file($tmp_path)) {
            return '';
        }

        if (!file_exists($save_dir)) {
            mkdir($save_dir, 0777, true);
        }

        rename($tmp_path, $save_path);
        chmod($save_path, 0777);

        return $filename;
    }

    /**
     * 画像を保存してファイル名を返す
     *
     */
    function saveImage($filename, $extra_dir = '', $resize = null)
    {
        if (isEmpty($filename)) {
            return '';
        }

        $extra_dir = '/' . (!isEmpty($extra_dir) ? trim($extra_dir, '/') : '');

        $save_dir  = PATH_UPLOAD . $extra_dir;
        $save_path = $save_dir . '/' . $filename;

        if (file_exists($save_path) || is_file($save_path)) {
            return $filename;
        }

        $tmp_dir  = PATH_UPLOAD_TMP . $extra_dir;
        $tmp_path = $tmp_dir . '/' . $filename;

        if (!file_exists($tmp_path) || !is_file($tmp_path)) {
            return '';
        }

        if (!file_exists($save_dir)) {
            mkdir($save_dir, 0777, true);
        }

        rename($tmp_path, $save_path);
        chmod($save_path, 0777);

        if (is_numeric($resize) && $resize > 1) {
            // サムネイル
            $thmb_path = $tmp_dir . '/thmb.' . $filename;

            if (file_exists($thmb_path) && is_file($thmb_path)) {
                $save_path = $save_dir . '/thmb.' . $filename;
                rename($thmb_path, $save_path);
                chmod($save_path, 0777);
            }

            // スクエア
            $square_path = $tmp_dir . '/square.' . $filename;

            if (file_exists($square_path) && is_file($square_path)) {
                $save_path = $save_dir . '/square.' . $filename;
                rename($square_path, $save_path);
                chmod($save_path, 0777);
            }
        }

        return $filename;
    }

    /**
     * 連続するデリミタを一つに調整する
     *
     */
    function adjustDelimiter($str, $delimiter = '　')
    {
        $pattern     = array("/^(" . $delimiter . ")+/", "/(" . $delimiter . ")+/", "/(" . $delimiter . ")+$/");
        $replacement = array('', $delimiter, '');

        return preg_replace($pattern, $replacement, trim($str));
    }

    /**
     * 半角スペース、タブ文字を全角スペースに統一する
     *
     */
    function unifyDelimiter($str)
    {
        $str = str_replace(array(' ', "\t"), '　', $str);

        return adjustDelimiter($str);
    }

    /**
     * 日付から消費税率を返す
     *
     */
    function getTaxRate($date = null)
    {
        $rate = 0.08;
        $diff = new DateTime('2019-10-01');

        if (is_null($date)) {
            $date = new DateTime();
        }

        if ($date >= $diff) {
            $rate = 0.10;
        }

        return $rate;
    }

    function getTax($date = null)
    {
        return (getTaxRate($date) * 100) . '%';
    }



    /**
     * 指定した範囲の日付けでプルダウンリストを生成する
     *
     */
    function createDatePullDown($from, $to)
    {
        $set_date = array();

        $set_week = getSetValue('WEEK');

        while ($from->format('Ymd') < $to->format('Ymd')) {
            $set_date[$from->format('Y-m-d')] = $from->format('m月 d日') . '（' . $set_week[$from->format('w')] . '）';
            $from = $from->modify('+1 day');
        }

        return $set_date;
    }

    /**
     * お料理や食材の栄養価不足量を取得する
     *
     */
    function getShortage($values, $basis)
    {
        $shortage = array(
            'fiber'      => ($basis['fiber']      - $values['fiber']     ) > 0 ? myRound($basis['fiber']      - $values['fiber']     ) : 0,
            'protein'    => ($basis['protein']    - $values['protein']   ) > 0 ? myRound($basis['protein']    - $values['protein']   ) : 0,
            'vitamin_c'  => ($basis['vitamin_c']  - $values['vitamin_c'] ) > 0 ? myRound($basis['vitamin_c']  - $values['vitamin_c'] ) : 0,
            'vitamin_b1' => ($basis['vitamin_b1'] - $values['vitamin_b1']) > 0 ? myRound($basis['vitamin_b1'] - $values['vitamin_b1']) : 0,
            'iron'       => ($basis['iron']       - $values['iron']      ) > 0 ? myRound($basis['iron']       - $values['iron']      ) : 0,
            'calcium'    => ($basis['calcium']    - $values['calcium']   ) > 0 ? myRound($basis['calcium']    - $values['calcium']   ) : 0,
        );

        return $shortage;
    }

    /**
     * お料理や食材の栄養価充足率を取得する
     *
     */
    function getSufficiencyRate($values, $basis)
    {
        $rate = array(
            'fiber'      => floor($values['fiber']      / $basis['fiber']      * 100 / 2),
            'protein'    => floor($values['protein']    / $basis['protein']    * 100 / 2),
            'vitamin_c'  => floor($values['vitamin_c']  / $basis['vitamin_c']  * 100 / 2),
            'vitamin_b1' => floor($values['vitamin_b1'] / $basis['vitamin_b1'] * 100 / 2),
            'iron'       => floor($values['iron']       / $basis['iron']       * 100 / 2),
            'calcium'    => floor($values['calcium']    / $basis['calcium']    * 100 / 2),
            'glucide'    => floor($values['glucide']    / $basis['glucide']    * 100),
            'lipid'      => floor($values['lipid']      / $basis['lipid']      * 100),
            'salt'       => floor($values['salt']       / $basis['salt']       * 100),
            'calorie'    => floor($values['calorie']    / $basis['calorie']    * 100),
        );

        return $rate;
    }

    /**
     * 栄養価充足率をチャート用に丸める
     *
     */
    function roundSufficiencyRate($rate)
    {
        $rate = array(
            'fiber'      => $rate['fiber']      < 100 ? $rate['fiber']      : 100,
            'protein'    => $rate['protein']    < 100 ? $rate['protein']    : 100,
            'vitamin_c'  => $rate['vitamin_c']  < 100 ? $rate['vitamin_c']  : 100,
            'vitamin_b1' => $rate['vitamin_b1'] < 100 ? $rate['vitamin_b1'] : 100,
            'iron'       => $rate['iron']       < 100 ? $rate['iron']       : 100,
            'calcium'    => $rate['calcium']    < 100 ? $rate['calcium']    : 100,
            'glucide'    => $rate['glucide']    < 200 ? $rate['glucide']    : 200,
            'lipid'      => $rate['lipid']      < 200 ? $rate['lipid']      : 200,
            'salt'       => $rate['salt']       < 200 ? $rate['salt']       : 200,
            'calorie'    => $rate['calorie']    < 200 ? $rate['calorie']    : 200,
        );

        return $rate;
    }

    /**
     * バーチャート画像を生成する
     *
     *  $values     @mix    栄養価
     *  $options    @arr    オプション
     *  $save_path  @str    出力パス
     *  return      @str    出力パス
     *
     */
    function getBarChart($values, $basis, $options = array(), $save_path = null, $output = false)
    {
        require_once 'pChart-2.1.4/class/pData.class.php';
        require_once 'pChart-2.1.4/class/pDraw.class.php';
        require_once 'pChart-2.1.4/class/pImage.class.php';

        // キャプション
        $caption = '控えめ成分';

        // ラベル
        $labels = getBarChartLabels();

        // 画像サイズ
        if (isset($options['width']) && is_numeric($options['width'])) {
            $w = $options['width'];
        } else {
            $w = 300;
        }

        if ($w < 200) {
            $h = (int)($w / 1);
            // 描画領域の余白
            $padding_x = (int)(60 * ($w / 300));
            $padding_y = (int)(60 * ($w / 300));

        } else {
            $h = (int)($w / 1.3);
            // 描画領域の余白
            $padding_x = (int)(60 * ($w / 300));
            $padding_y = (int)(30 * ($w / 300));
        }

        // 使用するフォントのパス
        $font_path = PATH_LIBRARIES . '/pChart-2.1.4/fonts/ipagp.ttf';

        // フォントサイズ
        $font_size = (int)(10 * ($w / 300));

        // バーの色
        $hidden  = array('R' => 255, 'G' => 255, 'B' => 255, 'Alpha' => 0);
        $safety  = array('R' => 32,  'G' => 128, 'B' => 255, 'Alpha' => 100);
        $warning = array('R' => 255, 'G' => 128, 'B' => 32,  'Alpha' => 100);
        $danger  = array('R' => 255, 'G' => 32,  'B' => 32,  'Alpha' => 100);

        // お料理（献立）の栄養価充足率を取得
        $rate = getSufficiencyRate($values, $basis);

        // 栄養価充足率をチャート用に丸める
        $rate = roundSufficiencyRate($rate);

        // -------------------------------------------------------------------------
        // データセット
        // -------------------------------------------------------------------------

        // データ用オブジェクト
        $pData = new pData();

        // ラベル
        $pData->addPoints($labels, 'Labels');
        $pData->setAbscissa('Labels');
        $pData->setAxisName(0, '少 ← 基準 → 多');

        // 最大値
        $pData->addPoints(array(/*200, */200, 200, 200), 'Basis');

        // パラメータ
        $pData->addPoints(array(/*$rate['glucide'], */$rate['lipid'], $rate['salt'], $rate['calorie']), 'Values');

        // -------------------------------------------------------------------------
        // 描画
        // -------------------------------------------------------------------------

        // 画像描画用オブジェクト
        $pImage = new pImage($w, $h, $pData);

        // 描画領域の設定
        $pImage->setGraphArea($padding_x, $padding_y, (int)$w - ($padding_x / 2), (int)$h - ($padding_y / 2));

        // フォントの設定
        $pImage->setFontProperties(array('FontName' => $font_path, 'FontSize' => $font_size, 'R' => 64, 'G' => 64, 'B' => 64));

        // アンチエイリアスをオフ
        $pImage->Antialias = false;

        // 目盛りを描画
        $pImage->drawScale(array(
            'Mode'            => SCALE_MODE_START0,
            'Pos'             => SCALE_POS_TOPBOTTOM,
            'XReleasePercent' => 0,
            'OuterTickWidth'  => 4,
            'InnerTickWidth'  => 4,
            'DrawSubTicks'    => true,
            'SubTickR'        => 0,
            'SubTickG'        => 0,
            'SubTickB'        => 0,
        ));

        // 最大値を非表示
        $pData->setSerieDrawable('Basis', false);

        // バーチャートを描画
        $pImage->drawBarChart(array(
            'DisplayPos'     => LABEL_POS_INSIDE,
            'DisplayValues'  => false,
            'Rounded'        => false,
            'Surrounding'    => 0,
            'OverrideColors' => array(
                /*$rate['glucide']     > 125 ? $rate['glucide']     > 175 ? $danger : $warning : $safety,*/
                $rate['lipid']       > 125 ? $rate['lipid']       > 175 ? $danger : $warning : $safety,
                $rate['salt']        > 125 ? $rate['salt']        > 175 ? $danger : $warning : $safety,
                $rate['calorie']     > 125 ? $rate['calorie']     > 175 ? $danger : $warning : $safety,
            ),
        ));

        // 基準線を描画
        $pImage->drawThreshold(100, array('R' => 32, 'G' => 32, 'B' => 32, 'Ticks' => 3));

        if (!is_null($save_path)) {
            // ファイルに保存
            $pImage->render($save_path);
        }

        if ($output) {
            // ブラウザに出力
            $pImage->autoOutput();

        } else {
            return $save_path;
        }
    }

    /**
     * バーチャートのラベルを取得する
     *
     */
    function getBarChartLabels()
    {
        return getSetValue('BAR_CHART_LABEL');
    }

    /**
     * レーダーチャート画像を生成する
     *
     *  $values     @mix    栄養価
     *  $options    @arr    オプション
     *  $save_path  @str    出力パス
     *  return      @str    出力パス
     *
     */
    function getRadarChart($values, $basis, $options = array(), $save_path = null, $output = false)
    {
        require_once 'pChart-2.1.4/class/pData.class.php';
        require_once 'pChart-2.1.4/class/pDraw.class.php';
        require_once 'pChart-2.1.4/class/pRadar.class.php';
        require_once 'pChart-2.1.4/class/pImage.class.php';

        // キャプション
        $caption = '栄養価バランス';

        // ラベル
        if (isset($options['label']) && $options['label'] == 0) {
            // ラベルなし
            $labels = array('', '', '', '', '', '');

        } else {
            $labels = getRadarChartLabels();
        }

        // 画像サイズ
        if (isset($options['width']) && is_numeric($options['width'])) {
            $w = $options['width'];
        } else {
            $w = 300;
        }

        if (isset($options['label']) && $options['label'] == 0
         && isset($options['legend']) && $options['legend'] == 0
        ) {
            $h = (int)($w / 1);
        } else {
            $h = (int)($w / 1.3);
        }

        // 描画領域の余白
        $padding = (int)(10 * ($w / 300));

        // 使用するフォントのパス
        $font_path = PATH_LIBRARIES . '/pChart-2.1.4/fonts/ipagp.ttf';

        // フォントサイズ
        $font_size = (int)(10 * ($w / 300));

        // お料理（献立）の栄養価充足率を取得
        $rate = getSufficiencyRate($values, $basis);

        // 栄養価充足率をチャート用に丸める
        $rate = roundSufficiencyRate($rate);

        // -------------------------------------------------------------------------
        // データセット
        // -------------------------------------------------------------------------

        // データ用オブジェクト（摂取基準値）
        $BasisData = new pData();
        $BasisData->addPoints(array(50, 50, 50, 50, 50, 50), 'Basis');
        $BasisData->setPalette('Basis', array('R' => 255, 'G' => 64, 'B' => 64, 'Alpha' => 100));
        $BasisData->setSerieDescription('Basis', mb_convert_encoding('基準', 'sjis', 'auto'));
        $BasisData->addPoints($labels, 'Labels');
        $BasisData->setAbscissa('Labels');

        // データ用オブジェクト（パラメータ）
        $ValuesData = new pData();
        $ValuesData->addPoints(array($rate['fiber'], $rate['protein'], $rate['vitamin_c'], $rate['vitamin_b1'], $rate['iron'], $rate['calcium']), 'Values');
        $ValuesData->setPalette('Values', array('R' => 255, 'G' => 192, 'B' => 0, 'Alpha' => 100));
        $ValuesData->addPoints(array('', '', '', '', '', ''), 'Labels');
        $ValuesData->setAbscissa('Labels');

        // データ用オブジェクト（栄養価追加後）
        if (isset($options['values2']) && is_array($options['values2']) && count($options['values2']) > 0) {
            //$basis2 = isset($options['basis2']) ? $options['basis2'] : $basis;
            //$rate = getSufficiencyRate($options['values2'], $basis2);
            $rate = getSufficiencyRate($options['values2'], $basis);
            $rate = roundSufficiencyRate($rate);

            $Values2Data = new pData();
            $Values2Data->addPoints(array($rate['fiber'], $rate['protein'], $rate['vitamin_c'], $rate['vitamin_b1'], $rate['iron'], $rate['calcium']), 'Values2');
            $Values2Data->setPalette('Values2', array('R' => 0, 'G' => 192, 'B' => 0, 'Alpha' => 100));
            $Values2Data->addPoints(array('', '', '', '', '', ''), 'Labels');
            $Values2Data->setAbscissa('Labels');
        }

        // -------------------------------------------------------------------------
        // 描画
        // -------------------------------------------------------------------------

        // 画像オブジェクト
        $Image = new pImage($w, $h, $BasisData);

        // 描画領域の設定
        $Image->setGraphArea($padding, $padding, $w - $padding, $h - $padding);

        // フォントの設定
        $Image->setFontProperties(array('FontName' => $font_path, 'FontSize' => $font_size, 'R' => 64, 'G' => 64, 'B' => 64));

        // 背景を描画
        $Image->drawFilledRectangle(0, 0, $w, $h, array(
            'R' => 255, 'G' => 255, 'B' => 255,
            //'Dash' => 1, 'DashR' => 245, 'DashG' => 228, 'DashB' => 207,    // 斜線の幅と色
        ));

        // 凡例を描画
        if (isset($options['legend']) && $options['legend'] == 0) {
            // 凡例なし

        } else {
            $Image->drawLegend((int)($w * 0.8), (int)($h * 0.08), array(
                'Mode'        => LEGEND_VERTICAL,   // LEGEND_HORIZONTAL,
                'Style'       => LEGEND_BOX,        // LEGEND_NOBORDER,
                'Family'      => LEGEND_FAMILY_BOX, // LEGEND_FAMILY_CIRCLE, LEGEND_FAMILY_LINE,
                //'BoxWidth'    => 15,
                'Surrounding' => 10,
                'R' => 128, 'G' => 64, 'B' => 0, 'Alpha' => 20,
                'FontSize'    => $font_size,
            ));
        }

        // レーダーチャート作成用オブジェクト
        $Radar = new pRadar();

        // レーダーチャートを描画
        $Radar->drawRadar($Image, $BasisData, array(
            'Layout'         => RADAR_LAYOUT_STAR,        // チャートのレイアウト（丸型）
            'FixedMax'       => 100,                      // データセットの最大値
            'WriteValues'    => false,                    // データセットの値を表示
            'DrawPoints'     => false,                    // データセットのポイントを表示
            'DrawPoly'       => false,                    // データセットをつないだ領域を塗りつぶす
            'DrawBackground' => false,                    // 背景を表示
            'AxisRotation'   => -90,                      // 軸の角度
            'DrawAxisValues' => false,                    // 軸の値を表示
            'WriteLabels'    => true,                     // ラベルを表示
            'LabelPos'       => RADAR_LABELS_HORIZONTAL,  // ラベルの表示形式（水平）
            'DrawTicks'      => false,                    // ラベルのところにぴゅっと出る線を表示
        ));

        if (isset($options['values2']) && is_array($options['values2']) && count($options['values2']) > 0) {
            $Radar->drawRadar($Image, $Values2Data, array(
                'FixedMax'       => 100,                      // データセットの最大値
                'WriteValues'    => false,                    // データセットの値を表示
                'DrawPoints'     => false,                    // データセットのポイントを表示
                'DrawPoly'       => true,                     // データセットをつないだ領域を塗りつぶす
                'DrawBackground' => false,                    // 背景を表示
                'AxisRotation'   => -90,                      // 軸の角度
                'DrawAxisValues' => false,                    // 軸の値を表示
                'AxisR' => 0, 'AxisG' => 0, 'AxisB' => 0, 'AxisAlpha' => 0,
                'WriteLabels'    => true,                     // ラベルを表示
                'LabelPos'       => RADAR_LABELS_HORIZONTAL,  // ラベルの表示形式（水平）
            ));
        }

        $Radar->drawRadar($Image, $ValuesData, array(
            'FixedMax'       => 100,                      // データセットの最大値
            'WriteValues'    => false,                    // データセットの値を表示
            'DrawPoints'     => false,                    // データセットのポイントを表示
            'DrawPoly'       => true,                     // データセットをつないだ領域を塗りつぶす
            'DrawBackground' => false,                    // 背景を表示
            'AxisRotation'   => -90,                      // 軸の角度
            'DrawAxisValues' => false,                    // 軸の値を表示
            'AxisR' => 0, 'AxisG' => 0, 'AxisB' => 0, 'AxisAlpha' => 0,
            'WriteLabels'    => true,                     // ラベルを表示
            'LabelPos'       => RADAR_LABELS_HORIZONTAL,  // ラベルの表示形式（水平）
        ));

        if (!is_null($save_path)) {
            // ファイルに保存
            $Image->render($save_path);
        }

        if ($output) {
            // ブラウザに出力
            $Image->autoOutput();

        } else {
            return $save_path;
        }
    }

    /**
     * レーダーチャートのラベルを取得する
     *
     */
    function getRadarChartLabels()
    {
        return getSetValue('RADER_CHART_LABEL');
    }

    /**
     * 摂取基準値および栄養価の演算結果を返す
     *
     */
    function calculateValues($values_l, $operator, $values_r)
    {
        $result = array();
        $keys   = getSetValue('NUTRIENT');

        switch ($operator) {
            case '+':
                foreach ($keys as $key => $value) {
                    if (isset($values_l[$key]) && isset($values_r[$key])) {
                        $result[$key] = $values_l[$key] + $values_r[$key];
                    }
                }
                break;

            case '-':
                foreach ($keys as $key => $value) {
                    if (isset($values_l[$key]) && isset($values_r[$key])) {
                        $result[$key] = $values_l[$key] - $values_r[$key];
                        //$result[$key] = $result[$key] > 0 ? $result[$key] : 0;
                    }
                }
                break;

            case '*':
                foreach ($keys as $key => $value) {
                    if (isset($values_l[$key])) {
                        $result[$key] = myRound($values_l[$key] * $values_r);
                    }
                }
                break;

            case '/':
                foreach ($keys as $key => $value) {
                    if (isset($values_l[$key])) {
                        $result[$key] = myRound($values_l[$key] / $values_r);
                    }
                }
                break;

            default:
                return false;
        }

        return $result;
    }

    /**
     * お料理（献立）の総カロリーを返す
     *
     */
    function sumCalorie($dishes)
    {
        $total_calorie = 0;

        foreach ($dishes as $dish) {
            $total_calorie += $dish->calorie;
        }

        return $total_calorie;
    }

    /**
     * 基準値、栄養価のデバッグ表示
     *
     */
    function debugNutrient($args)
    {
        $set_nutrient_name = getSetValue('NUTRIENT_NAME');
        $nutrients = array('label' => array(), /*'fiber' => array(), 'protein' => array(), 'vitamin_c' => array(), 'vitamin_b1' => array(), 'iron' => array(), 'calcium' => array(),*/ 'glucide' => array(), 'lipid' => array(), 'salt' => array(), 'calorie' => array());
        $buf = '';

        if (count($args) > 0) {
            foreach ($args as $arg) {
                array_push($nutrients['label'],      $arg[0]);
                /*
                array_push($nutrients['fiber'],      $arg[1]['fiber']);
                array_push($nutrients['protein'],    $arg[1]['protein']);
                array_push($nutrients['vitamin_c'],  $arg[1]['vitamin_c']);
                array_push($nutrients['vitamin_b1'], $arg[1]['vitamin_b1']);
                array_push($nutrients['iron'],       $arg[1]['iron']);
                array_push($nutrients['calcium'],    $arg[1]['calcium']);
                */
                array_push($nutrients['glucide'],    $arg[1]['glucide']);
                array_push($nutrients['lipid'],      $arg[1]['lipid']);
                array_push($nutrients['salt'],       $arg[1]['salt']);
                array_push($nutrients['calorie'],    $arg[1]['calorie']);
            }

            $buf .= '<pre>';
            $buf .= '<table style="width:auto;font-size:12px;">';

            foreach ($nutrients as $key => $val) {
                $buf .= '<tr style="border-bottom:1px #999 solid;">';
                $buf .= '<td style="padding:2px; background-color:#CCC; text-align:center;">' . ($key != 'label' ? $set_nutrient_name[$key] : '') . '</td>';

                foreach ($val as $k => $v) {
                    $buf .= '<td style="padding:2px; padding-left:8px; text-align:' . ($key != 'label' ? 'right' : 'center') . ';">' . ($key != 'label' ? sprintf('%.2f', $v) : $v) . '</td>';
                }

                $buf .= '</tr>';
            }

            $buf .= '</table>';
            $buf .= '</pre>';
        }

        return $buf;
    }

    /**
     * 基準値、栄養価にレートを反映
     *
     */
    function applyRate($values, $rate)
    {
        $result = array();

        foreach ($values as $key => $val) {
            $result[$key] = myRound($val * $rate);
        }

        return $result;
    }
