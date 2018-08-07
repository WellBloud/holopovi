<?php
/**
 * @author: wellbloud
 * created: 5.8.18
 */
declare(strict_types=1);


namespace App\Model\Helpers;


abstract class DateFormatHelper
{

    /**
     * Displays how many years, months and days it has been from set date
     * @param \DateTime $date
     * @return string
     */
    public static function formatTimeAgo(\DateTime $date)
    {
        $diff = abs(strtotime(date("Y-m-d")) - strtotime($date->format("Y-m-d")));

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        if ($years == 1) {
            $ystr = 'rokem';
        } else {
            if ($years > 1 && $years < 5) {
                $ystr = 'roky';
            } else {
                $ystr = 'roky';
            }
        }
        if ($months == 1) {
            $mstr = 'měsícem';
        } else {
            if ($months > 1 && $months < 5) {
                $mstr = 'měsíci';
            } else {
                $mstr = 'měsíci';
            }
        }
        if ($days == 1) {
            $dstr = 'dnem';
        } else {
            if ($days > 1 && $days < 5) {
                $dstr = 'dny';
            } else {
                $dstr = 'dny';
            }
        }

        $final_string = 'Před ';
        if ($years != 0) {
            $final_string .= $years . ' ' . $ystr;
            if ($months == 0) {
                $final_string .= ' a ';
            }
        }
        if ($months != 0) {
            if ($years != 0) {
                $final_string .= ' ';
            }
            $final_string .= $months . ' ' . $mstr . ' a ';
        }
        $final_string .= $days . ' ' . $dstr;

        return $final_string;
    }
}