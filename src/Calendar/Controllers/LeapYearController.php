<?php

namespace Calendar\Controllers;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function indexAction($year): Response
    {
        $leapYear = new LeapYear();

        if ($leapYear->isLeapYear($year)) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }
}