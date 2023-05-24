<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524141725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE poubelle (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT DEFAULT NULL, photo VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B5344EA350FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wifi (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9763A24B50FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poubelle ADD CONSTRAINT FK_B5344EA350FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE wifi ADD CONSTRAINT FK_9763A24B50FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poubelle DROP FOREIGN KEY FK_B5344EA350FB386C');
        $this->addSql('ALTER TABLE wifi DROP FOREIGN KEY FK_9763A24B50FB386C');
        $this->addSql('DROP TABLE poubelle');
        $this->addSql('DROP TABLE wifi');
    }
}