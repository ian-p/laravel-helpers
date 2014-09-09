<?php namespace Levitated\Helpers;

class LH {

    /**
     * Value-wise emptiness check. For example, array('emails' => array()) will be considered empty.
     * Arrays need to have at least one non-empty element to be considered non-empty.
     *
     * @param mixed $obj
     * @return bool
     */
    public static function isObjectEmpty($obj) {
        $hasValue = false;
        if (is_array($obj)) {
            foreach ($obj as $val) {
                if (!self::isObjectEmpty($val)) {
                    $hasValue = true;
                }
            }
        } else {
            $hasValue = !empty($obj);
        }

        return !$hasValue;
    }

    /**
     * Implode an array to string and use an alternative glue string for the last element.
     *
     * @param array  $arr
     * @param string $glue
     * @param string $last_glue
     * @return string
     */
    public static function implodeWithAnd($arr, $glue = ', ', $last_glue = ' and ') {
        if (count($arr) > 1) {
            $last_el = array_pop($arr);
            $res = implode($glue, $arr) . $last_glue . $last_el;
        } else {
            $res = implode($glue, $arr);
        }

        return $res;
    }

    /**
     * Get value from an array or its default.
     * If $name is null then this function will return the $from parameter if it isn't empty
     * or $default if it is.
     * Otherwise it will check if a key $name exists in array $from and return it or $default
     * in other case.
     *
     * @param mixed $name
     * @param mixed $from
     * @param mixed $default
     * @return mixed
     */
    public static function getVal($name = null, $from = null, $default = null) {
        if ($name !== null) {
            if (isset($from[$name])) {
                return $from[$name];
            }
        } else {
            if (!empty($from)) {
                return $from;
            }
        }

        return $default;
    }
}