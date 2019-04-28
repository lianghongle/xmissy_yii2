<?php
namespace strong\helpers;

/**
 * 字符串助手类
 *
 * Class StringHelper
 * @package strong\helpers
 */
class StringHelper extends \yii\helpers\StringHelper
{
    const CHAR_NUMBER = 'number';
    const CHAR_LOWER = 'lower';
    const CHAR_UPPER = 'upper';
    const CHAR_SPECIAL ='special';
    public static $charSet = [
        self::CHAR_NUMBER => ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
        self::CHAR_LOWER =>['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
                   's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
        ],
        self::CHAR_UPPER => ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
                    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ],
        self::CHAR_SPECIAL => ["!", "@", "#", "$", "?", "|", "{", "/", ":", ";", "%", "^", "&", "*", "(", ")", "-", "_",
                      "[", "]", "}", "<", ">", "~", "+", "=", ",", "."
        ]
    ];

    /**
     * 随机生成指定长度字符串
     *
     * @param $lenght
     *
     * @return string
     */
    public static function random($max_length = 0, $min_length = null, $setOption = [])
    {
        if(empty($setOption)){
            $setOption = [
                self::CHAR_NUMBER, self::CHAR_LOWER, self::CHAR_UPPER
            ];
        }

        if(!is_null($min_length) && $min_length < $max_length){
            $max_length = rand($min_length, $max_length);
        }

        $chars = [];

        foreach (self::$charSet as $key=>$value){
            if(in_array($key, $setOption)){
                $chars = array_merge($chars, self::$charSet[$key]);
            }
        }

        $charsLen = count($chars) - 1;
        shuffle($chars);                            //打乱数组顺序
        $str = '';
        for($i=0; $i<$max_length; $i++){
            $str .= $chars[mt_rand(0, $charsLen)];    //随机取出一位
        }

        return $str;
    }
}
