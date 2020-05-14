<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200514115611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D4702356A');
        $this->addSql('DROP INDEX IDX_6EEAA67D4702356A ON commande');
        $this->addSql('ALTER TABLE commande DROP ville_name_id');
        $this->addSql('ALTER TABLE villes ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE villes ADD CONSTRAINT FK_19209FD882EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_19209FD882EA2E54 ON villes (commande_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande ADD ville_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D4702356A FOREIGN KEY (ville_name_id) REFERENCES villes (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D4702356A ON commande (ville_name_id)');
        $this->addSql('ALTER TABLE villes DROP FOREIGN KEY FK_19209FD882EA2E54');
        $this->addSql('DROP INDEX IDX_19209FD882EA2E54 ON villes');
        $this->addSql('ALTER TABLE villes DROP commande_id');
    }
}
