<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ItemFixtures extends Fixture implements DependentFixtureInterface
{
    public const CATEGORYS = [
        'Mug',
        'Tasse',
        'Verre',
        'Assiette',
        'Cruche',
        'PLat',
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 0; $i < 6; $i++) {
            $item = new Item();
            $item->setName('Item_Name');
            $item->setDescription($faker->paragraphs(2, true));
            $item->setPrice($faker->randomFloat(2));
            $item->setQuantity($faker->numberBetween(1, 10));
            $item->setPicture($faker->imageUrl(360, 360, 'animals', true, 'cats'));
            $item->setColor($faker->safeColorName());
            $item->setCategory($this->getReference('category_' . self::CATEGORYS[$faker->numberBetween(0, 5)]));

            $manager->persist($item);  
        }
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
