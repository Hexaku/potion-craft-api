<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220805071417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE effect_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ingredient_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE potion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recipe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tool_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE effect (id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ingredient (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, price INT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE potion (id INT NOT NULL, effect_id INT NOT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4AB6B0ADF5E9B83B ON potion (effect_id)');
        $this->addSql('CREATE TABLE recipe (id INT NOT NULL, ingredient_id INT NOT NULL, potion_id INT NOT NULL, ingredient_quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DA88B137933FE08C ON recipe (ingredient_id)');
        $this->addSql('CREATE INDEX IDX_DA88B1377126B348 ON recipe (potion_id)');
        $this->addSql('CREATE TABLE tool (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tool_potion (tool_id INT NOT NULL, potion_id INT NOT NULL, PRIMARY KEY(tool_id, potion_id))');
        $this->addSql('CREATE INDEX IDX_2FE7BCB18F7B22CC ON tool_potion (tool_id)');
        $this->addSql('CREATE INDEX IDX_2FE7BCB17126B348 ON tool_potion (potion_id)');
        $this->addSql('ALTER TABLE potion ADD CONSTRAINT FK_4AB6B0ADF5E9B83B FOREIGN KEY (effect_id) REFERENCES effect (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B1377126B348 FOREIGN KEY (potion_id) REFERENCES potion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tool_potion ADD CONSTRAINT FK_2FE7BCB18F7B22CC FOREIGN KEY (tool_id) REFERENCES tool (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tool_potion ADD CONSTRAINT FK_2FE7BCB17126B348 FOREIGN KEY (potion_id) REFERENCES potion (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE potion DROP CONSTRAINT FK_4AB6B0ADF5E9B83B');
        $this->addSql('ALTER TABLE recipe DROP CONSTRAINT FK_DA88B137933FE08C');
        $this->addSql('ALTER TABLE recipe DROP CONSTRAINT FK_DA88B1377126B348');
        $this->addSql('ALTER TABLE tool_potion DROP CONSTRAINT FK_2FE7BCB17126B348');
        $this->addSql('ALTER TABLE tool_potion DROP CONSTRAINT FK_2FE7BCB18F7B22CC');
        $this->addSql('DROP SEQUENCE effect_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ingredient_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE potion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recipe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tool_id_seq CASCADE');
        $this->addSql('DROP TABLE effect');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE potion');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE tool');
        $this->addSql('DROP TABLE tool_potion');
    }
}
