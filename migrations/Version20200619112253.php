<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200619112253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE circuit (id INT AUTO_INCREMENT NOT NULL, code_circuit INT NOT NULL, des_circuit VARCHAR(255) NOT NULL, duree_circuit INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, code_dest INT NOT NULL, des_dest VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, dest_ville_id INT NOT NULL, code_ville INT NOT NULL, des_ville VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3865BADBA (dest_ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville_etape (id INT AUTO_INCREMENT NOT NULL, ville_etape_id INT NOT NULL, circuit_etape_id INT NOT NULL, duree_etape INT NOT NULL, ordre_etape INT NOT NULL, INDEX IDX_A7DA9A02886D48A3 (ville_etape_id), INDEX IDX_A7DA9A029AD1690C (circuit_etape_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3865BADBA FOREIGN KEY (dest_ville_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE ville_etape ADD CONSTRAINT FK_A7DA9A02886D48A3 FOREIGN KEY (ville_etape_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE ville_etape ADD CONSTRAINT FK_A7DA9A029AD1690C FOREIGN KEY (circuit_etape_id) REFERENCES circuit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville_etape DROP FOREIGN KEY FK_A7DA9A029AD1690C');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3865BADBA');
        $this->addSql('ALTER TABLE ville_etape DROP FOREIGN KEY FK_A7DA9A02886D48A3');
        $this->addSql('DROP TABLE circuit');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE ville_etape');
    }
}
