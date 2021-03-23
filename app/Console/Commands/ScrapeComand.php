<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Console\Command;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\DomCrawler\link;
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\HttpClient\HttpClient;
class ScrapeComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $urls = 'https://dantri.com.vn';
        $clients = new Client();
        $crawlers = $clients->request('GET', $urls);

 //TODO LẤY DANH MỤC

   $crawlers->filter('.site-menu ol.site-menu__list li.dropdown')->each(
        function (Crawler $node) {
              $name = $node->filter('a')->text();
//              print_r($name);
              $cates = Category::where('name', $name)->first();
//              print_r($cates->name);
               if($cates){
                   return "Đã tồn tại";
              }else{
                   $cates = new Category();
                   $cates->name = $name;
                   $cates->logo = 'lgoo.jpg';
                $cates->save();
             }



            }
        );




        $url = 'https://dantri.com.vn';
        $client = new Client();
        $crawler = $client->request('GET', $url);


//        $links_count = $crawler->filter('.col--primary ul.dt-list--lg li .news-item--left2right .news-item__title a')->count();
        $links_count = $crawler->filter('main a')->count();

        $all_links = [];

        if($links_count > 0){

//            $links = $crawler->filter('.col--primary ul.dt-list--lg li .news-item--left2right .news-item__title a')->links();
            $links = $crawler->filter('main a')->links();


            foreach ($links as $link) {

                $all_links[] = $link->getURI();

            }

            $all_links = array_unique($all_links); // loại bỏ trùng lặp trong mảng



            foreach ($all_links as $uri){


                $crawlers = $client->request('GET', $uri);
                $title = $crawlers->filter('.dt-news__detail h1.dt-news__title')->text();


                $short_desc= $crawlers->filter('.dt-news__detail .dt-news__body .dt-news__sapo h2')->text();


                $content = $crawlers->filter('.dt-news__detail .dt-news__body .dt-news__content')->html();

                $image = $crawlers->filter('figure>img')->attr('src');

                $cate = $crawlers->filter('.dt-news__detail .dt-news__header .dt-breadcrumb li')->eq(1)->text();


                 $cateArray = [];
                 foreach (Category::all() as $i){
                     $cateArray[] = $i->name;
                 }

                 if (in_array($cate,$cateArray)){
                                $xxx = Category::where('name',$cate)->first();
//                                dd($xxx);
                                $cateids = Post::where('title', $title)->count();
                                if($cateids < 1 ){
                                    $x = new Post();
                                    $x->cate_id = $xxx->id;
                                    $x->title = $title;
                                    $x->short_desc = $short_desc;
                                    $x->images = $image;
                                    $x->content = $content;
                                    $x->author = "kieu duc";
                                    $x->status = 1;
                                    $x->save();
                                }else{
//                                    dd("đã thêm trước đó");
                                    return  false;
                                }
                 }





            }

        }



    }
}
