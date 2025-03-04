<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Http\Request;

class ScrapingController extends Controller
{
    public function scrapeQuotes(): JsonResponse

    {

        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', 'https://www.asos.com/men/');
        $html = $crawler->outerHtml();

    return response()->json($html);

    }
}
