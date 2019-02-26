<?php

namespace AssuranceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MatchmakingControllerTest extends WebTestCase
{
    public function testShowassurance()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/assurances');
    }

}
