<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201230215549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consumer (id SERIAL NOT NULL, provider_id INT NOT NULL, given_name VARCHAR(100) DEFAULT NULL, family_name VARCHAR(100) DEFAULT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_705B3727A53A8AA ON consumer (provider_id)');
        $this->addSql('CREATE TABLE customer (id SERIAL NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81398E09F85E0677 ON customer (username)');
        $this->addSql('CREATE TABLE product (id SERIAL NOT NULL, name VARCHAR(100) NOT NULL, brand VARCHAR(100) NOT NULL, released_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_available BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE consumer ADD CONSTRAINT FK_705B3727A53A8AA FOREIGN KEY (provider_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE consumer DROP CONSTRAINT FK_705B3727A53A8AA');
        $this->addSql('DROP TABLE consumer');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE product');
    }
}
