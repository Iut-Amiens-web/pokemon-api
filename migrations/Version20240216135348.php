<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216135348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, hp INT NOT NULL, defense INT NOT NULL, attack INT NOT NULL, speed INT NOT NULL, side TINYINT(1) NOT NULL, img VARCHAR(255) NOT NULL, special INT NOT NULL, pp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_lvl (id INT AUTO_INCREMENT NOT NULL, pokemon_id INT DEFAULT NULL, lvl INT NOT NULL, INDEX IDX_29778A712FE71C3E (pokemon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_lvl_pokemon_move (pokemon_lvl_id INT NOT NULL, pokemon_move_id INT NOT NULL, INDEX IDX_F66783C7F5320 (pokemon_lvl_id), INDEX IDX_F66781AF3D39 (pokemon_move_id), PRIMARY KEY(pokemon_lvl_id, pokemon_move_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_move (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, power INT NOT NULL, accuracy INT NOT NULL, pp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon_lvl ADD CONSTRAINT FK_29778A712FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id)');
        $this->addSql('ALTER TABLE pokemon_lvl_pokemon_move ADD CONSTRAINT FK_F66783C7F5320 FOREIGN KEY (pokemon_lvl_id) REFERENCES pokemon_lvl (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemon_lvl_pokemon_move ADD CONSTRAINT FK_F66781AF3D39 FOREIGN KEY (pokemon_move_id) REFERENCES pokemon_move (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon_lvl DROP FOREIGN KEY FK_29778A712FE71C3E');
        $this->addSql('ALTER TABLE pokemon_lvl_pokemon_move DROP FOREIGN KEY FK_F66783C7F5320');
        $this->addSql('ALTER TABLE pokemon_lvl_pokemon_move DROP FOREIGN KEY FK_F66781AF3D39');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE pokemon_lvl');
        $this->addSql('DROP TABLE pokemon_lvl_pokemon_move');
        $this->addSql('DROP TABLE pokemon_move');
    }
}
