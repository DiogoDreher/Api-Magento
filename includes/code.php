<?php include('model/Produto.php') ?>
<?php
// Get the contents from the REST server using Guzzle
include('vendor/autoload.php');

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

//Sorting queries to order the data according to the combobox
if (isset($_POST["combo"])) {
    $opt = $_POST["combo"];
    //echo $opt;
    switch ($opt) {
        case 'price_asc':
            $httpClient1 = new Client();
            $token = 'pr7hyxb9cp50li6q9relqd9j5rfjqobx';
            $result = $httpClient1->get(
                'http://demomagento2-clients.toogas.com/rest/V1/products?searchCriteria[sortOrders][0][field]=price&searchCriteria[sortOrders][0][direction]=ASC',
                [
                    RequestOptions::HEADERS => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ]
                ]
            );

            $json1 = json_decode($result->getBody()->getContents());
            break;

        case 'price_desc':
            $httpClient1 = new Client();
            $token = 'pr7hyxb9cp50li6q9relqd9j5rfjqobx';
            $result = $httpClient1->get(
                'http://demomagento2-clients.toogas.com/rest/V1/products?searchCriteria[sortOrders][0][field]=price&searchCriteria[sortOrders][0][direction]=DESC',
                [
                    RequestOptions::HEADERS => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ]
                ]
            );

            $json1 = json_decode($result->getBody()->getContents());
            break;

        case 'name_asc':
            $httpClient1 = new Client();
            $token = 'pr7hyxb9cp50li6q9relqd9j5rfjqobx';
            $result = $httpClient1->get(
                'http://demomagento2-clients.toogas.com/rest/V1/products?searchCriteria[sortOrders][0][field]=name&searchCriteria[sortOrders][0][direction]=ASC',
                [
                    RequestOptions::HEADERS => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ]
                ]
            );

            $json1 = json_decode($result->getBody()->getContents());
            break;

        case 'name_desc':
            $httpClient1 = new Client();
            $token = 'pr7hyxb9cp50li6q9relqd9j5rfjqobx';
            $result = $httpClient1->get(
                'http://demomagento2-clients.toogas.com/rest/V1/products?searchCriteria[sortOrders][0][field]=name&searchCriteria[sortOrders][0][direction]=DESC',
                [
                    RequestOptions::HEADERS => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ]
                ]
            );

            $json1 = json_decode($result->getBody()->getContents());
            break;

        default:
            $httpClient1 = new Client();
            $token = 'pr7hyxb9cp50li6q9relqd9j5rfjqobx';
            $result = $httpClient1->get(
                'http://demomagento2-clients.toogas.com/rest/V1/products?searchCriteria',
                [
                    RequestOptions::HEADERS => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ]
                ]
            );

            $json1 = json_decode($result->getBody()->getContents());
            break;
    }
}

?>