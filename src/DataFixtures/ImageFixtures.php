<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Repository\NftRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class imageFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(protected NftRepository $nftRepository){}
    
    public function load(ObjectManager $manager): void
    {
        $nfts = $this->nftRepository->findAll();

        $images = [
            (new Image())
            ->setImgName('ichigo')
            ->setImgURL('ichigo_car.png')
            ->addNft($nfts[0]),
            (new Image())
            ->setImgName('gojo')
            ->setImgURL('gojo_car.png')
            ->addNft($nfts[2]),
            (new Image())
            ->setImgName('luffy')
            ->getImgURL('luffy_car.png')
            ->addNft($nfts[3]),
            (new Image())
            ->setImgName('naruto')
            ->getImgURL('naruto_car.png')
            ->addNft($nfts[4]),
            (new Image())
            ->setImgName('zenitsu')
            ->getImgURL('zenitsu_car.png')
            ->addNft($nfts[1]),
        ];
        foreach($images as $image){
            $manager->persist($image);
        }

        $manager->flush();
    }
    public function getDependencies(){
        return [
            NftFixtures::class,
        ];
    }
}
