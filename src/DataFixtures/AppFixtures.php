<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Student;
use App\Entity\SchoolYear;
use App\Entity\Projet;
use App\Entity\Tag;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $schoolyear = new SchoolYear;
        $schoolyear->setName('2020-2021');
        $dateStart = new DateTime('2020-09-01');
        $schoolyear->setDateStart($dateStart);
        $dateEnd = new DateTime('2021-06-30');
        $schoolyear->setEndDate($dateEnd);
        $manager->persist($schoolyear);

        $projet = new Projet;
        $projet->setName('Sport');
        $projet->setDescription('Sport pour tous');
        $manager->persist($projet);

        $tag = new Tag;
        $tag->setName('professeur');
        $manager->persist($tag);
        $tag = new Tag;
        $tag->setName('etudiant');
        $manager->persist($tag);

         // Création d'une vingtaine de'étudiants ayant pour nom
         for ($i = 0; $i < 20; $i++) {
            $student = new Student;
            $student->setFirstname('Bobby ' . $i);
            $student->setLastname('Ewing ' . $i);
            $student->setEmail('bobby' . $i . '@gmail.com');

            // Ajoutez l'étudiant à l'année scolaire
            $schoolyear->addStudent($student);
            $student->addSchoolyear($schoolyear);

            // Ajoutez l'étudiant au projet
            $projet->addStudent($student);
            $student->addProjet($projet);

            // Ajoutez l'étudiant au tag
            $tag = new Tag;
            $tag->setName('etudiant');
            $manager->persist($tag);
            $tag->addStudent($student);
            $student->addTag($tag);

            // Persistez l'étudiant dans chaque itération
            $manager->persist($student);
        };

        $manager->flush();
    }
}
