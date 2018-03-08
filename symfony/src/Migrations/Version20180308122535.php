<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180308122535 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, description LONGTEXT NOT NULL, unit VARCHAR(20) DEFAULT NULL, calories_per_unit NUMERIC(10, 3) DEFAULT NULL, rayon VARCHAR(255) NOT NULL, illustration VARCHAR(255) NOT NULL, tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link_ingredient_recette (id INT AUTO_INCREMENT NOT NULL, ingredient_id INT NOT NULL, recette_id INT NOT NULL, quantity NUMERIC(10, 2) NOT NULL, INDEX IDX_602C996933FE08C (ingredient_id), INDEX IDX_602C99689312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal_profile (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, nb_personnes INT NOT NULL, nb_jours INT NOT NULL, lunch TINYINT(1) NOT NULL, dinner TINYINT(1) NOT NULL, tags_mandatory LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', tags_forbidden LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', UNIQUE INDEX UNIQ_F8E41816FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, time_preparation INT DEFAULT NULL, time_cuisson INT DEFAULT NULL, description LONGTEXT NOT NULL, steps LONGTEXT NOT NULL, illustration VARCHAR(255) NOT NULL, tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, meal_profile_id INT DEFAULT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(60) NOT NULL, is_active TINYINT(1) NOT NULL, role VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3F85E0677 (username), UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), UNIQUE INDEX UNIQ_1D1C63B35B96A432 (meal_profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE link_ingredient_recette ADD CONSTRAINT FK_602C996933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE link_ingredient_recette ADD CONSTRAINT FK_602C99689312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE meal_profile ADD CONSTRAINT FK_F8E41816FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B35B96A432 FOREIGN KEY (meal_profile_id) REFERENCES meal_profile (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE link_ingredient_recette DROP FOREIGN KEY FK_602C996933FE08C');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B35B96A432');
        $this->addSql('ALTER TABLE link_ingredient_recette DROP FOREIGN KEY FK_602C99689312FE9');
        $this->addSql('ALTER TABLE meal_profile DROP FOREIGN KEY FK_F8E41816FB88E14F');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE link_ingredient_recette');
        $this->addSql('DROP TABLE meal_profile');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE utilisateur');
    }
}
