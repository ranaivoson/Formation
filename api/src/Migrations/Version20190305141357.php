<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190305141357 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE school_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE training_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE my_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE school (id INT NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, my_user VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F99EDABB5E237E06 ON school (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F99EDABB5CECC7BE ON school (adress)');
        $this->addSql('CREATE TABLE training (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE training_school (training_id INT NOT NULL, school_id INT NOT NULL, PRIMARY KEY(training_id, school_id))');
        $this->addSql('CREATE INDEX IDX_CA721DD4BEFD98D1 ON training_school (training_id)');
        $this->addSql('CREATE INDEX IDX_CA721DD4C32A47EE ON training_school (school_id)');
        $this->addSql('CREATE TABLE my_user (id INT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4DB4FF1DF85E0677 ON my_user (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4DB4FF1DE7927C74 ON my_user (email)');
        $this->addSql('COMMENT ON COLUMN my_user.roles IS \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE training_school ADD CONSTRAINT FK_CA721DD4BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE training_school ADD CONSTRAINT FK_CA721DD4C32A47EE FOREIGN KEY (school_id) REFERENCES school (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE training_school DROP CONSTRAINT FK_CA721DD4C32A47EE');
        $this->addSql('ALTER TABLE training_school DROP CONSTRAINT FK_CA721DD4BEFD98D1');
        $this->addSql('DROP SEQUENCE school_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE training_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE my_user_id_seq CASCADE');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE training_school');
        $this->addSql('DROP TABLE my_user');
    }
}
