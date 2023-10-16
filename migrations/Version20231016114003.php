<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231016114003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, country_code VARCHAR(2) NOT NULL, latitude NUMERIC(10, 7) NOT NULL, longitude NUMERIC(10, 7) NOT NULL)');
        $this->addSql("INSERT INTO location(name, country_code, latitude, longitude) VALUES ('Barcelona', 'ES', 41.38879, 2.15899)");
        $this->addSql("INSERT INTO location(name, country_code, latitude, longitude) VALUES ('Berlin', 'DE', 52.5200, 13.4050)");
        $this->addSql("INSERT INTO location(name, country_code, latitude, longitude) VALUES ('Paris', 'FR', 48.8566, 2.3522)");
        $this->addSql("INSERT INTO location(name, country_code, latitude, longitude) VALUES ('Warsaw', 'PL', 52.2297, 21.0122)");
        $this->addSql("INSERT INTO location(name, country_code, latitude, longitude) VALUES ('Delhi', 'IN', 28.7041, 77.1025)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE location');
    }
}
