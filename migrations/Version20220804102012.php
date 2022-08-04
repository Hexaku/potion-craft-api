<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220804102012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE effect_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE potion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tool_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE effect (id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE potion (id INT NOT NULL, effect_id INT NOT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4AB6B0ADF5E9B83B ON potion (effect_id)');
        $this->addSql('CREATE TABLE potion_ingredient (potion_id INT NOT NULL, ingredient_id INT NOT NULL, PRIMARY KEY(potion_id, ingredient_id))');
        $this->addSql('CREATE INDEX IDX_3FD8934C7126B348 ON potion_ingredient (potion_id)');
        $this->addSql('CREATE INDEX IDX_3FD8934C933FE08C ON potion_ingredient (ingredient_id)');
        $this->addSql('CREATE TABLE potion_tool (potion_id INT NOT NULL, tool_id INT NOT NULL, PRIMARY KEY(potion_id, tool_id))');
        $this->addSql('CREATE INDEX IDX_23567E5A7126B348 ON potion_tool (potion_id)');
        $this->addSql('CREATE INDEX IDX_23567E5A8F7B22CC ON potion_tool (tool_id)');
        $this->addSql('CREATE TABLE tool (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE potion ADD CONSTRAINT FK_4AB6B0ADF5E9B83B FOREIGN KEY (effect_id) REFERENCES effect (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE potion_ingredient ADD CONSTRAINT FK_3FD8934C7126B348 FOREIGN KEY (potion_id) REFERENCES potion (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE potion_ingredient ADD CONSTRAINT FK_3FD8934C933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE potion_tool ADD CONSTRAINT FK_23567E5A7126B348 FOREIGN KEY (potion_id) REFERENCES potion (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE potion_tool ADD CONSTRAINT FK_23567E5A8F7B22CC FOREIGN KEY (tool_id) REFERENCES tool (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE potion DROP CONSTRAINT FK_4AB6B0ADF5E9B83B');
        $this->addSql('ALTER TABLE potion_ingredient DROP CONSTRAINT FK_3FD8934C7126B348');
        $this->addSql('ALTER TABLE potion_tool DROP CONSTRAINT FK_23567E5A7126B348');
        $this->addSql('ALTER TABLE potion_tool DROP CONSTRAINT FK_23567E5A8F7B22CC');
        $this->addSql('DROP SEQUENCE effect_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE potion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tool_id_seq CASCADE');
        $this->addSql('DROP TABLE effect');
        $this->addSql('DROP TABLE potion');
        $this->addSql('DROP TABLE potion_ingredient');
        $this->addSql('DROP TABLE potion_tool');
        $this->addSql('DROP TABLE tool');
    }
}
