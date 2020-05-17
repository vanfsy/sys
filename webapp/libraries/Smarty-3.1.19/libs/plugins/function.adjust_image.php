<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 *
 * -------------------------------------------------------------
 * File:     function.adjust_image.php
 * Type:     function
 * Name:     adjust_image
 * Purpose:  �w�肵�����Œ��������摜�̉�����Ԃ�
 * -------------------------------------------------------------
 */
function smarty_function_adjust_image($params, &$smarty)
{
    if (!isset($params['path'])) {
        return '';
    }

    if (!isset($params['size'])) {
        return '';
    }

    list($width, $height, $type, $attr) = getimagesize($params['path']);

    if ($width == $height) {
        return 'height:' . $params['size'] . 'px;';

    } elseif ($width > $height) {
        return 'width:' . $params['size'] . 'px;';

    } elseif ($height > $width) {
        return 'height:' . $params['size'] . 'px;';
    }

    return 'width:' . $params['size'] . 'px;';
}
