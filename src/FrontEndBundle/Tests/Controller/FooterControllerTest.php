<?php

namespace FrontEndBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FooterControllerTest extends WebTestCase
{
    public function testSegnala()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_segnala[D[D[D[D[D[D[D');
    }

    public function testChisiamo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_chisiamo');
    }

    public function testPrivacy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_privacy');
    }

    public function testContatti()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_contatti');
    }

}
