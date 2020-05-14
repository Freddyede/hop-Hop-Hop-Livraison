<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200514115902 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commande_villes (commande_id INT NOT NULL, villes_id INT NOT NULL, INDEX IDX_1B74640D82EA2E54 (commande_id), INDEX IDX_1B74640D286C17BC (villes_id), PRIMARY KEY(commande_id, villes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_villes ADD CONSTRAINT FK_1B74640D82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_villes ADD CONSTRAINT FK_1B74640D286C17BC FOREIGN KEY (villes_id) REFERENCES villes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE villes DROP FOREIGN KEY FK_19209FD882EA2E54');
        $this->addSql('DROP INDEX IDX_19209FD882EA2E54 ON villes');
        $this->addSql('ALTER TABLE villes DROP commande_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commande_villes');
        $this->addSql('ALTER TABLE villes ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE villes ADD CONSTRAINT FK_19209FD882EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_19209FD882EA2E54 ON villes (commande_id)');
    }
}
