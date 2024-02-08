<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231016142902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forecast (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, location_id INTEGER NOT NULL, date DATE NOT NULL, celsius INTEGER NOT NULL, CONSTRAINT FK_2A9C784464D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_2A9C784464D218E ON forecast (location_id)');
        $this->addSql("INSERT INTO forecast(location_id, date, celsius) VALUES (1, '2024-01-01', 21)");
        $this->addSql("INSERT INTO forecast(location_id, date, celsius) VALUES (1, '2024-01-02', 22)");
        $this->addSql("INSERT INTO forecast(location_id, date, celsius) VALUES (1, '2024-01-03', 23)");
        $this->addSql("INSERT INTO forecast(location_id, date, celsius) VALUES (1, '2024-01-04', 24)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE forecast');
    }
}
