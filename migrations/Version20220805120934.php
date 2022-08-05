<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220805120934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE recipe_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE potion_ingredient_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE potion_ingredient (id INT NOT NULL, ingredient_id INT NOT NULL, potion_id INT NOT NULL, ingredient_quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3FD8934C933FE08C ON potion_ingredient (ingredient_id)');
        $this->addSql('CREATE INDEX IDX_3FD8934C7126B348 ON potion_ingredient (potion_id)');
        $this->addSql('ALTER TABLE potion_ingredient ADD CONSTRAINT FK_3FD8934C933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE potion_ingredient ADD CONSTRAINT FK_3FD8934C7126B348 FOREIGN KEY (potion_id) REFERENCES potion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE recipe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE potion_ingredient_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE recipe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE recipe (id INT NOT NULL, ingredient_id INT NOT NULL, potion_id INT NOT NULL, ingredient_quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_da88b1377126b348 ON recipe (potion_id)');
        $this->addSql('CREATE INDEX idx_da88b137933fe08c ON recipe (ingredient_id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT fk_da88b137933fe08c FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT fk_da88b1377126b348 FOREIGN KEY (potion_id) REFERENCES potion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE potion_ingredient');
    }
}
