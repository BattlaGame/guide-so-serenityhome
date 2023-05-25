<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524164544 extends AbstractMigration
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
        $this->addSql('CREATE TABLE parking (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B237527A50FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poubelle (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT DEFAULT NULL, photo VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B5344EA350FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wifi (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9763A24B50FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE checkin ADD CONSTRAINT FK_E1631C9150FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE electromenager ADD CONSTRAINT FK_E0AED47050FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE parking ADD CONSTRAINT FK_B237527A50FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE poubelle ADD CONSTRAINT FK_B5344EA350FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE wifi ADD CONSTRAINT FK_9763A24B50FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE adresse DROP pays');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE checkin DROP FOREIGN KEY FK_E1631C9150FB386C');
        $this->addSql('ALTER TABLE electromenager DROP FOREIGN KEY FK_E0AED47050FB386C');
        $this->addSql('ALTER TABLE parking DROP FOREIGN KEY FK_B237527A50FB386C');
        $this->addSql('ALTER TABLE poubelle DROP FOREIGN KEY FK_B5344EA350FB386C');
        $this->addSql('ALTER TABLE wifi DROP FOREIGN KEY FK_9763A24B50FB386C');
        $this->addSql('DROP TABLE checkin');
        $this->addSql('DROP TABLE electromenager');
        $this->addSql('DROP TABLE parking');
        $this->addSql('DROP TABLE poubelle');
        $this->addSql('DROP TABLE wifi');
        $this->addSql('ALTER TABLE adresse ADD pays VARCHAR(255) NOT NULL');
    }
}
