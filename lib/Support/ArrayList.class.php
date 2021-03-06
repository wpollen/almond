<?php

class ArrayList
{
    /**
     * 判断多维数组
     * Is Array Multidim
     * @param  $array
     * @return boolean
     */
    public static function isMultidim($array)
    {
        if (!is_array($array)) {
            return false;
        }

        return (bool)count(array_filter($array, 'is_array'));
    }

    /**
     * 判断关联数组
     * Is Array Assoc
     * @param  $array
     * @return boolean
     */
    public static function isAssoc($array)
    {
        return (bool)count(array_filter(array_keys($array), 'is_string'));
    }


    /**
     * 数组排序 默认降序
     *
     * @param array  $arr       排序数组
     * @param string $field     需排序字段
     * @param int    $sort_by   降序还是升序
     * @param int    $sort_type 按照什么类型排序 字符串 数字
     *
     * @return array
     */
    public static function multiSort($arr, $field = '', $sort_by = SORT_ASC, $sort_type = SORT_NUMERIC)
    {
        if($field){
            $temp = array_map(function($v) use($field) {
                return $v[$field];
            }, $arr);
        } else {
            $temp = $arr;
        }

        array_multisort($temp, $sort_by, $sort_type, $arr);
        return $arr;
    }
}