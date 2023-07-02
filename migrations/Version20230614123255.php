<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614123255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poubelle DROP INDEX UNIQ_B5344EA350FB386C, ADD INDEX IDX_B5344EA350FB386C (id_appart_id)');
        $this->addSql('ALTER TABLE poubelle ADD nom VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poubelle DROP INDEX IDX_B5344EA350FB386C, ADD UNIQUE INDEX UNIQ_B5344EA350FB386C (id_appart_id)');
        $this->addSql('ALTER TABLE poubelle DROP nom');
    }
}
