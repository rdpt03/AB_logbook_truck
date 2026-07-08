<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260708203526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE driver (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, driver_num INT NOT NULL, user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_11667CD9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE path (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, starting_date DATETIME NOT NULL, end_date DATETIME DEFAULT NULL, diary_price DOUBLE PRECISION DEFAULT NULL, waiting_price DOUBLE PRECISION DEFAULT NULL, truck_id INT DEFAULT NULL, driver_id INT DEFAULT NULL, trailer_id INT DEFAULT NULL, INDEX IDX_B548B0FC6957CCE (truck_id), UNIQUE INDEX UNIQ_B548B0FC3423909 (driver_id), INDEX IDX_B548B0FB6C04CFD (trailer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE trailer (id INT AUTO_INCREMENT NOT NULL, trailer_plate VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE truck (id INT AUTO_INCREMENT NOT NULL, truck_plate VARCHAR(255) NOT NULL, truck_number VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE driver ADD CONSTRAINT FK_11667CD9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0FC6957CCE FOREIGN KEY (truck_id) REFERENCES truck (id)');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0FB6C04CFD FOREIGN KEY (trailer_id) REFERENCES trailer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE driver DROP FOREIGN KEY FK_11667CD9A76ED395');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0FC6957CCE');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0FB6C04CFD');
        $this->addSql('DROP TABLE driver');
        $this->addSql('DROP TABLE path');
        $this->addSql('DROP TABLE trailer');
        $this->addSql('DROP TABLE truck');
    }
}
