<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200428104037 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, background VARCHAR(255) NOT NULL, colors VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, code_postal_id INT DEFAULT NULL, residences VARCHAR(255) NOT NULL, ascenseurs TINYINT(1) NOT NULL, digicode TINYINT(1) NOT NULL, number_digicodes VARCHAR(255) NOT NULL, tel VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_6EEAA67DB2B59251 (code_postal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE villes (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, code_postal VARCHAR(5) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_19209FD89F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DB2B59251 FOREIGN KEY (code_postal_id) REFERENCES villes (id)');
        $this->addSql('ALTER TABLE villes ADD CONSTRAINT FK_19209FD89F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE villes DROP FOREIGN KEY FK_19209FD89F2C3FAB');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DB2B59251');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE villes');
    }
}
