<?php

namespace BackEndBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testSettings()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_settings');
    }

    public function testAdminmanage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_adminManage');
    }

    public function testAddgel()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_addGel');
    }

    public function testUpdgel()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_updGel');
    }

    public function testSiggel()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_sigGel');
    }

    public function testAddflavour()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_addFlavour');
    }

    public function testUpdflavour()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_updFlavour');
    }

    public function testDelflavour()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_delFlavour');
    }

    public function testDashboard()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '_dashboard');
    }

}
