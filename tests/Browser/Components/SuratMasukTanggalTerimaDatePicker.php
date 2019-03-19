<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class SuratMasukTanggalTerimaDatePicker extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#tanggal-terima';
    }

    /**
     * Assert that the browser page contains the component.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertVisible($this->selector());
    }

    /**
     * Get the element shortcuts for the component.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@date-field' => 'input.datepicker',
            '@month-list' => 'div > div.datepicker-months',
            '@day-list' => 'div > div.datepicker-days'
        ];
    }

    /**
     * Select the given date.
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @param  int  $year
     * @param  int  $month
     * @param  int  $day
     * @return void
     */
    public function selectTanggalTerima($browser, $month, $day)
    {
        $browser
            ->click('@date-field')
            ->within('@month-list', function ($browser) use ($month) {
                $browser->click($month);
            })
            ->within('@day-list', function ($browser) use ($day) {
                $browser->click($day);
            });
    }
}
