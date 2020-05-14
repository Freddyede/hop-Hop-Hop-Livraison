<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200513103852 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DB2B59251');
        $this->addSql('DROP INDEX UNIQ_6EEAA67DB2B59251 ON commande');
        $this->addSql('ALTER TABLE commande CHANGE code_postal_id ville_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D4702356A FOREIGN KEY (ville_name_id) REFERENCES villes (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D4702356A ON commande (ville_name_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D4702356A');
        $this->addSql('DROP INDEX IDX_6EEAA67D4702356A ON commande');
        $this->addSql('ALTER TABLE commande CHANGE ville_name_id code_postal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DB2B59251 FOREIGN KEY (code_postal_id) REFERENCES villes (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6EEAA67DB2B59251 ON commande (code_postal_id)');
    }
}
