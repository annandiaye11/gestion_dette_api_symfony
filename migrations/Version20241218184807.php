<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218184807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boutiq (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE client ADD boutiq_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404556D157127 FOREIGN KEY (boutiq_id) REFERENCES boutiq (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C74404556D157127 ON client (boutiq_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE client DROP CONSTRAINT FK_C74404556D157127');
        $this->addSql('DROP TABLE boutiq');
        $this->addSql('DROP INDEX IDX_C74404556D157127');
        $this->addSql('ALTER TABLE client DROP boutiq_id');
    }
}
