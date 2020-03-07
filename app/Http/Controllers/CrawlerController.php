<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
use App\Exports\ExcelExport;
use Excel;

class CrawlerController extends Controller
{
    protected $header;
    protected $salary;

    public function getSalary()
    {
        return $this->crawlerSalary();
    }

    public function getSalaryXLS()
    {
        $data = $this->crawlerSalary();
        $export = new ExcelExport([$data['data']], $data['meta']['header']);
    
        return Excel::download($export, 'planilha_salario.xlsx');
    }

    public function crawlerSalary()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://www.guiatrabalhista.com.br/guia/salario_minimo.htm');

        $crawler = new Crawler($response->getBody()->getContents());
        $table = $crawler->filter('table')->first();
        
        $header_special = $table->filter('tbody > tr')->first()->each(function (Crawler $node, $i) {
            return $node->filter('td')->each(function (Crawler $subNode, $j) use ($i) {
                $this->header[] = $this->sanitizeString($subNode->text(), $i); 
                return $subNode->text();
            });
        })[0];

        $this->salary = [];
        $table->filter('tbody > tr')->nextAll()->each(function (Crawler $node, $i) use ($header_special) {
            $node->filter('td')->each(function (Crawler $subNode, $j) use ($header_special, $i) {
                if (!isset($this->salary[$i])) $this->salary[$i] = [];
                $this->salary[$i][$this->header[$j]] = $subNode->text();
            });
        });

        
        return ['data' => $this->salary, 'meta' => ['header' => $this->header, 'header_special' => $header_special]];
    }

    /**
     * @param $str
     * @return mixed
     */
    function sanitizeString($str, $false) {
        $str = strtolower($str);
       
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str);

        if (preg_match('/_+/', substr($str, -1)))
        {
            $str = substr($str, 0, -1);
        }

        return $str;
    }
}
