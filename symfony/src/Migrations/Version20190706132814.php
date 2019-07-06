<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190706132814 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE running_outing (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, exit_type_id INT DEFAULT NULL, date DATETIME NOT NULL, duration INT NOT NULL, distance INT NOT NULL, comment LONGTEXT NOT NULL, average_speed INT NOT NULL, average_pace INT NOT NULL, INDEX IDX_4B232166A76ED395 (user_id), INDEX IDX_4B232166DB5E6125 (exit_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE running_outing ADD CONSTRAINT FK_4B232166A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE running_outing ADD CONSTRAINT FK_4B232166DB5E6125 FOREIGN KEY (exit_type_id) REFERENCES exit_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE running_outing');
    }
}
