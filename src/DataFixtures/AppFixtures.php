<?php

namespace App\DataFixtures;

use App\Entity\ModuleCategory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    //On crée la variable
    //Puis on apelle et on stock le service dans la variable
    public function __construct(UserPasswordEncoderInterface  $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@test.fr');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'test'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);




        $categories = ['Montre', 'Chauffage', 'Prise', 'Assistant Vocal','Caméra'];
        
        foreach ($categories as $key => $category){
            $ModuleCategory = new ModuleCategory();
            $ModuleCategory->setCategoryName($category);
            $this->addReference('stuff-'.$key, $ModuleCategory);
            $manager->persist($ModuleCategory);
        }
    





        $manager->flush();
    }
}
