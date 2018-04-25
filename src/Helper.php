<?php

namespace CJF\ThinkIot;


class Helper
{
    /**
     * 生成随机数
     *
     * @return string
     */
    public static function generateRandomId()
    {
        $ran_str = mt_rand(100, 999);
        return $ran_str . date('YmdHis') . $ran_str;
    }

    /**
     * 生成签名
     *
     * @param array $data
     * @return string
     */
    public static function generateSign(array $data)
    {
        $app_key = $data['appKey'];
        unset($data['appKey']);
        ksort($data);
        $str = $app_key;
        foreach ($data as $field => $value) {
            $str .= $field . $value;
        }
        $str .= $app_key;
        return md5($str);
    }

    public static function listKeyToLower($list)
    {
        $new = [];

        foreach ($list as $item) {
            $new_item = [];

            foreach ($item as $key => $val) {
                $new_item[strtolower($key)] = $val;
            }

            $new[] = $new_item;
        }

        return $new;
    }
}