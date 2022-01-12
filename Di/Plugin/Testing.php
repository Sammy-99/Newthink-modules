<?php

namespace Newthink\Di\Plugin;

class Testing
{
    public function beforeSetTitle(\Newthink\Di\Controller\Example\Index $subject, $title)
    {
            echo "beforeSetTitle() <br>";
            $title = $title."beforeSetTitle() ";
            return $title;
    }

    public function afterSetTitle(\Newthink\Di\Controller\Example\Index $subject, $title)
    {
            echo "afterSetTitle() <br>";
            $title = $title."afterSetTitle() ";
            return $title;
    }

    public function afterGetTitle(\Newthink\Di\Controller\Example\Index $subject, $result)
    {
            echo "afterGetTitle() <br>";
            $result = "Hello".$result;
            return $result;
    }

    public function aroundGetTitle(\Newthink\Di\Controller\Example\Index $subject, callable $proceed)
	{
		echo " - Before proceed() </br>";
		 $result = $proceed();
		echo " - After proceed() </br>";

		return $result;
	}
}