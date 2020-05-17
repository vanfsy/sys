<?php

namespace Extensions;

class DateTime extends \DateTime
{
    /**
     * 年齢を返す
     *
     */
    function getAge()
    {
        $now = new DateTime();

        $today = $now->format('Ymd');
        $birth = $this->format('Ymd');

        return floor(($today - $birth) / 10000);
    }
}
