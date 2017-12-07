<?php

namespace App\Support\Crawler;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

class Crawler {

    protected $client;
    protected $url = 'https://www.sunfrog.com/search/paged3.cfm?schTrmFilter=new&productType=0&search=';
	protected $start;
    protected $end;
    protected $header;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->header = [
        'host' => 'www.sunfrog.com',
        'connection' =>  'keep-alive',
        'cache-Control' => 'max-age=0',
        'upgrade-insecure-requests' => '1',
        'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36',
        'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        'accept-encoding' => 'gzip, deflate, br',
        'accept-language' => 'en-US,en;q=0.9,vi;q=0.8',
        'cookie' => 'CFID=1552709119; CFTOKEN=4e1452611535d31a-D3CB310D-E70D-BD48-B30BF8445BA75D82; Affiliate=13193; BNES_CFID=wq9356KomsCYwmxpJNa/CorzQex5CeMCya4O6Vz7hH9ZgkVdrngNwL8gEmndnHgLaHyiUA18z/LvLwf2YcwtKQ==; BNES_CFTOKEN=khIQfHbCd2gsOBrxycopXhgV1sWbbiYa/4sCqJsMD5ZZ94YTAb+X3gC8/FeBtX0BduQpdB+jiFV3nJh+fbjvo5QVCq8y5zT3DMPRMlOHFHr/s4gue29J67g73mY+k0RFb38GlZbYiv4=; BNES_Affiliate=LNy10wlwog9s4xW2cc4YeAfgq3cC6lJRVELeFpLeX5lKfSqnJFgHHg/P2ZvNb0c5Qe0N1n1XtZkit63d+V4aDQ==; _ga=GA1.2.1681974612.1510564642; _gid=GA1.2.777146241.1512613790; _gat=1; _gat_Affiliate=1; __asc=8112aca11602ecec38c1a940c1e; __auc=7e1d8b2415fb4ab41cebf66da7b; BNI_PeanutButter=0000000000000000000000006d00590a00000000',
        ];
        $this->start = 1;
        $this->end = 1;
    }

    public function excute ($keyword)
    {   
        $this->url .= $keyword.'&cID=0';
        $this->getContent($this->url);
        // return $this->getItems();
    }

    protected function getContent($url)
    {   
        for ($i=$this->start; $i <= $this->end; $i++) {
            try {
                $res = $this->client->request('GET', $url, ['headers' => $this->header]);
                if($res->getStatusCode() === 200) {
                    $this->content[$i] = strval($res->getBody());
                }
            } catch (\GuzzleHttp\Exception\RequestException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            } catch (\GuzzleHttp\Exception\ServerException $e) {}
        }
    }

    protected function getItems()
    {
        for ($i=$this->start; $i <= $this->end; $i++) {
            if(preg_match_all('/<a href=\"(.*?)"  border=\"0">/is', $this->content[$i], $m)) {
                try {
                    $res = $this->client->request('GET', $link);
                    if($res->getStatusCode() === 200) {
                        $content = $res->getBody();
                        // SKU
                        if(preg_match('/<small>Product SKU: (.*?)<\/small>/is', $content, $sku)) {
                            $sku = $sku[1];
                        }
                        if(preg_match('/<meta property=\"og:title" content=\"(.*?)"\/>/is',$content,$m)){
                            $title = $m[1];
                        }
                        if(preg_match('/<meta property=\"og:description" content=\"(.*?)"\/>/is',$content,$m)){
                            $body = $m[1];
                        }
                        
                    } 
                    } catch (\GuzzleHttp\Exception\RequestException $e) {
                    } catch (\GuzzleHttp\Exception\ClientException $e) {
                    } catch (\GuzzleHttp\Exception\ServerException $e) {}
            }
        }
    }
}