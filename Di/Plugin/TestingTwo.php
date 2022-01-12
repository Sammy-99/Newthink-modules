<?php

namespace Newthink\Di\Plugin;

class TestingTwo
{
    public function beforeSetTitle(\Newthink\Di\Controller\Example\Index $subject, $title)
    {
            echo "beforeSetTitle(from classTwo) <br>";
            $title = $title."beforeSetTitle(from classTwo) ";
            return $title;
    }

    public function afterSetTitle(\Newthink\Di\Controller\Example\Index $subject, $title)
    {
            echo "afterSetTitle(from classTwo) <br>";
            $title = $title."afterSetTitle(from classTwo) ";
            return $title;
    }

    public function afterGetTitle(\Newthink\Di\Controller\Example\Index $subject, $result)
    {
            echo "afterGetTitle(from classTwo) <br>";
            $result = "Hello".$result;
            return $result;
    }

    public function aroundGetTitle(\Newthink\Di\Controller\Example\Index $subject, callable $proceed)
	{
		echo " - Before proceed(from classTwo) </br>";
		 $result = $proceed();
		echo " - After proceed(from classTwo) </br>";

		return $result;
	}
}