<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524165713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE checkin (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_E1631C9150FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE electromenager (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_E0AED47050FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE checkin ADD CONSTRAINT FK_E1631C9150FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE electromenager ADD CONSTRAINT FK_E0AED47050FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE checkin DROP FOREIGN KEY FK_E1631C9150FB386C');
        $this->addSql('ALTER TABLE electromenager DROP FOREIGN KEY FK_E0AED47050FB386C');
        $this->addSql('DROP TABLE checkin');
        $this->addSql('DROP TABLE electromenager');
    }
}
