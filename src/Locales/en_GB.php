<?php

namespace Moment\Locales;

use Moment\Provider\LocaleProvider;

/**
 * Class en_GB
 * @package Moment\Locales
 *
 * Great britain english (en-gb) locale
 *
 * @author Chris Gedrim <https://github.com/chrisgedrim>
 */
class en_GB extends LocaleProvider
{
    /**
     * {@inheritdoc}
     */
    protected function defineLocale(array $definitions = null)
    {
        $this->setDefinitions([
            "months"           => explode('_',
                'January_February_March_April_May_June_July_August_September_October_November_December'),
            "monthsNominative" => explode('_',
                'January_February_March_April_May_June_July_August_September_October_November_December'),
            "monthsShort"      => explode('_', 'Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec'),
            "weekdays"         => explode('_', 'Monday_Tuesday_Wednesday_Thursday_Friday_Saturday_Sunday'),
            "weekdaysShort"    => explode('_', 'Mon_Tue_Wed_Thu_Fri_Sat_Sun'),
            "calendar"         => [
                "sameDay"  => '[Today]',
                "nextDay"  => '[Tomorrow]',
                "lastDay"  => '[Yesterday]',
                "lastWeek" => '[Last] l',
                "sameElse" => 'l',
                "withTime" => '[at] H:i',
                "default"  => 'd/m/Y',
            ],
            "relativeTime"     => [
                "future" => 'in %s',
                "past"   => '%s ago',
                "s"      => 'a few seconds',
                "m"      => 'a minute',
                "mm"     => '%d minutes',
                "h"      => 'an hour',
                "hh"     => '%d hours',
                "d"      => 'a day',
                "dd"     => '%d days',
                "M"      => 'a month',
                "MM"     => '%d months',
                "y"      => 'a year',
                "yy"     => '%d years',
            ],
            "ordinal"          => function ($number) {
                $n    = $number % 100;
                $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

                if ($n >= 11 && $n <= 13) {
                    return $number . '[th]';
                }

                return $number . '[' . $ends[$number % 10] . ']';
            },
            "week"             => [
                "dow" => 1, // Monday is the first day of the week.
                "doy" => 4  // The week that contains Jan 4th is the first week of the year.
            ],
        ]);


        // Apply $definitions if array is supplied
        if ($definitions !== null) {
            $this->alterDefinitions($definitions);
        }
    }
}
