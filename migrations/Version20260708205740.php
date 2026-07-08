<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260708205740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE path DROP INDEX UNIQ_B548B0FC3423909, ADD INDEX IDX_B548B0FC3423909 (driver_id)');
        $this->addSql('ALTER TABLE path CHANGE diary_price discharge_price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0FC3423909 FOREIGN KEY (driver_id) REFERENCES driver (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE path DROP INDEX IDX_B548B0FC3423909, ADD UNIQUE INDEX UNIQ_B548B0FC3423909 (driver_id)');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0FC3423909');
        $this->addSql('ALTER TABLE path CHANGE discharge_price diary_price DOUBLE PRECISION DEFAULT NULL');
    }
}
