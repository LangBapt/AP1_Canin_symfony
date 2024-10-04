<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241004143344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, num_user_id INT DEFAULT NULL, desc_avis LONGTEXT DEFAULT NULL, INDEX IDX_8F91ABF0626DC97C (num_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, num_user_id INT DEFAULT NULL, nom_contact VARCHAR(255) DEFAULT NULL, prenom_contact VARCHAR(255) DEFAULT NULL, adresse_contact VARCHAR(255) DEFAULT NULL, cp_contact VARCHAR(5) DEFAULT NULL, ville_contact VARCHAR(255) DEFAULT NULL, mail_contact VARCHAR(255) DEFAULT NULL, num_tel_contact VARCHAR(10) DEFAULT NULL, message_contact LONGTEXT DEFAULT NULL, INDEX IDX_4C62E638626DC97C (num_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presentation (id INT AUTO_INCREMENT NOT NULL, texte_presentation LONGTEXT DEFAULT NULL, titre_presentation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, titre_presta VARCHAR(255) DEFAULT NULL, texte_presta LONGTEXT DEFAULT NULL, prix_horaire_presta DOUBLE PRECISION DEFAULT NULL, avis VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, login_user VARCHAR(255) DEFAULT NULL, mdp_user VARCHAR(255) DEFAULT NULL, est_admin TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0626DC97C FOREIGN KEY (num_user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638626DC97C FOREIGN KEY (num_user_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0626DC97C');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638626DC97C');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE utilisateur');
    }
}
