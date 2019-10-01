<?php

namespace App\DataFixtures;

use App\Entity\Article;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i =0; $i<10; $i++){
            $article= new Article();
            $faker= \Faker\Factory::create('fr_FR');
            $article->setTitre($faker->word)
            ->setContent($faker->text(200))
            ->setImage($faker->imageUrl(300, 250))
            ->setCreatedAt($faker->dateTimeBetween('-30 years', 'now'));
            $manager->persist($article);
        }  
        $manager->flush();
    }
}
