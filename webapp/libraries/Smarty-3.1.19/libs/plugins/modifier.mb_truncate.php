<?php

/**
 * Smarty plugin
 * 文字列の切捨て処理（マルチバイト用）
 *
 */
function smarty_modifier_mb_truncate($string, $length = 80, $etc = '...')
{
    if (!$length) {
        return;
    }

    if (mb_strlen($string) > $length) {
        return mb_substr($string, 0, $length) . $etc;
    } else {
        return $string;
    }
}

?>