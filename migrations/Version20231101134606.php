<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231101134606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school_year (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_projet (student_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_DE234429CB944F1A (student_id), INDEX IDX_DE234429C18272 (projet_id), PRIMARY KEY(student_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_school_year (student_id INT NOT NULL, school_year_id INT NOT NULL, INDEX IDX_2D4AA1D9CB944F1A (student_id), INDEX IDX_2D4AA1D9D2EECC3F (school_year_id), PRIMARY KEY(student_id, school_year_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_tag (student_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_95F4B225CB944F1A (student_id), INDEX IDX_95F4B225BAD26311 (tag_id), PRIMARY KEY(student_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_projet ADD CONSTRAINT FK_DE234429CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_projet ADD CONSTRAINT FK_DE234429C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_school_year ADD CONSTRAINT FK_2D4AA1D9CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_school_year ADD CONSTRAINT FK_2D4AA1D9D2EECC3F FOREIGN KEY (school_year_id) REFERENCES school_year (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_tag ADD CONSTRAINT FK_95F4B225CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_tag ADD CONSTRAINT FK_95F4B225BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_projet DROP FOREIGN KEY FK_DE234429CB944F1A');
        $this->addSql('ALTER TABLE student_projet DROP FOREIGN KEY FK_DE234429C18272');
        $this->addSql('ALTER TABLE student_school_year DROP FOREIGN KEY FK_2D4AA1D9CB944F1A');
        $this->addSql('ALTER TABLE student_school_year DROP FOREIGN KEY FK_2D4AA1D9D2EECC3F');
        $this->addSql('ALTER TABLE student_tag DROP FOREIGN KEY FK_95F4B225CB944F1A');
        $this->addSql('ALTER TABLE student_tag DROP FOREIGN KEY FK_95F4B225BAD26311');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE school_year');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_projet');
        $this->addSql('DROP TABLE student_school_year');
        $this->addSql('DROP TABLE student_tag');
        $this->addSql('DROP TABLE tag');
    }
}
