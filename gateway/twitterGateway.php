<?php

/**
 * Class TwitterGateway
 *
 * Инкапсулирует доступ к API твиттера, а конкретнее к XML-фиду пользователя
 * Транслирует объектный вызов в API твиттера
 */
class TwitterGateway
{
    public function getLastTweet($username)
    {
        $endPoint = "http://twitter.com/statuses/user_timeline/{$username}.xml?count=1";
        $buffer = file_get_contents($endPoint);
        $xml = new SimpleXMLElement($buffer);
        return $xml->status->text;
    }
}

$gateway = new TwitterGateway();
echo $gateway->getLastTweet('giorgiosironi'), "\n"; 
