<?php

namespace App\DataFixtures;

use App\Entity\Module;
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
    
        $module = new Module();
        $module->setName('caméra');
        $module->setDescription('Caméra 360° connecté wifi');
        $module->setEtatDeMarche('2');
        $ModuleCategory = $this->getReference('stuff-4');
        $module->setCategory($ModuleCategory);
        $module->setImage('fixtures/Caméra.PNG');
        $manager->persist($module);

        $module1 = new Module();
        $module1->setName('Montre Galaxy Watch');
        $module1->setDescription('Montre de Michaël');
        $module1->setEtatDeMarche('1');
        $ModuleCategory = $this->getReference('stuff-0');
        $module1->setCategory($ModuleCategory);
        $module1->setImage('fixtures/Montre.PNG');
        $manager->persist($module1);

        $module2 = new Module();
        $module2->setName('Chauffage');
        $module2->setDescription('Chauffage de la chambre');
        $module2->setEtatDeMarche('1');
        $ModuleCategory = $this->getReference('stuff-1');
        $module2->setCategory($ModuleCategory);
        $module2->setImage('fixtures/Chauffage.PNG');
        $manager->persist($module2);

        $module3 = new Module();
        $module3->setName('Prise ');
        $module3->setDescription('Prise de l\'aquarium');
        $module3->setEtatDeMarche('0');
        $ModuleCategory = $this->getReference('stuff-2');
        $module3->setCategory($ModuleCategory);
        $module3->setImage('fixtures/Prise.PNG');
        $manager->persist($module3);

        
        $module4 = new Module();
        $module4->setName('Amazon echo dot 3');
        $module4->setDescription('assistant vocal du bureau');
        $module4->setEtatDeMarche('1');
        $ModuleCategory = $this->getReference('stuff-3');
        $module4->setCategory($ModuleCategory);
        $module4->setImage('fixtures/Vocal.PNG');
        $manager->persist($module4);

    


        $manager->flush();
    }
}
